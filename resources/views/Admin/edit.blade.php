@extends ('layouts.layout')
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar Usuario</h3>

        <form method="POST" action="{{route('admin.update',$admin->id)}}" role="form">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="PATCH">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{$admin->name}}">
            </div>
            <div class="form-group">
                <label for="descripcion">No. Identificación</label>
                <input type="text" name="identification" class="form-control" placeholder="Identificación" value="{{$admin->identification}}">
            </div>
            <div class="form-group">
                <label for="descripcion">Correo</label>
                <input type="text" name="email" class="form-control" placeholder="Correo" value="{{$admin->email}}">
            </div>
            <div class="form-group">
                <label for="descripcion">Usuario</label>
                <input type="text" name="user" class="form-control" placeholder="Usuario" value="{{$admin->user}}">
            </div>
           
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Editar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
        </form>
    </div>
</div>
@endsection