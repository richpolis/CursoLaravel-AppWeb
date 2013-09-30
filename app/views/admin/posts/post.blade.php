@extends('admin.layouts.base')

@section('content')
	
	<div class="row">
		<div class="col-lg-7">
			@if(isset($post))
				{{Form::open(array('method' => 'POST', 'url' => '/admin/posts/edit/'.$post->id, 'role' => 'form'))}}

				<div class="form-group">
					{{Form::label('Titulo')}}
					{{Form::text('title', $post->title, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('title') }}</span>
				</div>
				<div class="form-group">
					{{Form::label('Url')}}
					{{Form::text('url', $post->url, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('url') }}</span>
				</div>
				<div class="form-group">
					{{Form::label('Estado')}}
					{{Form::select('status', array(0 => 'No publicar', 1 => 'Publicar'), array($post->status), array('class' => 'form-control'))}}
				</div>
				<div class="form-group">
					{{Form::label('Categorías')}}
					{{Form::select('categories[]', $categories, Post::onCategories($post->id), array('multiple' => 'multiple', 'class' => 'form-control'))}}
				</div>
				<div class="form-group">
					{{Form::label('Contenido')}}
					{{Form::textarea('content', $post->content, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('content') }}</span>
				</div>
				<div class="form-group">
					<p>{{Form::submit('Modificar artículo', array('class' => 'btn btn-default'))}}</p>
				</div>

				{{Form::close()}}
			@else
				{{Form::open(array('method' => 'POST', 'url' => '/admin/posts/add', 'role' => 'form'))}}

				<div class="form-group">
					{{Form::label('Titulo')}}
					{{Form::text('title', '', array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('title') }}</span>
				</div>
				<div class="form-group">
					{{Form::label('Url')}}
					{{Form::text('url', '', array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('url') }}</span>
				</div>
				<div class="form-group">
					{{Form::label('Estado')}}
					{{Form::select('status', array(0 => 'No publicar', 1 => 'Publicar'), '', array('class' => 'form-control'))}}
				</div>
				<div class="form-group">
					{{Form::label('Categorías')}}
					{{Form::select('categories[]', $categories, array(1), array('multiple' => 'multiple', 'class' => 'form-control'))}}
				</div>
				<div class="form-group">
					{{Form::label('Contenido')}}
					{{Form::textarea('content', '', array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('content') }}</span>
				</div>
				<div class="form-group">
					<p>{{Form::submit('Añadir artículo', array('class' => 'btn btn-default'))}}</p>
				</div>

				{{Form::close()}}
			@endif
			
		</div>
	</div>
		

@stop