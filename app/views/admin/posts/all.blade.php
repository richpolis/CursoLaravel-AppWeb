@extends('admin.layouts.base')

@section('content')
	<table class="table">
		<thead>
			<tr>
				<td>Título</td>
				<td>Autor</td>
				<td>Fecha</td>
				<td>Estado</td>
			</tr>
			@foreach($posts as $post)
			<tr>
				<td><a href="/admin/posts/{{$post->id}}">{{$post->title}}</a></td>
				<td>{{Post::find($post->id)->user->username}}</td>
				<td>{{$post->created_at}}</td>
				@if($post->status == 0)
					<td><span class="glyphicon glyphicon-save"></span></td>
				@else
					<td><span class="glyphicon glyphicon-ok"></span></td>
				@endif
			</tr>
			@endforeach
		</thead>
	</table>
@stop