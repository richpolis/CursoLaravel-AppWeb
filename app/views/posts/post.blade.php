@extends('layouts.base')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading"><h3><a href="/articulo/{{$post->url}}">{{$post->title}}</a></h3></div>
		<div class="panel-body">
		{{$post->content}}
		</div>
	</div>

    @include('posts.comments')
@stop