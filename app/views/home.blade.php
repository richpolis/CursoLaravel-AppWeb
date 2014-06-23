@extends('layout')

@section('contenido')
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Postulate!</h1>
        <p>Postulate.</p>
        <p><a class="btn btn-primary btn-lg" role="button" href="{{route('sign_up')}}">Postulate</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <h1>Ultimos cadidatos</h1>
        @foreach($lasted_candidates as $category)
        <h2>{{$category->name}}</h2>
        <table class="table table-striped">
        	<thead>
            	<tr>
                	<th>Nombre</th>
                    <th>Tipo de trabajo</th>
                    <th>Descripcion</th>
                    <th>Ver</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category->candidates as $candidate)
                <tr>
                    <td>{{$candidate->user->full_name}}</td>
                    <td>{{$candidate->job_type_title}}</td>
                    <td>{{$candidate->description}}</td>
                    <td width="50">
                        <a href="{{route('candidate',[$candidate->slug,$candidate->id])}}" class="btn btn-info">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <p>
            <a href="{{route('category',[$category->slug,$category->id])}}">
            	Ver todos en {{$category->name}}	
            </a>
        </p>
        @endforeach
    </div> <!-- /container -->
@stop