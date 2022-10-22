@extends('layouts.app')

@section('content')

<div class="box">
	<div class="box-content">

		<h4 style="text-align:center;">Dados referente ao cliente</h4><br>
		@include('register.alert')

		<form class="form-group" action="{{ route('store') }}" method="POST">
			@csrf
			<div class="row">
				<div class="form-group col-md-1">
					<label>Nº Conta</label>
					<input type="text" name="client[accountNumber]" class="form-control" maxlength="3" placeholder="000" onkeyup="this.value=this.value.replace(/[^0-9]/g, '')" value="{{ old('client[accountNumber]') }}" required>
				</div>
				<div class="form-group col-md-4">
					<label>Nome</label>
					<input type="text" name="client[name]" class="form-control" maxlength="40" placeholder="Digite o nome e sobrenome do cliente" value="{{ old('client[name]') }}" required >
				</div>
				<div class="form-group col-md-2">
					<label>Documento</label>
					<input type="text" name="client[document]" class="form-control" id="document" maxlength="20" placeholder="CPF ou CNPJ" value="{{ old('client[document]') }}" required>
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

			<h4 style="text-align:center;">Dados referente ao local de instação</h4><br>

			<div class="row">
				<div class="form-group col-md-1">
					<label>Ambiente</label>
					<select class="form-control" name="address[environment]" >
						<option value="1">Casa</option>
						<option value="2">Comércio</option>
					</select>
				</div>
				<div class="form-group col-md-2">
					<label>CEP</label>
					<input type="text" name="address[cep]" class="form-control mask_cep" maxlength="15" placeholder="00000-000" value="{{ old('address[cep]') }}" required>
				</div>
				<div class="form-group col-md-3">
					<label>Endereço</label>
					<input type="text" name="address[road]" class="form-control" maxlength="30" placeholder="Ex: Rua Santa Otilia" value="{{ old('address[road]') }}" required>
				</div>
				<div class="form-group col-md-1">
					<label>Número</label>
					<input type="text" name="address[number]" class="form-control" maxlength="5" placeholder="00000" onkeyup="this.value=this.value.replace(/[^0-9]/g, '')" value="{{ old('address[number]') }}" required>					
				</div>
				<div class="form-group col-md-2">
					<label>Complemento</label>
					<input type="text" name="address[complement]" class="form-control" maxlength="20" placeholder="Casa 1?" value="{{ old('address[complement]') }}" required>
				</div>
				<div class="form-group col-md-3">
					<label>Ponto de Referência</label>
					<input type="text" name="address[reference]" class="form-control" maxlength="30" placeholder="Ex: Próximo ao mercado nihei" value="{{ old('address[reference]') }}" required>
				</div>
			</div><br><br>

			<h4 style="text-align:center;">Controle de Pagamento</h4><br>

			<div class="row">
				<div class="form-group col-md-2" style="text-align:center;">
			      <label for="month" style="font-weight:bolder">Janeiro</label>
		      	  <input type="hidden" name="month[1][month]" value="Janeiro">
			      <select name="month[1][payment]" class="form-control">
			        <option selected value="1">Pendente</option>
			        <option value="2">Pago via Pix</option>
			        <option value="3">Pago via Boleto</option>
			        <option value="4">Pago via Cartão Créd</option>
			      </select>
			    </div><br>
			    <div class="form-group col-md-2">
			    	<label>Data de Vencimento</label>
			    	<input type="date" name="month[1][dueDate]" class="form-control">
				</div>
				<div class="form-group col-md-2">
			    	<label>Data de Pagamento</label>
			    	<input type="date" name="month[1][cpPrevision]" class="form-control">
				</div>
				<div class="form-group col-md-2">
					<label>Valor</label>
					<input name="month[1][ammount]" class="form-control mask_money" maxlength="10" placeholder="R$ 000.000,00">
				</div>
				<div class="form-group col-md-4">
					<label>Anotações referente ao pagamento</label>
					<input type="text" name="month[1][comments]" class="form-control" maxlength="40">
				</div>
			</div><br><hr><br>

			<div class="row">
				<div class="form-group col-md-2" style="text-align:center;">
			      <label for="month" style="font-weight:bolder">Fevereiro</label>
		      	  <input type="hidden" name="month[2][month]" value="Fevereiro">
			      <select name="month[2][payment]" class="form-control">
			        <option selected value="1">Pendente</option>
			        <option value="2">Pago via Pix</option>
			        <option value="3">Pago via Boleto</option>
			        <option value="4">Pago via Cartão Créd</option>
			      </select>
			    </div>
			    <div class="form-group col-md-2">
			    	<label>Data de Vencimento</label>
			    	<input type="date" name="month[2][dueDate]" class="form-control">
				</div>
				<div class="form-group col-md-2">
			    	<label>Data de Pagamento</label>
			    	<input type="date" name="month[2][cpPrevision]" class="form-control">
				</div>
				<div class="form-group col-md-2">
					<label>Valor</label>
					<input name="month[2][ammount]" class="form-control mask_money" maxlength="10" placeholder="R$ 000.000,00">
				</div>
				<div class="form-group col-md-4">
					<label>Anotações referente ao pagamento</label>
					<input type="text" name="month[2][comments]" class="form-control" maxlength="40">
				</div>
			</div><br><hr><br>

			<div class="row">
				<div class="form-group col-md-2" style="text-align:center;">
			      <label for="month" style="font-weight:bolder">Março</label>
		      	  <input type="hidden" name="month[3][month]" value="Março">
			      <select name="month[3][payment]" class="form-control">
			        <option selected value="1">Pendente</option>
			        <option value="2">Pago via Pix</option>
			        <option value="3">Pago via Boleto</option>
			        <option value="4">Pago via Cartão Créd</option>
			      </select>
			    </div>
			    <div class="form-group col-md-2">
			    	<label>Data de Vencimento</label>
			    	<input type="date" name="month[3][dueDate]" class="form-control">
				</div>
				<div class="form-group col-md-2">
			    	<label>Data de Pagamento</label>
			    	<input type="date" name="month[3][cpPrevision]" class="form-control">
				</div>
				<div class="form-group col-md-2">
					<label>Valor</label>
					<input name="month[3][ammount]" class="form-control mask_money" maxlength="10" placeholder="R$ 000.000,00">
				</div>
				<div class="form-group col-md-4">
					<label>Anotações referente ao pagamento</label>
					<input type="text" name="month[3][comments]" class="form-control" maxlength="40">
				</div>
			</div><br><hr><br>

			<div class="row">
				<div class="form-group col-md-2" style="text-align:center;">
			      <label for="month" style="font-weight:bolder">Abril</label>
		      	  <input type="hidden" name="month[4][month]" value="Abril">
			      <select name="month[4][payment]" class="form-control">
			        <option selected value="1">Pendente</option>
			        <option value="2">Pago via Pix</option>
			        <option value="3">Pago via Boleto</option>
			        <option value="4">Pago via Cartão Créd</option>
			      </select>
			    </div>
			    <div class="form-group col-md-2">
			    	<label>Data de Vencimento</label>
			    	<input type="date" name="month[4][dueDate]" class="form-control">
				</div>
				<div class="form-group col-md-2">
			    	<label>Data de Pagamento</label>
			    	<input type="date" name="month[4][cpPrevision]" class="form-control">
				</div>
				<div class="form-group col-md-2">
					<label>Valor</label>
					<input name="month[4][ammount]" class="form-control mask_money" maxlength="10" placeholder="R$ 000.000,00">
				</div>
				<div class="form-group col-md-4">
					<label>Anotações referente ao pagamento</label>
					<input type="text" name="month[4][comments]" class="form-control" maxlength="40">
				</div>
			</div><br><hr><br>

			<div class="row">
				<div class="form-group col-md-2" style="text-align:center;">
			      <label for="month" style="font-weight:bolder">Maio</label>
		      	  <input type="hidden" name="month[5][month]" value="Maio">
			      <select name="month[5][payment]" class="form-control">
			        <option selected value="1">Pendente</option>
			        <option value="2">Pago via Pix</option>
			        <option value="3">Pago via Boleto</option>
			        <option value="4">Pago via Cartão Créd</option>
			      </select>
			    </div>
			    <div class="form-group col-md-2">
			    	<label>Data de Vencimento</label>
			    	<input type="date" name="month[5][dueDate]" class="form-control">
				</div>
				<div class="form-group col-md-2">
			    	<label>Data de Pagamento</label>
			    	<input type="date" name="month[5][cpPrevision]" class="form-control">
				</div>
				<div class="form-group col-md-2">
					<label>Valor</label>
					<input name="month[5][ammount]" class="form-control mask_money" maxlength="10" placeholder="R$ 000.000,00">
				</div>
				<div class="form-group col-md-4">
					<label>Anotações referente ao pagamento</label>
					<input name="month[5][comments]" class="form-control" maxlength="40">
				</div>
			</div><br><hr><br>

			<div class="row">
				<div class="form-group col-md-2" style="text-align:center;">
			      <label for="month" style="font-weight:bolder">Junho</label>
		      	  <input type="hidden" name="month[6][month]" value="Junho">
			      <select name="month[6][payment]" class="form-control">
			        <option selected value="1">Pendente</option>
			        <option value="2">Pago via Pix</option>
			        <option value="3">Pago via Boleto</option>
			        <option value="4">Pago via Cartão Créd</option>
			      </select>
			    </div>
			    <div class="form-group col-md-2">
			    	<label>Data de Vencimento</label>
			    	<input type="date" name="month[6][dueDate]" class="form-control">
				</div>
				<div class="form-group col-md-2">
			    	<label>Data de Pagamento</label>
			    	<input type="date" name="month[6][cpPrevision]" class="form-control">
				</div>
				<div class="form-group col-md-2">
					<label>Valor</label>
					<input name="month[6][ammount]" class="form-control mask_money" maxlength="10" placeholder="R$ 000.000,00">
				</div>
				<div class="form-group col-md-4">
					<label>Anotações referente ao pagamento</label>
					<input type="text" name="month[6][comments]" class="form-control" maxlength="40">
				</div>
			</div><br><hr><br>

			<div class="row">
				<div class="form-group col-md-2" style="text-align:center;">
			      <label for="month" style="font-weight:bolder">Julho</label>
		      	  <input type="hidden" name="month[7][month]" value="Julho">
			      <select name="month[7][payment]" class="form-control">
			        <option selected value="1">Pendente</option>
			        <option value="2">Pago via Pix</option>
			        <option value="3">Pago via Boleto</option>
			        <option value="4">Pago via Cartão Créd</option>
			      </select>
			    </div>
			    <div class="form-group col-md-2">
			    	<label>Data de Vencimento</label>
			    	<input type="date" name="month[7][dueDate]" class="form-control">
				</div>
				<div class="form-group col-md-2">
			    	<label>Data de Pagamento</label>
			    	<input type="date" name="month[7][cpPrevision]" class="form-control">
				</div>
				<div class="form-group col-md-2">
					<label>Valor</label>
					<input name="month[7][ammount]" class="form-control mask_money" maxlength="10" placeholder="R$ 000.000,00">
				</div>
				<div class="form-group col-md-4">
					<label>Anotações referente ao pagamento</label>
					<input type="text" name="month[7][comments]" class="form-control" maxlength="40">
				</div>
			</div><br><hr><br>

			<div class="row">
				<div class="form-group col-md-2" style="text-align:center;">
			      <label for="month" style="font-weight:bolder">Agosto</label>
		      	  <input type="hidden" name="month[8][month]" value="Agosto">
			      <select name="month[8][payment]" class="form-control">
			        <option selected value="1">Pendente</option>
			        <option value="2">Pago via Pix</option>
			        <option value="3">Pago via Boleto</option>
			        <option value="4">Pago via Cartão Créd</option>
			      </select>
			    </div>
			    <div class="form-group col-md-2">
			    	<label>Data de Vencimento</label>
			    	<input type="date" name="month[8][dueDate]" class="form-control">
				</div>
				<div class="form-group col-md-2">
			    	<label>Data de Pagamento</label>
			    	<input type="date" name="month[8][cpPrevision]" class="form-control">
				</div>
				<div class="form-group col-md-2">
					<label>Valor</label>
					<input name="month[8][ammount]" class="form-control mask_money" maxlength="10" placeholder="R$ 000.000,00">
				</div>
				<div class="form-group col-md-4">
					<label>Anotações referente ao pagamento</label>
					<input type="text" name="month[8][comments]" class="form-control" maxlength="40">
				</div>
			</div><br><hr><br>

			<div class="row">
				<div class="form-group col-md-2" style="text-align:center;">
			      <label for="month" style="font-weight:bolder">Setembro</label>
		      	  <input type="hidden" name="month[9][month]" value="Setembro">
			      <select name="month[9][payment]" class="form-control">
			        <option selected value="1">Pendente</option>
			        <option value="2">Pago via Pix</option>
			        <option value="3">Pago via Boleto</option>
			        <option value="4">Pago via Cartão Créd</option>
			      </select>
			    </div>
			    <div class="form-group col-md-2">
			    	<label>Data de Vencimento</label>
			    	<input type="date" name="month[9][dueDate]" class="form-control">
				</div>
				<div class="form-group col-md-2">
			    	<label>Data de Pagamento</label>
			    	<input type="date" name="month[9][cpPrevision]" class="form-control">
				</div>
				<div class="form-group col-md-2">
					<label>Valor</label>
					<input name="month[9][ammount]" class="form-control mask_money" maxlength="10" placeholder="R$ 000.000,00">
				</div>
				<div class="form-group col-md-4">
					<label>Anotações referente ao pagamento</label>
					<input type="text" name="month[9][comments]" class="form-control" maxlength="40">
				</div>
			</div><br><hr><br>

			<div class="row">
				<div class="form-group col-md-2" style="text-align:center;">
			      <label for="month" style="font-weight:bolder">Outubro</label>
		      	  <input type="hidden" name="month[10][month]" value="Outubro">
			      <select name="month[10][payment]" class="form-control">
			        <option selected value="1">Pendente</option>
			        <option value="2">Pago via Pix</option>
			        <option value="3">Pago via Boleto</option>
			        <option value="4">Pago via Cartão Créd</option>
			      </select>
			    </div>
			    <div class="form-group col-md-2">
			    	<label>Data de Vencimento</label>
			    	<input type="date" name="month[10][dueDate]" class="form-control">
				</div>
				<div class="form-group col-md-2">
			    	<label>Data de Pagamento</label>
			    	<input type="date" name="month[10][cpPrevision]" class="form-control">
				</div>
				<div class="form-group col-md-2">
					<label>Valor</label>
					<input name="month[10][ammount]" class="form-control mask_money" maxlength="10" placeholder="R$ 000.000,00">
				</div>
				<div class="form-group col-md-4">
					<label>Anotações referente ao pagamento</label>
					<input type="text" name="month[10][comments]" class="form-control" maxlength="40">
				</div>
			</div><br><hr><br>

			<div class="row">
				<div class="form-group col-md-2" style="text-align:center;">
			      <label for="month" style="font-weight:bolder">Novembro</label>
		      	  <input type="hidden" name="month[11][month]" value="Novembro">
			      <select name="month[11][payment]" class="form-control">
			        <option selected value="1">Pendente</option>
			        <option value="2">Pago via Pix</option>
			        <option value="3">Pago via Boleto</option>
			        <option value="4">Pago via Cartão Créd</option>
			      </select>
			    </div>
			    <div class="form-group col-md-2">
			    	<label>Data de Vencimento</label>
			    	<input type="date" name="month[11][dueDate]" class="form-control">
				</div>
				<div class="form-group col-md-2">
			    	<label>Data de Pagamento</label>
			    	<input type="date" name="month[11][cpPrevision]" class="form-control">
				</div>
				<div class="form-group col-md-2">
					<label>Valor</label>
					<input name="month[11][ammount]" class="form-control mask_money" maxlength="10" placeholder="R$ 000.000,00">
				</div>
				<div class="form-group col-md-4">
					<label>Anotações referente ao pagamento</label>
					<input type="text" name="month[11][comments]" class="form-control" maxlength="40">
				</div>
			</div><br><hr><br>

			<div class="row">
				<div class="form-group col-md-2" style="text-align:center;">
			      <label for="month" style="font-weight:bolder">Dezembro</label>
		      	  <input type="hidden" name="month[12][month]" value="Dezembro">
			      <select name="month[12][payment]" class="form-control">
			        <option selected value="1">Pendente</option>
			        <option value="2">Pago via Pix</option>
			        <option value="3">Pago via Boleto</option>
			        <option value="4">Pago via Cartão Créd</option>
			      </select>
			    </div>
			    <div class="form-group col-md-2">
			    	<label>Data de Vencimento</label>
			    	<input type="date" name="month[12][dueDate]" class="form-control">
				</div>
				<div class="form-group col-md-2">
			    	<label>Data de Pagamento</label>
			    	<input type="date" name="month[12][cpPrevision]" class="form-control">
				</div>
				<div class="form-group col-md-2">
					<label>Valor</label>
					<input name="month[12][ammount]" class="form-control mask_money" maxlength="10" placeholder="R$ 000.000,00">
				</div>
				<div class="form-group col-md-4">
					<label>Anotações referente ao pagamento</label>
					<input type="text" name="month[12][comments]" class="form-control" maxlength="40">
				</div>
			</div><br><hr><br><br>

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