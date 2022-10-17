@extends('layouts.app')

@section('content')

<div class="box">
	<div class="box-content">
		<div class="actions">
			<div class="row justify-content-end">
				<div class="col-sm-3">
					<a href="{{ route('register-client') }}" type="button" class="btn btn-primary">Cadastrar novo cliente</a>
				</div>
			</div>
		</div>
		<table class="table">
		  <tr>
			<th width="5%">#</th>
			<th width="30%">Nome</th>
			<th width="25%">Contato Principal</th>
			<th width="30%">email</th>
			<th width="10%"></th>
		  </tr>
		  <tr>
			<td>1</td>
			<td>Maria Anders</td>
			<td>(11)9999-9999</td>
			<td>email@email.com</td>
			<td>VISUALIZAR</td>
		  </tr>
		  <tr>
			<td>2</td>
			<td>Francisco Chang</td>
			<td>(11)9999-9999</td>
			<td>email@email.com</td>
			<td>VISUALIZAR</td>
		  </tr>
		</table>
	</div>
</div>		











@endsection