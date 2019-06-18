<?php $this->layout('deslogado') ?>

<div class="row container">
	<?php
		if ($erro == 1) {
			?>
		<div class="row">
			<div class="col s12 m5">
				<div class="card-panel red">
					<span class="white-text">Parece que esse CNPJ já está cadastrado.</span>
				</div>
			</div>
		</div>
	<?php
		} elseif ($erro == 2) {
			?>
		<div class="row">
			<div class="col s12 m5">
				<div class="card-panel red">
					<span class="white-text">Login ou senha errado.</span>
				</div>
			</div>
		</div>
	<?php
		}

	?>
	<h1>Vamos nos conhecer melhor primeiro</h1>
	<form class="col s12" method="POST" enctype="multipart/form-data">
		<div class="row">
			<div class="input-field col s6">
				<i class="material-icons prefix">person</i>
				<input id="nome" name="nome" type="text" class="validate">
				<label for="nome">Nome completo</label>
			</div>
			<div class="input-field col s6">
				<i class="material-icons prefix">account_circle</i>
				<input id="cpf" name="cpf" type="text" class="validate">
				<label for="cpf">CPF</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s6">
				<i class="material-icons prefix">email</i>
				<input id="email" name="email" type="email" class="validate">
				<label for="email">Email</label>
			</div>
			<div class="input-field col s6">
				<i class="material-icons prefix">lock_outline</i>
				<input id="novo_senha" name="novo_senha" type="password" class="validate">
				<label for="novo_senha">Senha</label>
			</div>
		</div>
		<div class="row">
			<h3>Você trabalha aonde?</h3>
			<div class="input-field col s6">
				<i class="material-icons prefix">work</i>
				<input id="emp_nome" name="emp_nome" type="text" class="validate">
				<label for="emp_nome">Nome da organização</label>
			</div>
			<div class="input-field col s6">
				<i class="material-icons prefix">verified_user</i>
				<input id="cnpj" name="cnpj" type="text" class="validate">
				<label for="cnpj">CNPJ</label>
			</div>
		</div>
		<div class="row">
			<div class="col offset-s5">
				<button class="btn waves-effect waves-light pulse blue-grey lighten-1" type="submit" name="action">Cadastrar<i class="material-icons right">send</i>
				</button>
			</div>
		</div>
	</form>
</div>