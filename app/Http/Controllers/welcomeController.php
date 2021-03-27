<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\movies_tbl;
use App\Models\comment_tbl;

class welcomeController extends Controller
{
    public function index()
    {
        $find_movies = movies_tbl::where('status', '1')->get();

        return view('welcome')->with('find_movies', $find_movies);
    }
}
