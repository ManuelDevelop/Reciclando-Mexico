@extends('layouts.app') <!--le decimos que hereda del template-->

@section('title','RM | Mis Registros') <!--le especificamos el titulo de la pagina-->

@section('content')
	
	<a href="{{ route('reg.create') }}" class="btn btn-info">Crear nuevo registro</a><br><br>
	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Kilometros</th>
			<th>Gasolina</th>
			<th>Kilos</th>
			<th>Acciones</th>
		</thead>
		<tbody>
		@foreach($listreg as $reg)
			<tr>
				<td> {{$reg->id }} </td>
				<td> {{ $reg->kilometros }} </td>
				<td> {{ $reg->gasolina }} </td>
				<td> {{ $reg->kilos }} </td>
				<td><a href="" class="btn btn-danger"></a><a href="" class="btn btn-warning"></a></td>
			</tr>
		@endforeach
		</tbody>
	</table>
	{!! $listreg->render() !!}
@endsection