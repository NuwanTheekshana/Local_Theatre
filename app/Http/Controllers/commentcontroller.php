<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\movies_tbl;
use App\Models\comment_tbl;
use App\User;
use Auth;
use DB;

class commentcontroller extends Controller
{

    public function permission()
    {
        if (Auth::user()->premission_type != "admin") 
        {
            abort(404, 'Page not found');
        }
    }


    public function add_comment(Request $request)
    {
        $id = $request->id;
        $movie_comment = $request->movie_comment;
        $user_id = Auth::user()->id;
        $user_name = Auth::user()->fullname;
        $date = date('Y-m-d H:i:s');

        $find_movie = movies_tbl::find($id);
        $movie_token = $find_movie->movie_token;
        $movie_title = $find_movie->movie_title;

        $new_comment = new comment_tbl();
        $new_comment->movie_token = $movie_token;
        $new_comment->movie_title = $movie_title;
        $new_comment->movie_comment = $movie_comment;
        $new_comment->movie_comment_user_id = $user_id;
        $new_comment->movie_comment_user = $user_name;
        $new_comment->movie_comment_date = $date;
        $new_comment->movie_comment_status = "Pending";
        $new_comment->admin_user_id = "";
        $new_comment->save();

        return response()->json(['success'=>'Your submission has been sent..!']);

    }

    public function pending_comment()
    {
        $this->permission();
        $pending_comment = comment_tbl::where('movie_comment_status', 'Pending')->get();
        return view('admin.pending_comment')->with('pending_comment', $pending_comment);
    }

    public function find_comment()
    {
        $this->permission();
        $get_status = comment_tbl::distinct('movie_comment_status')->pluck('movie_comment_status')->toArray();
        $get_status = array_diff($get_status, ['Remove'] );
        return view('admin.find_comment')->with('get_status', $get_status);
    }

    public function accept_comment(Request $request)
    {
        $id = $request->id;
        $user_id = Auth::user()->id;

        $update_status = comment_tbl::find($id);
        $update_status->movie_comment_status = "Accept";
        $update_status->admin_user_id = $user_id;
        $update_status->update();

        return response()->json(['success'=>'Request update successfully..!']);
    }

    public function update_accept_comment(Request $request)
    {
        $id = $request->update_id;
        $update_movie_title = $request->update_movie_title;
        $update_movie_comment = $request->update_movie_comment;
        $user_id = Auth::user()->id;

        $update_status = comment_tbl::find($id);
        $update_status->movie_title = $update_movie_title;
        $update_status->movie_comment = $update_movie_comment;
        $update_status->movie_comment_status = "Accept";
        $update_status->admin_user_id = $user_id;
        $update_status->update();

        return response()->json(['success'=>'Request update successfully..!']);

    }

    public function reject_comment(Request $request)
    {
        $id = $request->id;
        $user_id = Auth::user()->id;

        $update_status = comment_tbl::find($id);
        $update_status->movie_comment_status = "Reject";
        $update_status->admin_user_id = $user_id;
        $update_status->update();

        return response()->json(['success'=>'Request reject successfully..!']);
    }

    public function find_comment_data(Request $request)
    {
        $movie_title = $request->movie_title;
        $movie_status = $request->movie_status;
        $comment_added_user = $request->comment_added_user;
        $comment_date = $request->comment_date;


        $query = DB::table('comment_tbls')->whereNotIn('movie_comment_status', ['Remove']);
        if ($movie_title != null)
        {
            $query->where('movie_title', 'rlike', $movie_title);
        }
        if ($comment_added_user != null)
        {
            $query->where('movie_comment_user', $comment_added_user);
        }
        if ($movie_status != null)
        {
            $query->where('movie_comment_status', $movie_status);
        }
        if ($comment_date != null)
        {
            $query->where('movie_comment_date', 'rlike', $comment_date);
        }
            $data = $query->orderBy('id','desc')->get();


        return response()->json(['success'=>'Movie comment details find succesfully..!', 'data' => $data]); 
    }
    
    public function remove_movie_comment(Request $request)
    {
        $id = $request->id;
        $update_comment = comment_tbl::find($id);
        $update_comment->movie_comment_status = "Remove";
        $update_comment->update();

        return response()->json(['success'=>'Comment remove successfully..!']);
    }

    public function update_movie_comment(Request $request)
    {
        $id = $request->id;
        $find_comment = comment_tbl::find($id);

        return response()->json(['success'=>'Movie comment details find succesfully..!', 'find_comment' => $find_comment]); 
    }

    public function update_comment_details(Request $request)
    {
        $id = $request->update_movie_id;
        $update_movie_title = $request->update_movie_title;
        $update_movie_comment = $request->update_movie_comment;
        $update_comment_user = $request->update_comment_user;
        $update_comment_status = $request->update_comment_status;

        $update_comment = comment_tbl::find($id);
        $update_comment->movie_comment = $update_movie_comment;
        $update_comment->movie_comment_status = $update_comment_status;
        $update_comment->update();

        return response()->json(['success'=>'User comment update succesfully..!']); 
    }
    
}
