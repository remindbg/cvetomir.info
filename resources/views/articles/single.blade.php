@extends('layouts.app')

@section('meta')
    <title>{{$article->title}} Cvetomir.info</title>
    <meta name="description" content="{{$article->title}} - cvetomir.info - Личен Блог">
    <meta name="keywords" content="{{$article->tags}}">
    <meta property="og:image" content="@if($article->image){{$article->image}}@endif"/>
    <meta property="og:title" content="{{$article->title}}"/>
    <meta property="og:type" content="blog"/>
@endsection
@section('content')

    <!-- Blog Post -->
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title">{{$article->title}}</h2>
            <p class="small text-muted"> Pregleda {{$article->views}} | Коментари</p>
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
    {{--end articles --}}
    <div class="card mb-4">
        <div class="card-body">
            <h4 class="card-title">Коментари</h4>

            <div class="row">

                <div class="col-lg-9">
                    <p class="card-text">Коментарите ще дойдат много скоро : )</p>
                    <hr>
                    <small>~~~~</small>

                </div>
            </div>
        </div>

    </div>

@endsection


@section('scripts')


@endsection