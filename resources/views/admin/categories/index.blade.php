@extends('layouts.adminlayout')

@section('title','Всички Категории')

@section('content')
    <div class="col-lg-8">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <a href="/admin/categories/create">
            <button type="button" 
                    class="btn-sm btn btn-success">Нова Категория</button></a>
        <hr>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">slug</th>
                <th scope="col">Редакция</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
            <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->title}}</td>
                <td>{{$category->slug}}</td>
                <td> <form method="POST" action="{{route('categories.destroy',['id' => $category->id])}}">
                        @method('delete')
                        @csrf

                        <a href="{{route('categories.edit',['id'=>$category->id])}}">
                        <button type="button" class="btn-sm btn btn-warning">Edit</button>
                    </a>

                    <a onclick="return confirm('Are you sure?')" href="/admin/categories/destroy/{{$category->id}}">
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button></a>
                    </form>

                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection