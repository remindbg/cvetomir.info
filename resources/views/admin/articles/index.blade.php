@extends('layouts.adminlayout')

@section('title','Всички Публикации')

@section('content')
    <div class="col-lg-8">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <a href="/admin/articles/create"><button type="button" class="btn-sm btn btn-success">Нова Публикация</button></a>
        <hr>
            <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">Одобрена?</th>
                <th scope="col">Категория</th>
                <th scope="col">Дата</th>
                <th scope="col">Редакция</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @foreach($articles as $article)
                <th scope="row">{{$article->id}}</th>
                <td>{{$article->title}}</td>
                <td>{{$article->active}}</td>
                <td>{{$article->category->title}}</td>
                <td>{{$article->created_at}}</td>
                    <td> <form method="POST" action="{{route('articles.destroy',['id' => $article->id])}}">
                            @method('delete')
                            @csrf
                            <a href="{{route('articles.edit',['id'=>$article->id])}}">
                                <button type="button" class="btn-sm btn btn-warning">Edit</button>
                            </a>
                            <a onclick="return confirm('Are you sure?')" href="/admin/articles/destroy/{{$article->id}}">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button></a>
                        </form>

                    </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection