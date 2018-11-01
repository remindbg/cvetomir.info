@extends('layouts.app')

@section('meta')
    <title>Категория: {{$category->title}} Cvetomir.info</title>
    <meta name="description" content="{{$category->title}} - cvetomir.info - Личен Блог">
    <meta property="og:image" content=""/>
    <meta property="og:title" content="{{$category->title}}"/>
    <meta property="og:type" content="blog"/>
@endsection

@section('content')

    <!-- Blog Post -->
    @foreach($articles as $article)
        <div class="card mb-4">
            <div class="card-body">
                <a href="/articles/{{$article->id}}/{{$article->slug}}"><h4 class="">{{$article->title}}</h4></a>
                <p class="small text-muted"> Прегледа {{$article->views}} |  Коментари  | Категория: <a href="/category/{{$article->category->id}}/{{$article->category->slug}}">{{$article->category->title}}</a></p>
                <div class="row">
                    <div class="col-lg-9">
                        <p class="card-text">{!! strip_tags($article->body) !!}</p>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <small> <i>Дата: {{$article->created_at->format('j F Y')}}
                        | Етикети: {{$article->tags}}
                    </i></small></div>
        </div>
    @endforeach

@endsection