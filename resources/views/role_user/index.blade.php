@extends ('layouts.layout')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado De Usuario Con Asignacion De Rol <a href="User_Role/create"><button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Asignar Rol Al Usuario</button></a></h3>
		@include('role_user.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Usuario</th>
					<th>Rol Del Usuario</th>
				</thead>

				@foreach($role_user as $ur)
				
				<tr>
					<td>{{$ur->id}}</td>
					<td>{{$ur->name}}</td>
					<td>{{$ur->description}}</td>
					<td>
						<a href="" data-target="#modal-delete-{{$ur->id}}" data-toggle="modal"><button class="btn btn-danger"> <span class="glyphicon glyphicon-trash"></span> Eliminar</button></a>
					</td>
				</tr>
				@include('role_user.modal')
				@endforeach
				
			</table>
		</div>
		{{$role_user->render()}}
	</div>
</div>

@endsection