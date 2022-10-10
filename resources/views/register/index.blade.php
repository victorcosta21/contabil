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
				<div id="moreCtt">
					<button type="button" class="btn btn-success fa fa-plus" onclick="moreCtt()"></button>
					<button type="button" class="btn btn-danger fa fa-minus" onclick="downCtt()"></button>
					<div id="formCtt1" class="form-group row">
						<div class="form-group col-md-3" id="cttName">
							<label>Nome do Contato 1</label>
							<input type="text" name="contactName[1]" class="form-control" placeholder="Nome e sobrenome" maxlength="20" required>
						</div>
						<div class="form-group col-md-2" id="cttCel">
							<label>Celular 1</label>
							<input type="text" name="cttCel[1]" class="form-control" placeholder="(00)00000-0000" required>
						</div>
						<div class="form-group col-md-5" id="cttDesc">
							<label>Descrição 1</label>
							<input type="text" name="cttDesc[1]" class="form-control" placeholder="Descreva em poucas palavras quem é esse contato" maxlength="50">
						</div>
					</div>
				</div>
				<input type="hidden" id="last" value="2"><br><br>

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

			<h4 style="text-align:center;">Controle de Pagamento</h4><br>

			<div class="row">
				<div class="form-group col-md-2" style="text-align:center;">
			      <label for="inputEstado" style="font-weight:bolder">Janeiro</label>
			      <select id="inputEstado" class="form-control">
			        <option selected value="1">Pendente</option>
			        <option value="2">Pago via Pix</option>
			        <option value="3">Pago via Boleto</option>
			        <option value="4">Pago via Cartão Créd</option>
			      </select>
			    </div><br>
			    <div class="form-group col-md-2">
			    	<label>Data de Vencimento</label>
			    	<input type="date" name="dueDate" class="form-control">
				</div>
				<div class="form-group col-md-2">
			    	<label>Previsão de Pagamento</label>
			    	<input type="date" name="cpPrevision" class="form-control">
				</div>
				<div class="form-group col-md-4">
					<label>Anotações referente ao pagamento</label>
					<input type="text" name="comments" class="form-control" maxlength="40">
				</div>
			</div><br>

			<div class="row">
				<div class="form-group col-md-2" style="text-align:center;">
			      <label for="inputEstado" style="font-weight:bolder">Fevereiro</label>
			      <select id="inputEstado" class="form-control">
			        <option selected value="1">Pendente</option>
			        <option value="2">Pago via Pix</option>
			        <option value="3">Pago via Boleto</option>
			        <option value="4">Pago via Cartão Créd</option>
			      </select>
			    </div>
			    <div class="form-group col-md-2">
			    	<label>Data de Vencimento</label>
			    	<input type="date" name="dueDate" class="form-control">
				</div>
				<div class="form-group col-md-2">
			    	<label>Previsão de Pagamento</label>
			    	<input type="date" name="cpPrevision" class="form-control">
				</div>
				<div class="form-group col-md-4">
					<label>Anotações referente ao pagamento</label>
					<input type="text" name="comments" class="form-control" maxlength="40">
				</div>
			</div><br>

			<div class="row">
				<div class="form-group col-md-2" style="text-align:center;">
			      <label for="inputEstado" style="font-weight:bolder">Março</label>
			      <select id="inputEstado" class="form-control">
			        <option selected value="1">Pendente</option>
			        <option value="2">Pago via Pix</option>
			        <option value="3">Pago via Boleto</option>
			        <option value="4">Pago via Cartão Créd</option>
			      </select>
			    </div>
			    <div class="form-group col-md-2">
			    	<label>Data de Vencimento</label>
			    	<input type="date" name="dueDate" class="form-control">
				</div>
				<div class="form-group col-md-2">
			    	<label>Previsão de Pagamento</label>
			    	<input type="date" name="cpPrevision" class="form-control">
				</div>
				<div class="form-group col-md-4">
					<label>Anotações referente ao pagamento</label>
					<input type="text" name="comments" class="form-control" maxlength="40">
				</div>
			</div><br>

			<div class="row">
				<div class="form-group col-md-2" style="text-align:center;">
			      <label for="inputEstado" style="font-weight:bolder">Abril</label>
			      <select id="inputEstado" class="form-control">
			        <option selected value="1">Pendente</option>
			        <option value="2">Pago via Pix</option>
			        <option value="3">Pago via Boleto</option>
			        <option value="4">Pago via Cartão Créd</option>
			      </select>
			    </div>
			    <div class="form-group col-md-2">
			    	<label>Data de Vencimento</label>
			    	<input type="date" name="dueDate" class="form-control">
				</div>
				<div class="form-group col-md-2">
			    	<label>Previsão de Pagamento</label>
			    	<input type="date" name="cpPrevision" class="form-control">
				</div>
				<div class="form-group col-md-4">
					<label>Anotações referente ao pagamento</label>
					<input type="text" name="comments" class="form-control" maxlength="40">
				</div>
			</div><br>

			<div class="row">
				<div class="form-group col-md-2" style="text-align:center;">
			      <label for="inputEstado" style="font-weight:bolder">Maio</label>
			      <select id="inputEstado" class="form-control">
			        <option selected value="1">Pendente</option>
			        <option value="2">Pago via Pix</option>
			        <option value="3">Pago via Boleto</option>
			        <option value="4">Pago via Cartão Créd</option>
			      </select>
			    </div>
			    <div class="form-group col-md-2">
			    	<label>Data de Vencimento</label>
			    	<input type="date" name="dueDate" class="form-control">
				</div>
				<div class="form-group col-md-2">
			    	<label>Previsão de Pagamento</label>
			    	<input type="date" name="cpPrevision" class="form-control">
				</div>
				<div class="form-group col-md-4">
					<label>Anotações referente ao pagamento</label>
					<input type="text" name="comments" class="form-control" maxlength="40">
				</div>
			</div><br>

			<div class="row">
				<div class="form-group col-md-2" style="text-align:center;">
			      <label for="inputEstado" style="font-weight:bolder">Junho</label>
			      <select id="inputEstado" class="form-control">
			        <option selected value="1">Pendente</option>
			        <option value="2">Pago via Pix</option>
			        <option value="3">Pago via Boleto</option>
			        <option value="4">Pago via Cartão Créd</option>
			      </select>
			    </div>
			    <div class="form-group col-md-2">
			    	<label>Data de Vencimento</label>
			    	<input type="date" name="dueDate" class="form-control">
				</div>
				<div class="form-group col-md-2">
			    	<label>Previsão de Pagamento</label>
			    	<input type="date" name="cpPrevision" class="form-control">
				</div>
				<div class="form-group col-md-4">
					<label>Anotações referente ao pagamento</label>
					<input type="text" name="comments" class="form-control" maxlength="40">
				</div>
			</div><br>

			<div class="row">
				<div class="form-group col-md-2" style="text-align:center;">
			      <label for="inputEstado" style="font-weight:bolder">Julho</label>
			      <select id="inputEstado" class="form-control">
			        <option selected value="1">Pendente</option>
			        <option value="2">Pago via Pix</option>
			        <option value="3">Pago via Boleto</option>
			        <option value="4">Pago via Cartão Créd</option>
			      </select>
			    </div>
			    <div class="form-group col-md-2">
			    	<label>Data de Vencimento</label>
			    	<input type="date" name="dueDate" class="form-control">
				</div>
				<div class="form-group col-md-2">
			    	<label>Previsão de Pagamento</label>
			    	<input type="date" name="cpPrevision" class="form-control">
				</div>
				<div class="form-group col-md-4">
					<label>Anotações referente ao pagamento</label>
					<input type="text" name="comments" class="form-control" maxlength="40">
				</div>
			</div><br>

			<div class="row">
				<div class="form-group col-md-2" style="text-align:center;">
			      <label for="inputEstado" style="font-weight:bolder">Agosto</label>
			      <select id="inputEstado" class="form-control">
			        <option selected value="1">Pendente</option>
			        <option value="2">Pago via Pix</option>
			        <option value="3">Pago via Boleto</option>
			        <option value="4">Pago via Cartão Créd</option>
			      </select>
			    </div>
			    <div class="form-group col-md-2">
			    	<label>Data de Vencimento</label>
			    	<input type="date" name="dueDate" class="form-control">
				</div>
				<div class="form-group col-md-2">
			    	<label>Previsão de Pagamento</label>
			    	<input type="date" name="cpPrevision" class="form-control">
				</div>
				<div class="form-group col-md-4">
					<label>Anotações referente ao pagamento</label>
					<input type="text" name="comments" class="form-control" maxlength="40">
				</div>
			</div><br>

			<div class="row">
				<div class="form-group col-md-2" style="text-align:center;">
			      <label for="inputEstado" style="font-weight:bolder">Setembro</label>
			      <select id="inputEstado" class="form-control">
			        <option selected value="1">Pendente</option>
			        <option value="2">Pago via Pix</option>
			        <option value="3">Pago via Boleto</option>
			        <option value="4">Pago via Cartão Créd</option>
			      </select>
			    </div>
			    <div class="form-group col-md-2">
			    	<label>Data de Vencimento</label>
			    	<input type="date" name="dueDate" class="form-control">
				</div>
				<div class="form-group col-md-2">
			    	<label>Previsão de Pagamento</label>
			    	<input type="date" name="cpPrevision" class="form-control">
				</div>
				<div class="form-group col-md-4">
					<label>Anotações referente ao pagamento</label>
					<input type="text" name="comments" class="form-control" maxlength="40">
				</div>
			</div><br>

			<div class="row">
				<div class="form-group col-md-2" style="text-align:center;">
			      <label for="inputEstado" style="font-weight:bolder">Outubro</label>
			      <select id="inputEstado" class="form-control">
			        <option selected value="1">Pendente</option>
			        <option value="2">Pago via Pix</option>
			        <option value="3">Pago via Boleto</option>
			        <option value="4">Pago via Cartão Créd</option>
			      </select>
			    </div>
			    <div class="form-group col-md-2">
			    	<label>Data de Vencimento</label>
			    	<input type="date" name="dueDate" class="form-control">
				</div>
				<div class="form-group col-md-2">
			    	<label>Previsão de Pagamento</label>
			    	<input type="date" name="cpPrevision" class="form-control">
				</div>
				<div class="form-group col-md-4">
					<label>Anotações referente ao pagamento</label>
					<input type="text" name="comments" class="form-control" maxlength="40">
				</div>
			</div><br>

			<div class="row">
				<div class="form-group col-md-2" style="text-align:center;">
			      <label for="inputEstado" style="font-weight:bolder">Novembro</label>
			      <select id="inputEstado" class="form-control">
			        <option selected value="1">Pendente</option>
			        <option value="2">Pago via Pix</option>
			        <option value="3">Pago via Boleto</option>
			        <option value="4">Pago via Cartão Créd</option>
			      </select>
			    </div>
			    <div class="form-group col-md-2">
			    	<label>Data de Vencimento</label>
			    	<input type="date" name="dueDate" class="form-control">
				</div>
				<div class="form-group col-md-2">
			    	<label>Previsão de Pagamento</label>
			    	<input type="date" name="cpPrevision" class="form-control">
				</div>
				<div class="form-group col-md-4">
					<label>Anotações referente ao pagamento</label>
					<input type="text" name="comments" class="form-control" maxlength="40">
				</div>
			</div><br>

			<div class="row">
				<div class="form-group col-md-2" style="text-align:center;">
			      <label for="inputEstado" style="font-weight:bolder">Dezembro</label>
			      <select id="inputEstado" class="form-control">
			        <option selected value="1">Pendente</option>
			        <option value="2">Pago via Pix</option>
			        <option value="3">Pago via Boleto</option>
			        <option value="4">Pago via Cartão Créd</option>
			      </select>
			    </div>
			    <div class="form-group col-md-2">
			    	<label>Data de Vencimento</label>
			    	<input type="date" name="dueDate" class="form-control">
				</div>
				<div class="form-group col-md-2">
			    	<label>Previsão de Pagamento</label>
			    	<input type="date" name="cpPrevision" class="form-control">
				</div>
				<div class="form-group col-md-4">
					<label>Anotações referente ao pagamento</label>
					<input type="text" name="comments" class="form-control" maxlength="40">
				</div>
			</div><br><br>

			<h4 style="text-align:center;">Informações extras</h4><br>

			<div class="row">
				<div class="form-group">
					<label>Escreva algumas informações adicionais caso queira :</label>
				    <textarea class="form-control mt-1" id="informations" rows="3"></textarea>
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
	div.push('<input type="text" name="contactName[' + last + ']" class="form-control" placeholder="Nome e sobrenome" maxlength="20">');
	div.push('</div>');
	div.push('<div class="form-group col-md-2" id="cttCel' + last + '">');
	div.push('<label>Celular ' + last + '</label>');
	div.push('<input type="text" name="cttCel[' + last + ']" class="form-control" placeholder="(00)00000-0000">');
	div.push('</div>');
	div.push('<div class="form-group col-md-5" id="cttDesc' + last + '">');
	div.push('<label>Descrição ' + last + ' </label>');
	div.push('<input type="text" name="cttDesc[' + last + ']" class="form-control" placeholder="Descreva em poucas palavras quem é esse contato" maxlength="50">');
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