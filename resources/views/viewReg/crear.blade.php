@extends('layouts.app') <!--le decimos que hereda del template-->

@section('title','RM | Crear Registro') <!--le especificamos el titulo de la pagina-->

@section('content')

	{!! Form::open(['route'=>'reg.store','method'=>'POST']) !!}

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
		{!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}	
	</div>
	
	{!! Form::close() !!}

@endsection