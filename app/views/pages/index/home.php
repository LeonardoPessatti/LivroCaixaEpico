<?php $this->layout('logado') ?>

<h1>Olá, <?= $user->nome?></h1>
<div class="row">
	<div class="col s12 m3 offset-m3">
			<a class="waves-effect waves-light btn modal-trigger" href="#modalCat">Nova Categoria</a>
		</div>
		<div class="col s12 m3">
			<a class="waves-effect waves-light btn modal-trigger" href="#modalCli">Novo cliente</a>
	</div>

</div>
<div class="row">
	<div class="col s12 m6 offset-m3">
		<div class="card blue-grey darken-1">
				<div class="card-content white-text">
				<span class="card-title">Card Title</span>
				<p>I am a very simple card. I am good at containing small bits of information..</p>
			</div>
			<div class="card-action">
				<a href="#">This is a link</a>
				<a href="#">This is a link</a>
			</div>
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