@extends('layouts.app')

@section('content')
<div class="box">
	<div class="box-content">
		<a href="{{ route('management') }}" class="btn btn-secondary fa fa-arrow-left" aria-hidden="true"> Voltar</a>

		<h4 style="text-align:center;">Despesas</h4><br>
		@include('alert')

		<form class="form-group" action="{{ route('update-spending', ['id' => $spending->id]) }}" method="POST">
		@method('PUT')
		@csrf
			<div class="row">
				<div class="form-group col-md-2">
					<label>Tipo</label>
					<select class="form-control" name="type">
						<option value="1" {{ $spending->type == 1 ? 'selected' : '' }}>Equipamento</option>
						<option value="2" {{ $spending->type == 2 ? 'selected' : '' }}>Imóvel</option>
						<option value="3" {{ $spending->type == 3 ? 'selected' : '' }}>Funcionário</option>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label>Descrição</label>
					<input type="text" name="description" class="form-control" maxlength="80" required placeholder="Descreva em poucas palavras o que é essa despesa" value="{{ $spending->description }}">
				</div>
				<div class="form-group col-md-2">
					<label>Data</label>
					<input type="date" max="9999-12-31" name="date" class="form-control" required value="{{ $spending->date }}">
				</div>
				<div class="form-group col-md-2">
					<label>Valor</label>
					<input type="text" name="money" class="form-control mask_money" required placeholder="R$ 000.000,00" value="{{ number_format($spending->money, 2, ',', '.') }}"> 
				</div>
			</div><br>

			<div class="row justify-content-end">
				<div class="form-group col-2">
					<button type="submit" class="btn btn-primary">Cadastrar</button>
				</div>
			</div>
			
		</form>
	</div>
</div>
@include('management.style')
@endsection