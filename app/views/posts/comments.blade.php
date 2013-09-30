<h4 style="margin-top:200px;">Escribe tu comentario</h4>

@if(Session::has('user_id'))

	{{Form::open(array('method' => 'POST', 'url' => '/post/'.$post->id.'/comment', 'role' => 'form'))}}

	<div class="form-group">
		{{Form::label('Usuario')}}
		{{Form::text('username', Session::get('user_username'), array('class' => 'form-control', 'readonly' => 'readonly'))}}
		<span class="help-block">{{ $errors->first('username') }}</span>
	</div>
	<div class="form-group">
		{{Form::label('Comentario')}}
		{{Form::textarea('comment', '', array('class' => 'form-control'))}}
		<span class="help-block">{{ $errors->first('comment') }}</span>
	</div>
	<div class="form-group">
		<p>{{Form::submit('Enviar comentario', array('class' => 'btn btn-default'))}}</p>
	</div>

	{{Form::close()}}

	<hr>
	<h5>Todos los comentarios</h5>

	@if(count($comments) > 0)
		@foreach($comments as $comment)
			<div class="panel panel-default">
				<div class="panel-heading">Autor: {{User::find($comment->user_id)->username}}</div>
				<div class="panel-body">
					{{$comment->comment}}
				</div>
			</div>
		@endforeach
	@else
		<p>No hay comentarios, ¡escribe el primero!</p>
	@endif

@else
	<p>Necesitas estar <a href="/login">Identificado</a> para comentar</p>
@endif