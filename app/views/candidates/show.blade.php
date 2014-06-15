@extends('layout');

@section('contenido')
	<div class="container">
    	<h1>{{$candidate->user->full_name}}</h1>
        <p>
            Categoria: <a href="{{route('category',[$candidate->category->slug,$candidate->category->id])}}">
            {{ $candidate->category->name }}
            </a>
        </p>
        <p>
            Tipo de trabajo: {{ $candidate->job_type_title }}
        </p>
        <p>
        	Web site: <a href="{{ $candidate->website_url }}">{{ $candidate->website_url }}</a>
        </p>
        <h4>Descripcion</h4>
        <p>
        	{{ $candidate->description }} 
        </p>
        
	</div>		
@stop