@extends ('layouts.layout')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Roles <a href="/roles/create">
                <button class="btn btn-success">Nuevo</button></a></h3>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Id</th>
                    <th>Cargo</th>
                    <th>Descripción</th>
                    <th>Opciones</th>
                </thead>
                @foreach ($roles as $roles)
                <tr>
                    <td>{{ $roles->id}}</td>
                    <td>{{ $roles->name}}</td>
                    <td>{{ $roles->description}}</td>
                    <td>
                        <a href="{{URL::action('RolesController@edit',$roles->id)}}">
                            <button class="btn btn-info">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$roles->id}}" data-toggle="modal">
                            <button class="btn btn-danger">Eliminar</button></a>
                    </td>
                </tr>
                @include('roles.modal')
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection