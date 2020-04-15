<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

// show 5 articles
    function index(){
        
        $posts = \App\Post::orderBy('post_date','desc')->take(5)->get();
        return view('welcome', ['Posts' => $posts]);
    	
    }

    
    function articles(){
    	return view('articles');
    }

    function contact(){
    	return view('contact');
    }

    public function showProtected() {
        return view ('protected');
    }

    // fetch users then return them to view
    public function showAdmin() {  

        $users = \App\User::orderBy('role','asc')->get();
        return view ('administration.usersCRUD', ['users' => $users]);
    }


    



}
