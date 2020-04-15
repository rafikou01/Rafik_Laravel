@extends('articles.messageForm')
<!-- comments view extends messageForm wich extends single view -->
@section('articleComments')

@foreach ($comments as $comment)
  <div>
        <ul>
                       <li> {{ $comment->comment_date}}</li>
                       <li> {{ $comment->comment_name}}</li>
                       <li> {{ $comment->comment_message}}</li>
                       
        </ul>  
  </div> 
  @endforeach  

  @endsection