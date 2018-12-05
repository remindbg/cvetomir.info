@extends('layouts.app')

@section('meta')
    <title>Cvetomir.info - Личен Блог</title>
    <meta name="description" content="cvetomir.info - Личен Блог - Можете да намерите различни статии, предимно свързани с програмиране и WEB">
    <meta property="og:title" content="cvetomir.info - Личен Блог"/>
    <meta property="og:type" content="blog"/>
@endsection


@section('content')
    <!-- Blog Post -->
    @foreach($articles as $article)
    <div class="card mb-4">
        <div class="card-body">
            <a href="/articles/{{$article->id}}/{{$article->slug}}"><h4 class="">{{$article->title}}</h4></a>
            <p class="small text-muted"> Прегледа {{$article->views}} |  Коментари  | Категория:
                @foreach($article->category as $category)
                <a href="/category/{{$category->id}}/{{$category->slug}}">{{$category->title}}</a>
                @endforeach
            </p>
            <div class="row">
                <div class="col-lg-3">
                    @if($article->image)
                        <div class="row justify-content-center">

                                <img class="img-thumbnail" src="{{url('/images/articles/'.$article->image)}}" style="width: 180px; height: 100px;">

                        </div>
                    @endif
                </div>
                <div class="col-lg-9">
                    <p class="card-text">{!! str_limit(strip_tags($article->body),250) !!}</p>
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