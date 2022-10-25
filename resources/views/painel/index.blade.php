@extends('layouts.app')

@section('content')

<div class="box">
	<div class="box-content">
		<div class="panel">
			<h3>Total de inadimplentes</h3>
			<h4>R$ DIVIDA DE TODOS OS CLIENTES</h4>
		</div>
		<div class="actions">
			<div class="row justify-content-end">
				<div class="col-sm-3">
					<a href="{{ route('register-client') }}" type="button" class="btn btn-primary">Cadastrar novo cliente</a>
				</div>
			</div>
		</div>
		<table class="table mt-4">
		  <tr>
			<th width="5%">#</th>
			<th width="25%">Nome</th>
			<th width="25%">E-mail</th>
			<th width="15%">Documento</th>
			<th width="15%"></th>
		  </tr>

	  	@foreach($clients as $key => $client)

		  <tr>
			<td>{{ $client->accountNumber }}</td>
			<td>{{ $client->name }}</td>
			<td>{{ $client->email }}</td>
			<td>{{ $client->document }}</td>
			<td style="display: flex;">
				<a href="{{ route('edit-client', ['id' => $client->id]) }}" class="fa fa-edit editBtn" type="button"></a> 
				<button class="fa fa-address-card-o modalBtn" data-bs-toggle="modal" data-bs-target="#datailModal{{ $client->accountNumber }}" ></button>
					<form action="{{ route('delete-client', ['id' => $client->id]) }}" method="POST">
						@csrf
						@method('delete')
						<button type="submit" class="fa fa-trash deleteBtn" onclick="return confirm('Deseja exluir esse registro?')"></button>
					</form>
				</td>
		  </tr>
		@include('painel.modal')
		@endforeach
		</table>
      	<div class="pag" >
          {{ $clients->links( "pagination::bootstrap-4") }}
        </div>
	</div>
</div>
<script>
</script>
		
@include('painel.style')

@endsection