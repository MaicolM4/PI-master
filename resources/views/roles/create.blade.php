@extends ('layouts.layout')
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Nuevo Rol</h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {!!Form::open(array('url'=>'roles','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
        <div class="form-group">
            <label for="descripcion">Crear Rol/Cargo</label>

        </div>
        <div class="form-group">
            <label for="descripcion">Cargo</label>
            <input type="text" name="name" class="form-control" placeholder="Cargo...">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" name="description" class="form-control" placeholder="Funcionalidades del cargo...">
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
        {!!Form::close()!!}
    </div>
</div>
@endsection