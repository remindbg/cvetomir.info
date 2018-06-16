@extends('layouts.adminlayout')

@section('title','Нова Категория')

@section('content')
    <div class="col-lg-8">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <form method="post" action="/admin/categories">
            @csrf
            <div class="form-group">
                <label for="tite">Заглавие</label>
                <input type="text" id="#title" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label for="slug">URL Slug</label>
                <input type="text" id="slug" class="form-control" name="slug">
            </div>


            <button type="submit" class="btn btn-block">Изпращане</button>
        </form>
    </div>
@endsection


