<div class="modal fade" id="datailModal{{ $client->accountNumber }}" tabindex="-1" role="dialog" aria-labelledby="datailModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Cliente {{$client->accountNumber}}</h5>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	  </div>
	  <div class="modal-body">
		<div class="form-group row">
		  <div class="form-group col-md-4">
			<label class="modalLabel">Nome</label>
			<input type="text" name="name" value="{{$client->name}}" class="modalAtributtes" readonly>
		  </div>
		  <div class="form-group col-md-4">
			<label class="modalLabel">Documento</label>
			<input type="text" name="name" value="Documento" class="modalAtributtes" readonly>
		  </div>
		  <div class="form-group col-md-4">
			<label class="modalLabel">Email</label>
			<input type="text" name="name" value="Email" class="modalAtributtes" readonly>
		  </div>
		</div>
		{{-- Foreach (para cada item do controle de pagamento){
			Exiba o MES, Data de Vencimento, Previsao de Pagamento, Descrição e valor do mes
		} --}}
		<div class="form-group row">

			
		</div>
		{{-- EXIBA UM SOMA DE TODOS OS VALORES QUE ESTAO COM ESTATUS PENDENTE --}}
	  </div>
	</div>
  </div>
</div>