@extends('layouts/main')

@section('MainContent')

<h1>Here's a list of available articles</h1>
<table>
                    <thead>
                        <td>Title</td>
                        <td>Creation Date</td>
                        <td>Author</td>
                        <td>Article</td>
                    </thead>
                    <tbody>
                        @foreach ($Posts as $post)
                        <?php $author = \App\Post::find($post->id)->author ?>
                            <tr>
                             <td><a href="/articles/{{$post->post_title}}">  {{$post->post_title }}</a></td> 
                             <td >{{ $post->created_at}}</td> 
                             <td >{{ $author->name}}</td> 
                             <td >{{ $post->post_content}}</td> 
                            </tr>
                        @endforeach
                    </tbody>
                </table>
@endsection