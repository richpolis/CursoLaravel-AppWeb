@extends('layout')

@section('contenido')
	<div class="container">
    	<div class="row">
            <div class="col-lg-6">
                <h1>Sign Up</h1>
                {{Form::open(['route'=>'register','method'=>'POST','role'=>'form','novalidate'])}}
                <p>
                	<div class="form-group">
                    	{{Form::label('full_name','Nombre completo')}}
                        {{Form::text('full_name',null,['class'=>'form-control'])}}
                        {{$errors->first('full_name','<p class="error-message">:message</p>')}}
                	</div>
                	<div class="form-group">
                    	{{Form::label('email','Email')}}
                        {{Form::email('email',null,['class'=>'form-control'])}}
                        {{$errors->first('email','<p class="error-message">:message</p>')}}
                	</div>
                    <div class="form-group">
                    	{{Form::label('password','Contraseña')}}
                        {{Form::password('password',['class'=>'form-control'])}}
                        {{$errors->first('password','<p class="error-message">:message</p>')}}
                	</div>
                    <div class="form-group">
                    	{{Form::label('password_confirmation','Repetir contraseña')}}
                        {{Form::password('password_confirmation',['class'=>'form-control'])}}
                        {{$errors->first('password_confirmation','<p class="error-message">:message</p>')}}
                	</div>
                </p>
                <p>
        			<input type="submit" value="Registrar" class="btn btn-success"/>        
                </p>
                {{Form::close()}}
            </div>
        </div>    
	</div>

@stop	