@extends('layouts/main')

@section('MainContent')

<h3> Espace Membres. </h3>

<h5> Liste de vos articles </h5><br>

<h3><a href="/profile/requestCreateArticle"> Créer un nouvel article? </a></h3>

<table>
                    <thead>
                        <td>Last modified</td>
                        <td>Title</td>
                        <td>Category</td>
                        <td>Content</td>
                        <td>Delet</td>
                        <td>Edit</td>


                    </thead>
                    <tbody>
                    @foreach($personalArticles as $post)
                            <tr>
                             <td >{{ $post->updated_at}}</td>
                             <td><a href="/articles/{{$post->post_title}}">  {{$post->post_title }}</a></td> 
                             <td >{{ $post->post_category}}</td>  
                             <td >{{ $post->post_content}}</td> 
                             <td><a href="/profile/deleteArticle/{{$post->id}}"> Supprimer l'article</a></td> 
                             <td><a href="/profile/requestUpdateArticle/{{$post->id}}"> Modifier l'article</a></td> 

                            </tr>
                        @endforeach
                    </tbody>
                </table>



 @endsection



