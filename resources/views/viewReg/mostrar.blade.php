@extends('layouts.app') <!--le decimos que hereda del template-->

@section('title','RM | Mis Registros') <!--le especificamos el titulo de la pagina-->

@section('content')
	
	<a href="{{ route('reg.create') }}" class="btn btn-info">Crear nuevo registro</a><br><br>
	<div class="table-responsive">
		<table class="table table-striped table-hover table-condensed">
			<thead>
				<th>Kilometros</th>
				<th>Gasolina</th>
				<th>Kilos</th>
				<th>Foto</th>
				<th>Acciones</th>
			</thead>
			<tbody>
				@foreach($listreg as $reg)
				<tr>
					<td> {{ $reg->kilometros }} </td>
					<td> {{ $reg->gasolina }} </td>
					<td> {{ $reg->kilos }} </td>
					<td> 
						<img src="{{ Storage::disk('public')->url($reg->foto->picture) }}" class="thumbnail img-thumbnail img-responsive" width="100px">
					</td>
					<td>
						<a href="{{ route('reg.edit',$reg->id) }}" class="btn btn-warning glyphicon glyphicon-pencil"></a>
						<a href="{{ route('reg.destroy',$reg->id) }}" onclick="return confirm('¿Seguro que deseas eliminar este registro?')" class="btn btn-danger glyphicon glyphicon-remove"></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	{!! $listreg->render() !!}
@endsection