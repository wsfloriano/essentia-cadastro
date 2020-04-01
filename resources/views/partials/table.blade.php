<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-list"></i> Clientes</h3>
        </div>
		<div class="panel-body">
			@if	($clientes->count() >= 1)
			<div class="table-responsive">
				<table class="table table-hover table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th width="90">Foto</th>
							<th>Nome</th>
							<th>Email</th>
							<th>Telefone</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						@foreach($clientes as $cliente)
						<tr>
							<td>{{ $cliente->id }}</td>
							<td width="90">
								@foreach($cliente->fotos as $foto)
									<img class="thumb_tiny" src="{{ asset('public/images/'.$foto->thumb_tiny) }}" width="90">
								@endforeach
							</td>
							<td>{{ $cliente->name }}</td>
							<td>{{ $cliente->email }}</td>
							<td>{{ $cliente->telefone }}</td>
							<td>
								<a class="btn btn-info" href="{{ route('clientes.edit', $cliente->id) }}">
									<i class="fa fa-edit"></i>
									Editar Cliente
								</a>
								<form action="/clientes" method="post" enctype="multipart/form-data">
									@csrf
									@method('DELETE')
									<input type="hidden" name="id" value="{{$cliente->id}}">
									<button type="submit" class="btn btn-danger btn-delete">

									  <i class="fa fa-trash-o"></i>
									  Excluir Cliente
									</button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			@else
			<div>
				<span>Não há registros de clientes.</span>
			</div>
			@endif
		</div>
	</div>
</div>