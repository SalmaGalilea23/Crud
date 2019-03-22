@extends('superheroes.layout')

@section('content')
<h1 class="text-center">LIST DE SUPERHÉROES</h1>
<hr>

<div class="container">
<a class="btn btn-primary mb-3" href="{{ route('superheroes.create') }}">Crear Superhéroe</a>
<a class="btn btn-primary mb-3 float-right" href="{{ url('superheroes.show') }}">imprimir</a>

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-striped">
  <thead class="table-primary">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Poder</th>
      <th scope="col">Creador</th>
      <th scope="col">Villano</th>
      <th class="text-center" colspan="2" scope="col">Acciones</th>

    </tr>
  </thead>
  <tbody>
  @foreach($mueblerias as $muebleria)
    <tr>
      <th scope="row">{{ $superheroe->id }}</th>
      <td>{{ $superheroe->nombre }}</td>
      <td>{{ $superheroe->poder }}</td>
      <td>{{ $superheroe->creador }}</td>
      <td>{{ $superheroe->villano }}</td>
      <td><a class="btn btn-info " href="{{ route( 'superheroes.edit',$superheroe->id) }}"><i class="far fa-edit"></i></a> </td>
      <td>
        <a class="btn btn-danger" data-toggle="modal" data-target="#confirmarBorrar-{{ $superheroe->id }}" ><i class="fas fa-trash-alt"></i></a>
      </td>
    </tr>
    @include('superheroes.confirmarBorrar')
    @endforeach

    
  </tbody>
</table>

{{$superheroes->links()}}

</div>
@endsection
