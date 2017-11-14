@extends('layouts.app') <!--le decimos que hereda del template-->

@section('title','RM | Crear Registro') <!--le especificamos el titulo de la pagina-->

@section('content')

	{!! Form::open(['route'=>'reg.store','files'=>'true','method'=>'POST']) !!}

	<div class="form-group">
		{!! Form::label('name','kilometros') !!}
		{!! Form::number('kilometros',0,['class'=>'form-control','required']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('name','gasolina') !!}
		{!! Form::number('gasolina',0,['class'=>'form-control','required']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('name','kilos') !!}
		{!! Form::number('kilos',0,['class'=>'form-control','required']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('image','Foto') !!}
		{!! Form::file('image') !!}
	</div>
	
	<hr>

	<div class="form-group">
		{!! Form::submit('Crear',['class'=>'btn btn-primary btn-lg btn-block']) !!}	
	</div>
	
	{!! Form::close() !!}

	{!! Form::open(['route'=>['reg.index'],'method'=>'GET']) !!}
	<div class="form-group">
		{!! Form::submit('Cancelar',['class'=>'btn btn-danger btn-lg btn-block']) !!}	
	</div>
	{!! Form::close() !!}

@endsection