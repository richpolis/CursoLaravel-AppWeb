@extends('layout')

@section('contenido')
	<div class="container">
    	<div class="row">
            <div class="col-lg-6">
                <h1>Edita tu perfil</h1>
                {{Form::model($candidate,['route'=>'update_profile','method'=>'PUT','role'=>'form','novalidate'])}}
                <p>                     
                        {{ Field::url('website_url') }}

                        {{ Field::textarea('description') }}

                        {{ Field::select('job_type',$job_types) }}

                        {{ Field::select('categoria_id',$categories) }}

                        {{ Field::checkbox('available') }}
                        
                </p>
                <p>
        			<input type="submit" value="Registrar" class="btn btn-success"/>        
                </p>
                {{Form::close()}}
            </div>
        </div>    
	</div>

@stop	