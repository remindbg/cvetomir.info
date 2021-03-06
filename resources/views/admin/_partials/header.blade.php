<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>cvetomir.info Admin</title>
    <!-- Bootstrap core CSS -->
    <link href="{{URL::Asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{URL::Asset('css/blog-home.css')}}" rel="stylesheet">
    @yield('custom-css')

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-left">
                <li class="nav-item active">
                    <a class="nav-link" href="/admin/articles">Articles
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/categories">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/tags">Tags</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/comments">Comments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/" target="_blank">Към Блога</a>
                </li>
            </ul>
        </div>
    </div>
</nav>