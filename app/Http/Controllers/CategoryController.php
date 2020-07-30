<?php

namespace App\Http\Controllers;
use App\Category
use App\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function kidshow()
    {

        $posts= Post::where('category','kid')->get();

        return view('category.kid', compact('posts'));
    }
    public function millennialsshow()
    {

        $posts= Post::where('category','millennials')->get();

        return view('category.millennials', compact('posts'));
    }
    public function adultshow()
    {

        $posts= Post::where('category','adult')->get();

        return view('category.adult', compact('posts'));
    }

}