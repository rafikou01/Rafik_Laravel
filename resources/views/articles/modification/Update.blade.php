@extends('articles.modification.principal')

@section('articleCreation')

<h5>Modifier un article</h5>

<?php $post = \App\Post::find($post_id); ?>

<form action= <?php echo'/profile/updateArticle/'.$post_id ;?> method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="post_title">Titre de votre article</label>
                            <input type="text" class="form-control {{ $errors->has('post_title') ? 'is-invalid' : '' }}" name="post_title" id="post_title" placeholder="{{$post->post_title}}"
                                value="{{ old('post_title') }}"> {!! $errors->first('post_title', '
                                <div class="invalid-feedback">:message</div>') !!}
                        </div>


                        <div class="form-group">
                            <label for="post_category">Catégorie de votre article</label>
                            <input type="text" class="form-control {{ $errors->has('post_category') ? 'is-invalid' : '' }}" name="post_category" id="post_category" placeholder="{{$post->post_category}}"
                                value="{{ old('post_category') }}"> {!! $errors->first('post_category', '
                                <div class="invalid-feedback">:message</div>') !!}
                        </div>
                      
                        
                        <div class="form-group">
                             <label for="post_content">Contenu de votre article</label>
                            <textarea class="form-control {{ $errors->has('post_content') ? 'is-invalid' : '' }}" name="post_content" id="post_content" placeholder="{{$post->post_content}}">{{ old('post_content') }}</textarea>                            {!! $errors->first('contact_message', '
                            <div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <button type="submit" class="btn btn-secondary">Envoyer !</button>
                    </form>

<div>  

@endsection

