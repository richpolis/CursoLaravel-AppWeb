@extends('admin.layouts.base')

@section('content')
	
	<div class="row">
		<div class="col-lg-3">
			@if(!isset($category))
				{{Form::open(array('method' => 'POST', 'url' => '/admin/categories/add', 'role' => 'form'))}}

				<div class="form-group">
					{{Form::label('Nombre')}}
					{{Form::text('name', '', array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('name') }}</span>
				</div>
				<div class="form-group">
					{{Form::label('Url')}}
					{{Form::text('url', '', array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('url') }}</span>
				</div>
				<div class="form-group">
					{{Form::label('Descripcion')}}
					{{Form::textarea('description', '', array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('description') }}</span>
				</div>
				<div class="form-group">
					<p>{{Form::submit('Crear categoría', array('class' => 'btn btn-default'))}}</p>
				</div>

				{{Form::close()}}
			@else
				{{Form::open(array('method' => 'POST', 'url' => '/admin/categories/edit/'.$category->id, 'role' => 'form'))}}

				<div class="form-group">
					{{Form::label('Nombre')}}
					{{Form::text('name', $category->name, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('name') }}</span>
				</div>
				<div class="form-group">
					{{Form::label('Url')}}
					{{Form::text('url', $category->url, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('url') }}</span>
				</div>
				<div class="form-group">
					{{Form::label('Descripcion')}}
					{{Form::textarea('description', $category->description, array('class' => 'form-control'))}}
					<span class="help-block">{{ $errors->first('description') }}</span>
				</div>
				<div class="form-group">
					<p>{{Form::submit('Modificar categoría', array('class' => 'btn btn-default'))}}</p>
				</div>

				{{Form::close()}}
			@endif
		</div>
		<div class="col-lg-6">
			<table class="table">
				<thead>
					<tr>
						<td>Nombre</td>
						<td>Url</td>
						<td>Acción</td>
					</tr>
				</thead>
				<tbody>
					@foreach($categories as $cat)
					<tr>
						<td>{{$cat->name}}</td>
						<td>{{$cat->url}}</td>
						<td>
							<a href="/admin/categories/edit/{{$cat->id}}" class="btn btn-default">
							<span class="glyphicon glyphicon-edit"></span> Editar
							</a>
							<a href="/admin/categories/delete/{{$cat->id}}" class="btn btn-default">
							<span class="glyphicon glyphicon-remove"></span> Eliminar
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>

@stop