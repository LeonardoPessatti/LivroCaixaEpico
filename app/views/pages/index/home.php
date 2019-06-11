<?php $this->layout('logado');
// var_dump($user);
?>

<h1>Olá, <?= $user->nome?></h1>
<div class="row">
	<div class="col s12 m3 offset-m3">
			<a class="waves-effect waves-light btn modal-trigger" href="#modalCat">Nova Categoria</a>
		</div>
		<div class="col s12 m3">
			<a class="waves-effect waves-light btn modal-trigger" href="#modalCli">Novo cliente</a>
	</div>


<div class="row">
	<div class="col s12 m6 offset-m3">
		<div class="card red hoverable">
			<div class="card-content white-text">
				<span class="card-title">Movimentação #26823</span>
				<div class="row valign-wrapper">
					<div class="col">
						<h4>R$852,00</h4>
					</div>
					<div class="col">
						<p>Para Lolita Love</p>
					</div>
				</div>
				<p>Relativo a favores sexuais.</p>
				<p>Incluído por <b>Leonardo Pessatti</b> na categoria <b>Drogas e prostitutas</b>.</p>
			</div>
			<!-- <div class="card-action"> -->
				<!-- <a href="#">This is a link</a>
				<a href="#">This is a link</a> -->
			<!-- </div> -->
		</div>
	</div>
</div>

</div>
<div class="row">
	<div class="col s12 m6 offset-m3">
		<div class="card light-green darken-3 hoverable">
			<div class="card-content white-text">
				<span class="card-title">Movimentação #26824</span>
				<div class="row valign-wrapper">
					<div class="col">
						<h4>R$852,00</h4>
					</div>
					<div class="col">
						<p>Para LEOZITO'S DEVOPS</p>
					</div>
				</div>
				<p>Relativo a contratação do software.</p>
				<p>Incluído por <b>Leonardo Pessatti</b> na categoria <b>SOFTWARE</b>.</p>
			</div>
			<!-- <div class="card-action"> -->
				<!-- <a href="#">This is a link</a>
				<a href="#">This is a link</a> -->
			<!-- </div> -->
		</div>
	</div>
</div>




  <div id="modalCat" class="modal">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>

  <div id="modalCli" class="modal">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>