@extends('layouts.app')
@section('title','Foto')

@section('content')
    
    <img class="thumbnail img-thumbnail img-responsive" src="{{ Storage::disk('public')->url($foto) }}">

    {!! Form::open(['route'=>['reg.index'],'method'=>'GET']) !!}
    <div class="form-group">
        {!! Form::submit('Regresar',['class'=>'btn btn-danger btn-lg btn-block']) !!}   
    </div>
    {!! Form::close() !!}

@endsection
