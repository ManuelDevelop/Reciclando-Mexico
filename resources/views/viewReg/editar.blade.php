@extends('layouts.app') <!--le decimos que hereda del template-->

@section('title','RM | Ediatr Registro') <!--le especificamos el titulo de la pagina-->

@section('content')

	{!! Form::open(['route'=>['reg.update',$reg],'files'=>'true','method'=>'PUT']) !!}

	{{ csrf_field() }}

	<div class="form-group">
		{!! Form::label('name','kilometros') !!}
		{!! Form::number('kilometros',$reg->kilometros,['class'=>'form-control','required']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('name','gasolina') !!}
		{!! Form::number('gasolina',$reg->gasolina,['class'=>'form-control','required']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('name','kilos') !!}
		{!! Form::number('kilos',$reg->kilos,['class'=>'form-control','required']) !!}
	</div>

	<img class="thumbnail img-thumbnail img-responsive" src="{{ Storage::disk('public')->url($reg->foto->picture) }}">
	
	<div class="form-group">
		{!! Form::label('image','Foto') !!}
		{!! Form::file('image') !!}
	</div>

	<hr>

	<div class="form-group">
		{!! Form::submit('Actualizar',['class'=>'btn btn-primary btn-lg btn-block']) !!}	
	</div>

	{!! Form::close() !!}

	{!! Form::open(['route'=>['reg.index'],'method'=>'GET']) !!}
	<div class="form-group">
		{!! Form::submit('Cancelar',['class'=>'btn btn-danger btn-lg btn-block']) !!}	
	</div>
	{!! Form::close() !!}

@endsection