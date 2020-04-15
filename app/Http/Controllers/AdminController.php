<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function newAdmin($user_id) {
        $user = \App\User::find($user_id);
        $user->role = 'admin';
        $user->save();
        
        return redirect('/admin');
    }

    public function removeAdmin($user_id) {
        $user = \App\User::find($user_id);
        $user->role = 'user';
        $user->save();
        
        return redirect('/admin');
    }

    public function removeUser($user_id) {
        $user = \App\User::find($user_id);
        $posts = \App\Post::where('post_author',$user_id)->get();
        // on user delete, delete all his posts and comments's posts
        foreach($posts as $post){
            $comments = \App\Comment::where('post_id',$post->id)->get();
            foreach($comments as $comment){
                $comment->delete();
            }
            $post->delete();
        }
        $user->delete();
        
        return redirect('/admin');
    }
}
