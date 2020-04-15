<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{

    // process article comments
    public function process($post_title)
    {
        $posts = \App\Post::where('post_title', $post_title)->get();
        foreach ($posts as $post) {
            $post_id = $post->id;
        }

        $allComments = \App\Comment::where('post_id', $post_id)->get();
        return $allComments;
    }

// get all posts in DB ordered by desc
    public function index()
    {

        $posts = \App\Post::orderBy('post_date', 'desc')->get();
        return view('articles', ['Posts' => $posts]);
    }

    // get the specified post with $post_title
    public function show($post_title)
    {
        $onePost = \App\Post::where('post_title', $post_title)->get();
        // call method process in ShowComments trait.
        //  The method return an array of comments for the article with $post_title
        $comments = $this->process($post_title);

        return view('articles.comments', ['comments' => $comments, 'postArticle' => $onePost]);
    }

    // show $user_id' articles
    public function showPersonal()
    {
        $user_id = Auth::user()->id;
        $onePost = \App\Post::where('post_author', $user_id)->get();

        return view('userAccount', ['personalArticles' => $onePost]);
    }

    public function createRequest()
    {

        return view('articles.modification.create');
    }

    public function create(ArticleRequest $request)
    {
        $user_id = Auth::user()->id;
        $post = new \App\Post;

        $post->post_author = $user_id;
        $post->post_title = $request->post_title;
        $post->post_category = $request->post_category;
        $post->post_content = $request->post_content;
        $post->updated_at = Carbon::now();
        $post->created_at = Carbon::now();
        $post->post_date = Carbon::now();
        $post->post_status = 'default';
        $post->post_name = $request->post_title;
        $post->post_type = 'default';
        $post->save();
        return redirect('/profile');
    }

    public function updateRequest($post_id)
    {

        return view('articles.modification.update', ['post_id' => $post_id]);
    }

    public function update(ArticleRequest $request, $post_id)
    {
        $post = \App\Post::find($post_id);
        $post->post_title = $request->post_title;
        $post->post_category = $request->post_category;
        $post->post_content = $request->post_content;
        $post->updated_at = Carbon::now();
        $post->save();
        return redirect('/profile');
    }

    public function delete($post_id)
    {
        $post = \App\Post::find($post_id);
        $post->delete();
        return redirect('/profile');
    }

}
