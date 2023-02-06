@extends('layouts.app')

@section('content')

<div class="box">
	<div class="box-content">
		<a href="{{ route('clients') }}" class="btn btn-secondary fa fa-arrow-left" aria-hidden="true"> Voltar</a>

		<h4 style="text-align:center;">Dados referente ao cliente</h4><br>
		@include('alert')

		<form class="form-group" action="{{ route('store-client') }}" method="POST">
			@csrf
			<div class="row">
				<div class="form-group col-md-1">
					<label>Nº Conta</label>
					<input type="text" name="client[accountNumber]" class="form-control" maxlength="5" placeholder="000" onkeyup="this.value=this.value.replace(/[^0-9]/g, '')" value="{{ old('client[accountNumber]') }}" required>
				</div>
				<div class="form-group col-md-4">
					<label>Nome</label>
					<input type="text" name="client[name]" class="form-control" maxlength="40" placeholder="Digite o nome e sobrenome do cliente" value="{{ old('client[name]') }}" required >
				</div>
				<div class="form-group col-md-2">
					<label>Documento</label>
					<input type="text" name="client[document]" class="form-control document" id="document" maxlength="20" placeholder="CPF ou CNPJ" value="{{ old('client[document]') }}" required>
				</div>
				<div class="form-group col-md-3">
					<label>E-mail</label>
					<input type="email" name="client[email]" class="form-control" maxlength="35" placeholder="email@email.com" value="{{ old('client[email]') }}" required>
				</div>
				<div class="form-group col-md-2">
					<label>Cliente desde:</label>
					<input type="date" name="client[date]" class="form-control" required>
				</div>
			</div><br>
				<div id="moreCtt">
					<button type="button" class="btn btn-success fa fa-plus" onclick="moreCtt()"></button>
					<button type="button" class="btn btn-danger fa fa-minus" onclick="downCtt()"></button>
					<div id="formCtt1" class="form-group row">
					<input type="hidden" name="contacts[1][cttId]" value="1">
						<div class="form-group col-md-3" id="cttName">
							<label>Nome do Contato 1</label>
							<input type="text" name="contacts[1][cttName]" class="form-control" placeholder="Nome e sobrenome" maxlength="20" value="{{ old('contacts[1][cttName]') }}" required>
						</div>
						<div class="form-group col-md-2" id="cttCel">
							<label>Celular 1</label>
							<input type="text" name="contacts[1][cttCel]" class="form-control mask_phone" placeholder="(00)00000-0000" value="{{ old('contacts[1][cttCel]') }}" required>
						</div>
						<div class="form-group col-md-5" id="cttDesc">
							<label>Descrição 1</label>
							<input type="text" name="contacts[1][cttDesc]" class="form-control" placeholder="Descreva em poucas palavras quem é esse contato" maxlength="50" value="{{ old('contacts[1][cttDesc]') }}" required>
						</div>
					</div>
				</div>
				<input type="hidden" id="last" value="2"><br><br>

			<h4 style="text-align:center;">Dados referente ao local de instalação</h4><br>

			<div class="row">
				<div class="form-group col-md-1">
					<label>Local</label>
					<select class="form-control" name="address[environment]" >
						<option value="1">Casa</option>
						<option value="2">Comércio</option>
					</select>
				</div>
				<div class="form-group col-md-2">
					<label>CEP</label>
					<input type="text" name="address[cep]" class="form-control mask_cep" id="cep" maxlength="15" placeholder="00000-000" value="{{ old('address[cep]') }}" required>
				</div>
				<div class="form-group col-md-4">
					<label>Bairro</label>
					<input type="text" name="address[district]" class="form-control" id="bairro" maxlength="45" placeholder="Ex: Vila Sagrado Coração de Maria">
				</div>
				<div class="form-group col-md-3">
					<label>Endereço</label>
					<input type="text" name="address[road]" class="form-control" id="rua" maxlength="45" placeholder="Ex: Rua Santa Otilia" value="{{ old('address[road]') }}" required>
				</div>
				<div class="form-group col-md-1">
					<label>Número</label>
					<input type="text" name="address[number]" class="form-control" maxlength="5" placeholder="00000" onkeyup="this.value=this.value.replace(/[^0-9]/g, '')" value="{{ old('address[number]') }}" required>					
				</div>
			</div><br><br>

			<h4 style="text-align:center;">Controle de Pagamento</h4><br>

			@foreach($months as $key => $mont)
				<div class="row">
					<div class="form-group col-md-2" style="text-align:center;">
				      <label for="month" style="font-weight:bolder">{{$mont->month}}</label>
			      	  <input type="hidden" name="month[{{$key}}][month]" value="{{$mont->month}}">
				      <select name="month[{{$key}}][payment]" class="form-control">
				        <option selected value="1">Pendente</option>
				        <option value="2">Pago via Pix</option>
				        <option value="3">Pago via Boleto</option>
				        <option value="4">Pago via Cartão Créd</option>
				      </select>
				    </div><br>
				    <div class="form-group col-md-2">
				    	<label>Data de Vencimento</label>
				    	<input type="date" name="month[{{$key}}][dueDate]" class="form-control">
					</div>
					<div class="form-group col-md-2">
				    	<label>Data de Pagamento</label>
				    	<input type="date" name="month[{{$key}}][cpPrevision]" class="form-control">
					</div>
					<div class="form-group col-md-2">
						<label>Valor</label>
						<input name="month[{{$key}}][ammount]" class="form-control mask_money" maxlength="10" placeholder="R$ 000.000,00">
					</div>
					<div class="form-group col-md-4">
						<label>Anotações referente ao pagamento</label>
						<input type="text" name="month[{{$key}}][comments]" class="form-control" maxlength="40">
					</div>
				</div><br><hr><br>
			@endforeach

			<h4 style="text-align:center;">Informações extras</h4><br>

			<div class="row">
				<div class="form-group">
					<label>Escreva algumas informações adicionais caso queira :</label>
				    <textarea class="form-control mt-1" name="extra[informations]" rows="3" maxlength="250" value="{{ old('extra[informations]') }}" ></textarea>
			  	</div>
			</div>
			<div class="row justify-content-md-end">
				<div class="form-group col-md-2 mt-4">
					<button type="submit" class="btn btn-primary">Cadastrar</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection

