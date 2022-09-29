<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){

        $posts = DB::table('posts')->get();

        return view('home', compact('posts'));
    }

    public function post($slug){

        $post = DB::table('posts')->where('slug', $slug)->first();

        if($post == null){
            return abort(404);
        }

        return view('post', compact('post'));
    }
}
