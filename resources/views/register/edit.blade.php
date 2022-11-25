@extends('layouts.app')

@section('content')

<div class="box">
	<div class="box-content">

		<h4 style="text-align:center;">Dados referente ao cliente</h4><br>
		@include('register.alert')

		<form class="form-group" action="{{ route('update-client', ['id' => $client->id]) }}" method="POST">
			@method('PUT')
			@csrf
			<div class="row">
				<div class="form-group col-md-1">
					<label>Nº Conta</label>
					<input type="text" name="client[accountNumber]" class="form-control" maxlength="5" placeholder="000" onkeyup="this.value=this.value.replace(/[^0-9]/g, '')" value="{{ $client->accountNumber }}" required>
				</div>
				<div class="form-group col-md-4">
					<label>Nome</label>
					<input type="text" name="client[name]" class="form-control" maxlength="40" placeholder="Digite o nome e sobrenome do cliente" value="{{ $client->name }}" required >
				</div>
				<div class="form-group col-md-2">
					<label>Documento</label>
					<input type="text" name="client[document]" class="form-control document" id="document" maxlength="20" placeholder="CPF ou CNPJ" value="{{ $client->document }}" required>
				</div>
				<div class="form-group col-md-3">
					<label>E-mail</label>
					<input type="email" name="client[email]" class="form-control" maxlength="35" placeholder="email@email.com" value="{{ $client->email }}" required>
				</div>
				<div class="form-group col-md-2">
					<label>Cliente desde:</label>
					<input type="date" name="client[date]" class="form-control" value="{{ $client->date }}" required >
				</div>
			</div><br>
				<div id="moreCtt">
					<button type="button" class="btn btn-success fa fa-plus" onclick="moreCtt()"></button>
					<button type="button" class="btn btn-danger fa fa-minus" onclick="downCtt()"></button>
					@php
						$sequence = 1;
					@endphp
					@foreach($client->contacts as $key => $ct)
						<div id="formCtt1" class="form-group row" style="margin-bottom:10px;">
							<input type="hidden" name="contacts[{{$key}}][cttId]" value="{{$sequence}}">
							<div class="form-group col-md-3" id="cttName">
								<label>Nome do Contato</label>
								<input type="text" name="contacts[{{$key}}][cttName]" class="form-control" placeholder="Nome e sobrenome" maxlength="20" value="{{ $ct->cttName }}" required>
							</div>
							<div class="form-group col-md-2" id="cttCel">
								<label>Celular</label>
								<input type="text" name="contacts[{{$key}}][cttCel]" class="form-control mask_phone" placeholder="(00)00000-0000" value="{{ $ct->cttCel }}" required>
							</div>
							<div class="form-group col-md-5" id="cttDesc">
								<label>Descrição</label>
								<input type="text" name="contacts[{{$key}}][cttDesc]" class="form-control" placeholder="Descreva em poucas palavras quem é esse contato" maxlength="50" value="{{ $ct->cttDesc }}" required>
							</div>
						</div>

						@php
							$lastVal = $key;
							$sequence++;
						@endphp
					@endforeach
						@php
							$lastVal++;
							$more = $sequence++;
						@endphp
				</div>
				<input type="hidden" id="last" value="{{ $lastVal }}"><br><br>
				<input type="hidden" id="more" value="{{ $more }}"><br><br>

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
					<input type="text" name="address[cep]" class="form-control mask_cep" id="cep" maxlength="15" placeholder="00000-000" value="{{ $client->address->cep }}" required>
				</div>
				<div class="form-group col-md-4">
					<label>Bairro</label>
					<input type="text" name="address[district]" class="form-control" id="bairro" maxlength="45" placeholder="Ex: Vila Sagrado Coração de Maria" value="{{ $client->address->district }}">
				</div>
				<div class="form-group col-md-3">
					<label>Endereço</label>
					<input type="text" name="address[road]" class="form-control" id="rua" maxlength="45" placeholder="Ex: Rua Santa Otilia" value="{{ $client->address->road }}" required>
				</div>
				<div class="form-group col-md-1">
					<label>Número</label>
					<input type="text" name="address[number]" class="form-control" maxlength="5" placeholder="00000" onkeyup="this.value=this.value.replace(/[^0-9]/g, '')" value="{{ $client->address->number }}" required>					
				</div>
			</div><br><br>

			<h4 style="text-align:center;">Controle de Pagamento</h4><br>

			@foreach($months as $key => $mont)
				<div class="row">
					<div class="form-group col-md-2" style="text-align:center;">
				      <label for="month" style="font-weight:bolder">{{$mont->month}}</label>
			      	  <input type="hidden" name="month[{{$key}}][month]" value="{{$mont->month}}">
				      <select name="month[{{$key}}][payment]" class="form-control">
				        <option value="1"{{ $client->payment[$key]->payment == 1 ? 'selected' : ''}}>Pendente</option>
				        <option value="2"{{ $client->payment[$key]->payment == 2 ? 'selected' : ''}}>Pago via Pix</option>
				        <option value="3"{{ $client->payment[$key]->payment == 3 ? 'selected' : ''}}>Pago via Boleto</option>
				        <option value="4"{{ $client->payment[$key]->payment == 4 ? 'selected' : ''}}>Pago via Cartão Créd</option>
				      </select>
				    </div><br>
				    <div class="form-group col-md-2">
				    	<label>Data de Vencimento</label>
				    	<input type="date" name="month[{{$key}}][dueDate]" class="form-control" value="{{ isset($client->payment[$key]->dueDate) && !empty($client->payment[$key]->dueDate) ? $client->payment[$key]->dueDate : ''}}">
					</div>
					<div class="form-group col-md-2">
				    	<label>Data de Pagamento</label>
				    	<input type="date" name="month[{{$key}}][cpPrevision]" class="form-control" value="{{ isset($client->payment[$key]->cpPrevision) && !empty($client->payment[$key]->cpPrevision) ? $client->payment[$key]->cpPrevision : ''}}">
					</div>
					<div class="form-group col-md-2">
						<label>Valor</label>
						<input name="month[{{$key}}][ammount]" class="form-control mask_money" maxlength="10" placeholder="R$ 000.000,00" value="{{ isset($client->payment[$key]->ammount) && !empty($client->payment[$key]->ammount) ? number_format($client->payment[$key]->ammount, 2, ',','.') : ''}}">
					</div>
					<div class="form-group col-md-4">
						<label>Anotações referente ao pagamento</label>
						<input type="text" name="month[{{$key}}][comments]" class="form-control" maxlength="40" value="{{ isset($client->payment[$key]->comments) && !empty($client->payment[$key]->comments) ? $client->payment[$key]->comments : ''}}">
					</div>
				</div><br><hr><br>
			@endforeach

			<h4 style="text-align:center;">Informações extras</h4><br>

			<div class="row">
				<div class="form-group">
					<label>Escreva algumas informações adicionais caso queira :</label>
				    <textarea class="form-control mt-1" name="extra[informations]" rows="3" maxlength="250">{{ isset($client->extra->informations) && !empty($client->extra->informations) ? $client->extra->informations : '' }}</textarea>
			  	</div>
			</div>
			<div class="row justify-content-md-end">
				<div class="form-group col-md-2 mt-4">
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection

