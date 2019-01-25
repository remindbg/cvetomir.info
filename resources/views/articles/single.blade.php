@extends('layouts.app')

@section('meta')
    <title>{{$article->title}} Cvetomir.info</title>
    <meta name="description" content="{{$article->title}} - cvetomir.info - Личен Блог">
    <meta name="keywords" content="{{$article->tags}}">
    <meta property="og:image" content="@if($article->image){{url('/images/articles/'.$article->image)}}@endif"/>
    <meta property="og:title" content="{{$article->title}}"/>
    <meta property="og:type" content="blog"/>
@endsection
@section('content')

    <!-- Blog Post -->
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title">{{$article->title}}</h2>
            <p class="small text-muted"> Прегледа {{$article->views}} | Коментари</p>
            @if($article->image)
            <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <img class="img-thumbnail" src="{{url('/images/articles/'.$article->image)}}" alt="">
            </div>
            </div>
                @endif
            <p class="card-text">{!! $article->body !!}</p>
        </div>
        <div class="card-footer text-muted">
            <small> <i>Дата: {{$article->created_at->format('j F Y')}}
                    | Етикети: {{$article->tags}}
                </i></small></div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h4 class="card-title">Коментари</h4>

            @foreach($article->comments as $comment)
                @if($comment->active)
                    <div class="card-body">
                        <p class="small text-muted"><a id="{{$loop->iteration}}" href="#{{$loop->iteration -1}}">#{{$loop->iteration}}</a>| Автор: {{$comment->name}}  | Дата: {{$comment->created_at}} </p>
                        <p class="card-text">{{$comment->body}}</p>
                    </div>
                    <hr>
                @endif

             @endforeach

            <form class="small" method="POST" action="{{route('comment.store',$article->id)}}">
                @csrf
                <div class="form-group row ">
                    <label for="name" class="col-2 col-form-label">Име</label>
                    <div class="col-5">
                        <div class="input-group">

                            <input id="name" name="name" type="text" required="required" class="form-control here">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-2 col-form-label">Имейл</label>
                    <div class="col-5">
                        <div class="input-group">

                            <input id="email" name="email" type="email" required="required" class="form-control here">
                        </div>
                    </div>
                </div>
              <input name="invisible" type="hidden" value="{{$captcha[2]}}">
                <div class="form-group row">
                    <label for="body" class="col-2 col-form-label">Коментар</label>
                    <div class="col-7">
                        <textarea id="body" name="body" cols="40" rows="4" required="required" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-4 col-form-label">Моля Пресметнете:  {{$captcha[0]}} + {{$captcha[1]}}</label>
                    <div class="col-3">
                        <div class="input-group">
                            <input id="antispam" name="antispam" type="text" required="required" class="form-control here">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class=" col-7">
                        <button name="submit" type="submit" class="btn btn-primary">Изпращане</button>
                    </div>
                </div>
            </form>



        </div>
    </div>

@endsection


@section('scripts')


@endsection