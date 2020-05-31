@extends ('layouts.layout')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Registrar Usuario
            @include('Prueba.search')
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>No. Identificación</th>
                    <th>Correo</th>
                    <th>Usuario</th>
                </thead>
                @foreach ($prueba as $prueba)
                <tr>

                    <td>{{ $prueba->id}}</td>
                    <td>{{ $prueba->name}}</td>
                    <td>{{ $prueba->identification}}</td>
                    <td>{{ $prueba->email}}</td>
                    <td>{{ $prueba->user}}</td>
                
                <td>
                    <a href="{{URL::action('PruebaController@edit',$prueba->id)}}">
                        <button class="btn btn-info">Editar</button></a>
                    <a href="" data-target="#modal-delete-{{$prueba->id}}" data-toggle="modal">
                        <button class="btn btn-danger">Eliminar</button></a>
                    @include('Prueba.modal')
                </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection