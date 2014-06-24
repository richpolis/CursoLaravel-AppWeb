@extends('layout')

@section('contenido')
	<div class="container">
    	<div class="row">
            <div class="col-lg-6">
                <h1>Sign Up</h1>
                {{Form::open(['route'=>'register','method'=>'POST','role'=>'form','novalidate'])}}
                <p>                     
                        {{ Field::text('full_name') }}

                        {{ Field::email('email') }}

                        {{ Field::password('password') }}
                        
                        {{ Field::password('password_confirmation',['placeholder'=>'Repite la contraseña']) }}
                </p>
                <p>
        			<input type="submit" value="Registrar" class="btn btn-success"/>        
                </p>
                {{Form::close()}}
            </div>
        </div>    
	</div>

@stop	