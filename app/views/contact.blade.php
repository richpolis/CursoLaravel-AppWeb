@extends('layouts.base')

@section('content')

	{{Form::open(array('method' => 'POST', 'url' => '/contact', 'role' => 'form'))}}

	@if(Session::has('estado'))
		<h3>{{Session::get('estado')}}</h3></br>
	@endif

	<div class="form-group">
		{{Form::label('Tu nombre')}}
		@if(Session::has('user_id'))
			{{Form::text('nombre', User::find(Session::get('user_id'))->username, array('readonly' => 'readonly', 'class' => 'form-control'))}}
		@else
			{{Form::text('nombre', '', array('class' => 'form-control'))}}
		@endif
		<span class="help-block">{{ $errors->first('nombre') }}</span>
	</div>
	<div class="form-group">
		{{Form::label('Tu email')}}
		@if(Session::has('user_id'))
			{{Form::text('email', User::find(Session::get('user_id'))->email, array('readonly' => 'readonly', 'class' => 'form-control'))}}
		@else
			{{Form::text('email', '', array('class' => 'form-control'))}}
		@endif
		<span class="help-block">{{ $errors->first('email') }}</span>
	</div>
	<div class="form-group">
		{{Form::label('Asunto')}}
		{{Form::text('asunto', '', array('class' => 'form-control'))}}
		<span class="help-block">{{ $errors->first('asunto') }}</span>
	</div>
	<div class="form-group">
		{{Form::label('Mensaje')}}
		{{Form::textarea('mensaje', '', array('class' => 'form-control'))}}
		<span class="help-block">{{ $errors->first('mensaje') }}</span>
	</div>
	<div class="form-group">
		<p>{{Form::submit('Enviar', array('class' => 'btn btn-default'))}}</p>
	</div>

	{{Form::close()}}

@stop