@extends('layouts.app')

@section('content')
<div class="box">
	<div class="box-content">
		<div class="head">
			<div class="row" style="text-align:center;">
				<div class="col-md-3" >
					<h4>Despesas do Dia</h4>
					<h5 class="spending">R$ {{number_format($countDay, 2, ',', '.')}}</h5>
				</div>
				<div class="col-md-3">
					<h4>Despesas da Semana</h4>
					<h5 class="spending">R$ {{number_format($countWeek, 2, ',', '.')}}</h5>
				</div>
				<div class="col-md-3">
					<h4>Despesas da Mês</h4>
					<h5 class="spending">R$ {{number_format($countMonth, 2, ',', '.')}}</h5>
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
			<th width="10%">Data</th>
			<th width="10%">Valor</th>
			<th width="30%">Descrição</th>
			<th width="5%">Inspecionar</th>
		  </tr>
		  @foreach($spendings as $spending)
			  <tr>
			  	<td>{{ $spending->id }}</td>
			  	@if($spending->type == 1)
			  		<td>Equipamento</td>
		  		@elseif($spending->type == 2)
			  		<td>Imóvel</td>
		  		@else
			  		<td>Funcionário</td>
			  	@endif
			  	<td>{{ date('d/m/Y',strtotime($spending->date)) }}</td>
			  	<td>{{ number_format($spending->money, 2, ',', '.') }}</td>
			  	<td>{{ $spending->description }}</td>
			  	<td style="display: flex;">
				<a href="{{ route('edit-spending', ['id' => $spending->id]) }}" class="fa fa-edit editBtn" type="button"></a> 
					<form action="{{ route('delete-spending', ['id' => $spending->id]) }}" method="POST">
						@csrf
						@method('delete')
						<button type="submit" class="fa fa-trash deleteBtn" onclick="return confirm('Deseja exluir esse registro?')"></button>
					</form>
				</td>
			  </tr>
		  @endforeach
		</table>



	</div>
</div>
@include('management.style')
@endsection