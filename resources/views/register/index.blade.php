@extends('layouts.app')

@section('content')

<div class="box">
	<div class="box-content">

		<h4 style="text-align:center;">Dados referente ao cliente</h4><br>

		<form class="form-group">
			<div class="row">
				<div class="form-group col-md-4">
					<label>Nome</label>
					<input type="text" name="name" class="form-control" maxlength="40" placeholder="Digite o nome e sobrenome do cliente" required>
				</div>
				<div class="form-group col-md-2">
					<label>Documento</label>
					<input type="text" name="document" class="form-control" maxlength="20" placeholder="RG, CPF ou CNPJ" required>
				</div>
				<div class="form-group col-md-4">
					<label>E-mail</label>
					<input type="text" name="email" class="form-control" maxlength="40" placeholder="email@email.com" required>
				</div>
				<div class="form-group col-md-2">
					<label>Cliente desde:</label>
					<input type="date" name="date" class="form-control" required>
				</div>
			</div><br>
			<div class="row">
				<div id="moreCtt">
					<button type="button" class="btn btn-success fa fa-plus" onclick="moreCtt()"></button>
					<button type="button" class="btn btn-danger fa fa-minus" onclick="downCtt()"></button>
				</div>
			</div><br><br>

			<h4 style="text-align:center;">Dados referente ao local de instação</h4><br>

			<div class="row">
				<div class="form-group col-md-1">
					<label>Ambiente</label>
					<select class="form-control" name="environment">
						<option value="1">Casa</option>
						<option value="2">Comércio</option>
					</select>
				</div>
				<div class="form-group col-md-2">
					<label>CEP</label>
					<input type="text" name="cep" class="form-control" maxlength="15" placeholder="00000-000" required>
				</div>
				<div class="form-group col-md-3">
					<label>Endereço</label>
					<input type="text" name="address" class="form-control" maxlength="9" placeholder="Ex: Rua Santa Otilia" required>
				</div>
				<div class="form-group col-md-1">
					<label>Número</label>
					<input type="text" name="number" class="form-control" maxlength="5" placeholder="00000" required>					
				</div>
				<div class="form-group col-md-2">
					<label>Complemento</label>
					<input type="text" name="complement" class="form-control" maxlength="20" placeholder="Casa 1?">
				</div>
				<div class="form-group col-md-3">
					<label>Ponto de Referência</label>
					<input type="text" name="refer" class="form-control" maxlength="30" placeholder="Ex: Próximo ao mercado nihei">
				</div>
			</div><br><br>

			<h4 style="text-align:center;">Informações extras</h4><br>

		</form>
	</div>
</div>
@endsection