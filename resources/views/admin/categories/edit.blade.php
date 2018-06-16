@extends('layouts.adminlayout')

@section('title','Редакция')

@section('content')
    <div class="col-lg-8">
        @if(session()->has('message'))
            <div class="alert alert-warning">
                {{ session()->get('message') }}
            </div>
        @endif
            <a href="/admin/categories">
                <button type="button"
                        class="btn-sm btn btn-success">Всички Категории</button></a>
            <hr>
        <form method="post" action="
{{route('categories.update',['id' => $category->id])}}">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="title">Заглавие</label>
                <input type="text" value="{{$category->title}}" id="title" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label for="slug">URL Slug</label>
                <input type="text"  id="slug" value="{{$category->slug}}" class="form-control" name="slug">
            </div>
            <button type="submit" class="btn btn-block">Редакция</button>
        </form>
    </div>
@endsection

