<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\movies_tbl;
use App\Models\comment_tbl;
use Auth;
use Hash;
use DB;


class admincontroller extends Controller
{
    public function permission()
    {
        if (Auth::user()->premission_type != "admin") 
        {
            abort(404, 'Page not found');
        }
    }

    public function index()
    {
        $this->permission();

        $pending_comment_count = comment_tbl::where('movie_comment_status', 'Pending')->count();
        $total_added_movie_count = movies_tbl::where('status', '1')->count();
        $find_movies = movies_tbl::where('status', '1')->get();
        
        return view('admin.admin_home')
        ->with('pending_comment_count', $pending_comment_count)
        ->with('find_movies', $find_movies)
        ->with('total_added_movie_count', $total_added_movie_count);
    }

    public function admin_user_register(Request $request)
    {
        $this->permission();
        return view('admin.register_admin');
    }

    public function add_movies()
    {
        $this->permission();

        $link = 'https://yts.mx/api/v2/list_movies.json?quality=1080p';
        $response = file_get_contents($link);
        $response=json_decode($response,true);
        $data = $response['data']['movies'];
        return view('admin.add_movies.add_movies')->with('data', $data);
    }

    public function add_movies_manual()
    {
        $this->permission();
        return view('admin.add_movies.add_movie_manual');
    }

    public function find_movie()
    {
        $this->permission();
        $find_movie_year = movies_tbl::distinct('movie_year')->orderBy('movie_year','Asc')->pluck('movie_year')->toArray();
        $admin_user = User::where('active_status', '1')->where('premission_type', 'admin')->get();
        return view('admin.find_movie')->with('movie_year', $find_movie_year)->with('admin_user', $admin_user);
    }

    public function insert_movie_db(Request $request)
    {
        $this->permission();
        $movie_title = $request->movie_title;
        $movie_year = $request->movie_year;
        $movie_imdb_rate = $request->movie_imdb_rate;
        $movie_summary = $request->movie_summary;
        $genres = $request->genres;
        $movie_genres = implode(',', $genres);
        $movie_image = $request->file('movie_image');
        $user_id = Auth::user()->id;

        $datetimesum = date('Y') + date('m') + date('d') + date('H') + date('i') + date('s');
        $movie_token = $datetimesum + rand(100,1000000);

        $errors = [
            'movie_title.required' => 'Movie Title is Required.',
            'movie_title.max' => 'Movie Title may not be greater than 200 characters.',
            'movie_year.required' => 'Movie Title is Required.',
            'movie_imdb_rate.required' => 'Imdb rate is Required.',
            'movie_summary.required' => 'Movie summery is Required.',
            'movie_image.max' => 'Movie image may not be greater than 10MB.',
            'movie_image.required' => 'Movie image is Required.',
            ];
    
            $this->validate($request, [
            'movie_title' => 'required|max:200',
            'movie_year' => 'required|numeric',
            'movie_imdb_rate' => 'required|numeric',
            'movie_summary' => 'required|string',
            'genres' => 'required',
            'movie_image' => 'required|image|mimes:jpeg,png,jpg|max:4096',
            ],$errors);

            $movie_image_name = 'img-'.rand().'.'.$movie_image->getClientOriginalExtension();
            $movie_image_path = 'img/movie_img/'.$movie_image_name;
            $movie_image->move(public_path('img/movie_img'), $movie_image_name);

        $add_movie = new movies_tbl();
        $add_movie->movie_token = $movie_token;
        $add_movie->movie_title = $movie_title;
        $add_movie->movie_year = $movie_year;
        $add_movie->movie_summary = $movie_summary;
        $add_movie->movie_genres = $movie_genres;
        $add_movie->movie_image_path = $movie_image_path;
        $add_movie->movie_collect_type = 'Manual';
        $add_movie->imdb_code = "";
        $add_movie->imdb_rating = $movie_imdb_rate;
        $add_movie->insert_user_id = $user_id;
        $add_movie->save();

        return redirect()->back()->with('success', 'Database update successfully..!');
    }

    public function api_movie_submit(Request $request)
    {
        $m_title = $request->m_title;
        $m_year = $request->m_year;
        $m_summery = $request->m_summery;
        $m_genres = $request->m_genres;
        $m_img_link = $request->m_img_link;
        $m_imdb_code = $request->imdb_code;
        $m_rating = $request->m_rating;
        $user_id = Auth::user()->id;

        $this->validate($request, [
            'imdb_code' => 'unique:movies_tbls',
            ]);

        $datetimesum = date('Y') + date('m') + date('d') + date('H') + date('i') + date('s');
        $movie_token = $datetimesum + rand(100,1000000);

        $add_movie = new movies_tbl();
        $add_movie->movie_token = $movie_token;
        $add_movie->movie_title = $m_title;
        $add_movie->movie_year = $m_year;
        $add_movie->movie_summary = $m_summery;
        $add_movie->movie_genres = $m_genres;
        $add_movie->movie_image_path = $m_img_link;
        $add_movie->movie_collect_type = 'API';
        $add_movie->imdb_code = $m_imdb_code;
        $add_movie->imdb_rating = $m_rating;
        $add_movie->insert_user_id = $user_id;
        $add_movie->save();
        
        return redirect()->back()->with('success', 'Database update successfully..!');
    }

    public function find_movie_data(Request $request)
    {
        $movie_title = $request->movie_title;
        $movie_year = $request->movie_year;
        $movie_genres = $request->movie_genres;
        $movie_added_user = $request->movie_added_user;


        $query = DB::table('movies_tbls')->where('status', '1');
        if ($movie_title != null)
        {
            $query->where('movie_title', 'rlike', $movie_title);
        }
        if ($movie_year != null)
        {
            $query->where('movie_year', $movie_year);
        }
        if ($movie_genres != null)
        {
            $query->where('movie_genres', $movie_genres);
        }
        if ($movie_added_user != null)
        {
            $query->where('insert_user_id', $movie_added_user);
        }
            $data = $query->orderBy('id','desc')->get();


        return response()->json(['success'=>'Movie Comment Details find succesfully..!', 'data' => $data]); 
    }
    
    public function remove_movie(Request $request)
    {
        $id = $request->id;

        $find_movie = movies_tbl::find($id);
        $find_movie->status = '0';
        $find_movie->update();

        return response()->json(['success'=>'Movie remove succesfully..!']);
    }

    public function find_movie_val(Request $request)
    {
        $id =$request->id;
        $find_movie_val = movies_tbl::find($id);

        return response()->json(['success'=>'Movie data get succesfully..!', 'value' => $find_movie_val]);
    }

    public function update_movie_details(Request $request)
    {
        $id = $request->update_movie_id;
        $update_movie_title = $request->update_movie_title;
        $update_movie_year = $request->update_movie_year;
        $update_movie_summery = $request->update_movie_summery;
        $update_movie_genres = $request->update_movie_genres;

        $update_movie = movies_tbl::find($id);
        $update_movie->movie_title = $update_movie_title;
        $update_movie->movie_year = $update_movie_year;
        $update_movie->movie_summary = $update_movie_summery;
        $update_movie->movie_genres = $update_movie_genres;
        $update_movie->update();

        return response()->json(['success'=>'Movie details update succesfully..!']);

    }

    public function admin_register(Request $request)
    {
    
            $this->validate($request, [
            'fname' => 'required|max:255|string',
            'lname' => 'required|max:255|string',
            'dob' => 'required|before:today',
            'gender' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'premission' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            ]);

            $fname = $request->fname;
            $lname = $request->lname;
            $fullname = $fname." ".$lname;
            $dob = $request->dob;
            $gender = $request->gender;
            $address = $request->address;
            $city = $request->city;
            $premission = $request->premission;
            $email = $request->email;
            $password = $request->password;
            $password = Hash::make($password);

            $add_user = new User();
            $add_user->fname = $fname;
            $add_user->lname = $lname;
            $add_user->fullname = $fullname;
            $add_user->gender = $gender;
            $add_user->DOB = $dob;
            $add_user->Address = $address;
            $add_user->city = $city;
            $add_user->email  = $email;
            $add_user->password  = $password;
            $add_user->premission_type  = $premission;
            $add_user->save();

            return redirect()->back()->with('success', 'User registration success..!');

    }

  
}
