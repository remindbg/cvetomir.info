<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Cvetomir">

    @yield('meta')
<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-121116559-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-121116559-2');
    </script>


    <!-- Bootstrap core CSS -->
    <link href="{{URL::Asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{URL::Asset('css/blog-home.css')}}" rel="stylesheet">
    {{--prismJS--}}
    <link href='{{URL::Asset('vendor/tinymce/plugins/codesample/css/prism.css')}}' rel="stylesheet"/>
    <style>
        .fix {
            padding-top:40px;
        }
    </style>
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">Cvetomir.info</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-left">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Категории
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($cats as $cat)
                        <a class="dropdown-item" href="/category/{{$cat->id}}/{{$cat->slug}}">{{$cat->title}}</a>
                        @endforeach
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/projects">Проекти</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Контакт</a>
                </li>
                @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/" target="_blank">Admin Panel</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>