@extends('layouts.app') <!--le decimos que hereda del template-->

@section('title','RM | Ediatr Registro') <!--le especificamos el titulo de la pagina-->

@section('content')

	{!! Form::open(['route'=>['reg.update',$reg],'method'=>'PUT']) !!}

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
	
	<div class="form-group">
		{!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}	
	</div>
	
	{!! Form::close() !!}

@endsection