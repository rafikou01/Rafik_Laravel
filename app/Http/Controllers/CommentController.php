<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Http\Requests\ContactRequest;;
use Carbon\Carbon;


class CommentController extends Controller
{
   

    function store(ContactRequest $request, $post_id){
        $comment = new Comment;
        $comment->post_id= $post_id ;
        $comment->comment_name= $request['contact_name'];
        $comment->comment_email= $request['contact_email'];
        $comment->comment_message= $request['contact_message'];
        $comment->comment_date= Carbon::now();
     
        $comment->save();

        // regenerate the post_title for the redirection
        $posts = \App\Post::where('id', $post_id)->get();
        foreach ($posts as $post) {
            $post_title= $post->post_title;
        }
        return redirect("/articles/{$post_title}");
     }

}
