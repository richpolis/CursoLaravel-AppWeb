@extends('layouts.base')

@section('content')

    @if(count($posts) > 0)
        @foreach($posts as $post)
        	<div class="panel panel-default">
        		<div class="panel-heading"><h3><a href="/articulo/{{$post->url}}">{{$post->title}}</a></h3></div>
        		<div class="panel-body">
        		{{$post->content}}
        		</div>
        	</div>
        @endforeach

        {{$posts->links()}}

    @else
        No hay artículos aún
    @endif
@stop