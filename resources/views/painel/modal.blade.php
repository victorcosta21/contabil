<div class="modal fade" id="datailModal{{ $client->accountNumber }}" tabindex="-1" role="dialog" aria-labelledby="datailModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Cliente {{$client->accountNumber}}</h5>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	  </div>
	  <div class="modal-body">
		<div class="form-group row">
		    <div class="form-group col-md-3">
				<label class="modalLabel">Nome</label>
		    </div>
		  	<div class="form-group col-md-3">
				<label class="modalLabel">Documento</label>
			</div>
			<div class="form-group col-md-5">
				<label class="modalLabel">Email</label>
			</div>
		</div>
	  	<div class="form-group row"> 
		  	<div class="form-group col-md-3">
				<input type="text" name="name" value="{{$client->name}}" class="modalAtributtes" readonly>
		  	</div>
		  	<div class="form-group col-md-3">
				<input type="text" name="document" value="{{$client->document}}" class="modalAtributtes" readonly>
			</div>
			<div class="form-group col-md-5">
				<input type="text" name="email" value="{{$client->email}}" class="modalAtributtes" readonly>
			</div>
		</div>
		<hr>
		<div class="form-group row" style="text-align:center;">
			<label class="modalLabel">Valor total de dívidas</label>
			<h6>R$ VALOR TOTOAL DA DIVIDA</h6>
			
		</div>
		<hr>
		@foreach ($client->payment as $key => $pay)
			@if($pay->ammount != 0)
				<div class="form-group row">
					<div class="form-group col-md-3">
						<label class="modalLabel">{{$pay->month}}</label>
						<input type="text" name="month" class="modalAtributtes" readonly
						@if ($pay->payment == 1)
							value="Pendente" style="color: red;">
						@elseif($pay->payment == 2)
							value="Pago via Pix" style="color: green;">
						@elseif($pay->payment == 3)
							value="Pago via Boleto" style="color: green;">
						@elseif($pay->payment == 4)
							value="Pago via Cartão Créd" style="color: green;">
						@endif
					</div>
					<div class="form-group col-md-2">
						<label class="modalLabel">Vencimento</label>
						<input type="date" name="dueDate" class="modalAtributtes" value="{{$pay->dueDate}}" readonly>
					</div>
					@if($pay->payment == 1)
						<div class="form-group col-md-2">
							<label class="modalLabel">Previsão</label>
							<input type="date" name="cpPrevision" class="modalAtributtes" value="{{$pay->cpPrevision}}" readonly>
						</div>
					@else
						<div class="form-group col-md-2">
							<label class="modalLabel">Pago em: </label>
							<input type="date" name="cpPrevision" class="modalAtributtes" value="{{$pay->cpPrevision}}" readonly>
						</div>
					@endif
					<div class="form-group col-md-2">
						<label class="modalLabel">Valor</label>
						<input type="text" name="ammount" class="modalAtributtes" value="R$ {{$pay->ammount}}" readonly>
					</div>
					<div class="form-group col-md-4">
						<label class="modalLabel">Comentários</label>
						<input type="text" name="comments" class="modalAtributtes" value="{{$pay->comments}}" readonly>
					</div>
				</div>	
				<hr>
			@else
				@php
					unset($pay);
					continue;
				@endphp
			@endif
		@endforeach

		{{-- EXIBA UM SOMA DE TODOS OS VALORES QUE ESTAO COM ESTATUS PENDENTE --}}
	  </div>
	</div>
  </div>
</div>