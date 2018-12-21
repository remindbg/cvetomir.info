@extends('layouts.adminlayout')

@section('title','Редакция Коментар')

@section('content')
	<div class="col-lg-8">
		@if(session()->has('message'))
			<div class="alert alert-warning">
				{{ session()->get('message') }}
			</div>
		@endif
		<a href="/admin/comments">
			<button type="button"
			        class="btn-sm btn btn-success">Всички Коментари</button></a>
		<hr>
		<form method="post" action="
{{route('updatecomment',['id' => $comment->id])}}">
			@method('post')
			@csrf
			<div class="form-group">
				<label for="title">име</label>
				<input type="text" value="{{$comment->name}}" id="name" class="form-control" name="name">
			</div>
			<div class="form-group">
				<label for="title">име</label>
				<input type="text" value="{{$comment->email}}" id="email" class="form-control" name="email">
			</div>
			<div class="form-group">
				<label for="comment">Comment:</label>
				<textarea class="form-control" rows="5" id="comment" name="body">{{$comment->body}}</textarea>
			</div>
			<div class="form-group">
				<div class="form-check">
					<input class="form-check-input" @if($comment->active == true) checked="checked" @endif name="active" type="checkbox" value="" id="defaultCheck1">
					<label class="form-check-label" for="defaultCheck1">
						Одобрен?
					</label>
				</div>
			</div>
			<button type="submit" class="btn btn-block">Редактиране на Коментар</button>
		</form>
	</div>
@endsection