<script type="text/javascript">
function moreCtt() {
	var last = $('#last').val();
	var more = $('#more').val();
	var div = [];
	div.push('<div id="formCtt' + last + '" class="form-group row" style="margin-top:15px;">');
	div.push('<input type="hidden" name="contacts[' + last + '][cttId]" value="' + more + '">');
	div.push('<div class="form-group col-md-3" id="cttName' + last + '">');
	div.push('<label>Nome do Contato</label>');
	div.push('<input type="text" name="contacts[' + last + '][cttName]" class="form-control" placeholder="Nome e sobrenome" maxlength="20">');
	div.push('</div>');
	div.push('<div class="form-group col-md-2" id="cttCel' + last + '">');
	div.push('<label>Celular</label>');
	div.push('<input type="text" name="contacts[' + last + '][cttCel]" class="form-control mask_phone" placeholder="(00)00000-0000">');
	div.push('</div>');
	div.push('<div class="form-group col-md-5" id="cttDesc' + last + '">');
	div.push('<label>Descrição</label>');
	div.push('<input type="text" name="contacts[' + last + '][cttDesc]" class="form-control" placeholder="Descreva em poucas palavras quem é esse contato" maxlength="50">');
	div.push('</div>');
	div.push('</div>');
	div = div.join('');
	$("#moreCtt").append(div);
	$("#last").val(parseInt(last) + 1);
	$("#more").val(parseInt(more) + 1);
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