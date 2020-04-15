@extends('articles.single')

@section('articleForm')


@foreach ($postArticle as $post)
<!-- Access the actuel post (id)  -->
@endforeach 


<h3>Laisser un commentaire</h3>
<!-- create new route for each article with article's id -->

<!-- different form for auth and guest -->
<form action= <?php echo'/articles/newComment/'.$post->id ;?> method="POST">
                        {{ csrf_field() }}

                        @if (Auth::guest())
                        <div class="form-group">
                            <input type="text" class="form-control {{ $errors->has('contact_name') ? 'is-invalid' : '' }}" name="contact_name" id="contact_name" placeholder="Votre nom"
                                value="{{ old('contact_name') }}"> {!! $errors->first('contact_name', '
                                <div class="invalid-feedback">:message</div>') !!}
                        </div>
                        @else
                        <div class="form-group" style="display: none;">
                            <input type="text" class="form-control {{ $errors->has('contact_name') ? 'is-invalid' : '' }}" name="contact_name" id="contact_name" placeholder="Votre nom"
                                value="{{ Auth::user()->name }}"> 
                        </div>
                        @endif
                                    
                        @if (Auth::guest())
                        <div class="form-group" >
                            <input type="email" class="form-control {{ $errors->has('contact_email') ? 'is-invalid' : '' }}" name="contact_email" id="contact_email" placeholder="Votre email"
                                value="{{ old('contact_email') }}"> {!! $errors->first('contact_email', '
                                <div class="invalid-feedback">:message</div>') !!}
                        </div>
                        @else
                        <div class="form-group" style="display: none;">
                            <input type="email" class="form-control {{ $errors->has('contact_email') ? 'is-invalid' : '' }}" name="contact_email" id="contact_email" placeholder="Votre email"
                                value="{{ Auth::user()->email }}"> 
                        </div>
                        @endif


                        <div class="form-group">
                            <textarea class="form-control {{ $errors->has('contact_message') ? 'is-invalid' : '' }}" name="contact_message" id="contact_message" placeholder="Votre message">{{ old('contact_message') }}</textarea>                            {!! $errors->first('contact_message', '
                            <div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <button type="submit" class="btn btn-secondary">Envoyer !</button>
                    </form>

<div>                      
@yield('articleComments')  
</div>  


@endsection