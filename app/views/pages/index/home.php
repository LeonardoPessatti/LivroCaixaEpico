<?php $this->layout('logado');
// var_dump($movs);
?>

<h1>Olá, <?= $user->nome?></h1>
<input type="hidden" id="nome_hidden" value=" <?= $user->nome?>">

	<div class="row">
		<div class="col s12 m2 offset-m3">
			<a class="waves-effect waves-light btn modal-trigger" href="#modalCat">Nova Categoria</a>
		</div>
		<div class="col s12 m2">
			<a class="waves-effect waves-light btn modal-trigger" href="#modalCli">Novo cliente</a>
		</div>
	</div>

	<div class="row">
		<div class="col s12 m6 offset-m3">
			<div class="card grey lighten-5 hoverable">
				<div class="card-content ">
					<span class="card-title">Nova Movimentação</span>
					<div class="row valign-wrapper">
						<form class="col s12">

							<div class="row">
								<div class="input-field col s4">
									<input id="valor" type="text" class="validate">
									<label for="first_name">Valor</label>
								</div>
								<div class="input-field col s8">
									<input id="mov_desc" type="text" class="validate">
									<label for="mov_desc">Descrição</label>
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12 m6">
									<select id="cli">
										<!-- <option value="" disabled selected>Escolha o negociante</option> -->

									<?php
									foreach ($user->clientes as $cliente) {
										echo '<option value="' . $cliente->id . '">' . $cliente->nome . '</option>';
									}
									?>

									</select>
									<label>Negociante</label>
								</div>
								<div class="input-field col s12 m6">
									<select id="cat">
										<!-- <option value="" disabled selected>Escolha a Categoria</option> -->
										<?php
											foreach ($user->categorias as $categoria) {
												echo '<option value="' . $categoria->id . '">' . $categoria->nome . '</option>';
											}
										?>
									</select>
									<label>Categoria</label>
								</div>

							<div class="row">
								<div class="col m6">
									<div class="switch">
										<label>
											Entrada
											<input type="checkbox" id="is_saida">
											<span class="lever"></span>
											Saída
										</label>
									</div>
								</div>
								<div class="col m6">

								</div>
							</div>

						</form>
					</div>
				</div>
				<div class="card-action">
					<a id="send">Inserir</a>
					<a id="clean">Limpar</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col s12 m4 offset-m3">
			<p>Total a Receber <b>R$ <span id="receber"><?= $saldo->entrada ?></span></b></p>
		</div>
		<div class="col s12 m4">
			<p>Total a Pagar <b>R$ <span id="pagar"><?= $saldo->saida ?></span></b></p>
		</div>
	</div>
<div id="main"></div>
	<!-- <div class="row">
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
				<div class="card-action">
					<a href="#">This is a link</a>
					<a href="#">This is a link</a>
				</div>
			</div>
		</div>
	</div> -->
<!--
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
			</div>
		</div>
	</div>
</div> -->




	<div id="modalCat" class="modal">
		<div class="modal-content">
			<h4 class="card-title">Nova Categoria</h4>
			<form class="col s12">
				<div class="row">
					<div class="input-field col s4">
						<input id="nome" type="text" class="validate">
						<label for="nome">Nome</label>
					</div>
					<div class="input-field col s8">
						<input id="desc" type="text" class="validate">
						<label for="desc">Descrição</label>
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-close waves-effect waves-green btn-flat">Cadastrar</a>
		</div>
	</div>

	<div id="modalCli" class="modal">
		<div class="modal-content">
			<h4 class="card-title">Novo Cliente</h4>
			<form class="col s12">
				<div class="row">
					<div class="input-field col s4">
						<input id="nome" type="text" class="validate">
						<label for="nome">Nome</label>
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-close waves-effect waves-green btn-flat">Cadastrar</a>
		</div>
	</div>



	<script>
		$(document).ready(function () {
	<?php
		foreach ($movs as $mov) {
			echo 'card("' . $mov->is_saida . '", "' . $mov->id . '", "' . $mov->valor . '", "' . $mov->cli . '", "' . $mov->desc . '", "' . $mov->user . '", "' . $mov->cat . '");';
		}
	?>
});
	</script>