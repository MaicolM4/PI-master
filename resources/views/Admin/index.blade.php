@extends ('layouts.layout')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Usuarios
        <a href="/register">
                <button class="btn btn-success">Nuevo</button></a></h3>
            
    </div>
    @include('Admin.search')
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
                    <th>Opciones</th>
                </thead>
                @foreach ($admin as $admin)
                <tr>

                    <td>{{ $admin->id}}</td>
                    <td>{{ $admin->name}}</td>
                    <td>{{ $admin->identification}}</td>
                    <td>{{ $admin->email}}</td>
                    <td>{{ $admin->user}}</td>
                
                <td>
                    <a href="{{URL::action('AdminController@edit',$admin->id)}}">
                        <button class="btn btn-info">Editar</button></a>
                    <a href="" data-target="#modal-delete-{{$admin->id}}" data-toggle="modal">
                        <button class="btn btn-danger">Eliminar</button></a>
                    @include('Admin.modal')
                </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection