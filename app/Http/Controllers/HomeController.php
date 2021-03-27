<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\movies_tbl;
use App\Models\comment_tbl;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $find_movies = movies_tbl::where('status', '1')->get();
        return view('home')->with('find_movies', $find_movies);
    }

    public function movie_view($id)
    {
        $find_movies = movies_tbl::find($id);
        $movie_token = $find_movies->movie_token;
        $get_comment = comment_tbl::where('movie_comment_status', 'Accept')->where('movie_token', $movie_token)->get();
        return view('movie_view')
        ->with('find_movies', $find_movies)
        ->with('get_comment', $get_comment);
    }

    
}
