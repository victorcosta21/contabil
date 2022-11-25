<div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="filter" aria-hidden="true" style="--bs-modal-width: 500px !important;">
  <div class="modal-dialog">
    <div class="modal-content" style="padding-left: 20px !important;padding-right:20px !important;">
      <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Filtrar busca</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
				<form class="form-group" action="">
					<div class="form-group row">
						<div class="col-md-12">
							<label>Nome</label>
							<input type="text" name="filters[name]" class="form-control" maxlength="40" placeholder="Filtre pelo nome do cliente">
						</div>
					</div>
					<div class="form-group row mt-2">
						<div class="form-group col-md-5">
							<label>Número de Conta</label>
							<input type="text" name="filters[accountNumber]" class="form-control" maxlength="5" placeholder="00000">
						</div>
						<div class="form-group col-md-7">
							<label>Documento</label>
							<input type="text" name="filters[document]" class="form-control document" id="document" placeholder="CPF / CNPJ">
						</div>
					</div>
					<div class="row justify-content-end">
						<div class="col-sm-3">
							<button type="submit" class="btn btn-primary" style="margin-top: 10px;">Filtrar</button>
						</div>
					</div>
				</form>
	  	</div>
		</div>
  </div>
</div>