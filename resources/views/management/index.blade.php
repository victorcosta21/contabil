@extends('layouts.app')

@section('content')
<div class="box">
	<div class="box-content">
		<div class="head">
			<div class="row" style="text-align:center;">
				<div class="col-md-3" >
					<h4>Despesas do Dia</h4>
					<h5 class="spending">R$ 100,00</h5>
				</div>
				<div class="col-md-3">
					<h4>Despesas da Semana</h4>
					<h5 class="spending">R$ 700,00</h5>
				</div>
				<div class="col-md-3">
					<h4>Despesas da Mês</h4>
					<h5 class="spending">R$ 3100,00</h5>
				</div>
			</div><br>
			<div class="row justify-content-end">
				<div class="col-sm-3">
					<a href="{{ route('register-spending') }}" type="button" class="btn btn-primary">Adicionar Despesa</a>
				</div>
			</div>
		</div>

		<table class="table mt-4">
		  <tr>
			<th width="5%">#</th>
			<th width="10%">Tipo</th>
			<th width="5%">Data</th>
			<th width="10%">Valor</th>
			<th width="15%">Descrição</th>
			<th width="5%">Inspecionar</th>
		  </tr>

		  <tr>
		  	<td>1</td>
		  	<td>Equipamento</td>
		  	<td>25/11/2022</td>
		  	<td>R$300,00</td>
		  	<td>Compra de Equipamento par...</td>
		  	<td style="display: flex;">
		  		<button class="fa fa-address-card-o modalBtn" data-bs-toggle="modal" data-bs-target="#datailModal"></button>
		  		</td>
		  </tr>
			@include('management.modal')

		</table>



	</div>
</div>
@include('management.style')
@endsection