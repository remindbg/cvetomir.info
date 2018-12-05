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
{{route('addcategory',['id' => $article->id])}}">
			@method('post')
			@csrf
			<div class="form-group">
				<label for="title">Добавяне на Категория към: Статия</label>
				<input type="text" value="{{$article->title}}" id="title" disabled class="form-control" name="title">
			</div>
			<div class="form-group">
				<label for="category">Категория</label>
				<select class="form-control" name="category" id="category">
					@foreach($categories as $category)
						<option value="{{$category->id}}">{{$category->title}}</option>
					@endforeach
				</select>
			</div>
			<button type="submit" class="btn btn-block">Добавяне На Категория</button>
		</form>
	</div>
@endsection