<script type="text/javascript">
function moreCtt() {
	var last = $('#last').val();
	var div = [];
	div.push('<div id="formCtt' + last + '" class="form-group row" style="margin-top:15px;">');
	div.push('<input type="hidden" name="contacts[' + last + '][cttId]" value="' + last + '">');
	div.push('<div class="form-group col-md-3" id="cttName' + last + '">');
	div.push('<label>Nome do Contato ' + last + '</label>');
	div.push('<input type="text" name="contacts[' + last + '][cttName]" class="form-control" placeholder="Nome e sobrenome" maxlength="20">');
	div.push('</div>');
	div.push('<div class="form-group col-md-2" id="cttCel' + last + '">');
	div.push('<label>Celular ' + last + '</label>');
	div.push('<input type="text" name="contacts[' + last + '][cttCel]" class="form-control mask_phone" placeholder="(00)00000-0000">');
	div.push('</div>');
	div.push('<div class="form-group col-md-5" id="cttDesc' + last + '">');
	div.push('<label>Descrição ' + last + ' </label>');
	div.push('<input type="text" name="contacts[' + last + '][cttDesc]" class="form-control" placeholder="Descreva em poucas palavras quem é esse contato" maxlength="50">');
	div.push('</div>');
	div.push('</div>');
	div = div.join('');
	$("#moreCtt").append(div);
	$("#last").val(parseInt(last) + 1);
};


function downCtt() {
	var last = $("#last").val();
	if(last > 2) {
		last = last-1;
	}
	var id = 'formCtt' + last;
	console.log(id);
	if(last > 1) {
		$("div").remove('#' + id);
		$("#last").val(parseInt(last));
	}
};

</script>