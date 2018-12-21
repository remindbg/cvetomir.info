@extends('layouts.adminlayout')

@section('title','Всички Коментари')

@section('content')
	<div class="col-lg-8">
		@if(session()->has('message'))
			<div class="alert alert-success">
				{{ session()->get('message') }}
			</div>
		@endif

		<hr>
		<table class="table table-hover">
			<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">name</th>
				<th scope="col">email</th>
				<th scope="col">тяло на комент</th>
				<th scope="col">Одобрена?</th>

				<th scope="col">Дата</th>
				<th scope="col">Редакция</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				@foreach($comments as $comment)
					<th scope="row">{{$comment->id}}</th>
					<td>{{$comment->name}}</td>
					<td>{{$comment->email}}</td>
					<td>@if($comment->active == true)Да @else Не @endif</td>

					<td>{{ str_limit(strip_tags($comment->body), 20) }}</td>
					<td>{{$comment->created_at}}</td>
					<td> <form method="POST" action="{{route('deletecomment',['id' => $comment->id])}}">
							@method('delete')
							@csrf
							<a href="{{route('editcomment',['id'=>$comment->id])}}">
								<button type="button" class="btn-sm btn btn-warning">Edit</button>
							</a>
							<a onclick="return confirm('Are you sure?')" href="/admin/comments/destroy/{{$comment->id}}">
								<button type="submit" class="btn btn-danger btn-sm">Delete</button></a>
						</form>

					</td>
			</tr>
			@endforeach
			</tbody>
		</table>
	</div>

@endsection