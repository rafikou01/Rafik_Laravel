@extends('layouts/main')

@section('MainContent')

<table>
                    <thead>
                        <td>Title</td>
                        <td>Creation Date</td>
                    </thead>
                    <tbody>
                        @foreach ($Posts as $post)
                            <tr>
                             <td><a href="/articles/{{$post->post_title}}">  {{$post->post_title }}</a></td> 
                                <td >{{ $post->created_at}}</td> 
                            </tr>
                        @endforeach
                    </tbody>
                </table>
@endsection

