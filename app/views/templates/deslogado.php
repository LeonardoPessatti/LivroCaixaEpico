<!DOCTYPE html>

<html>

<head>
	<title><?= $this->e($title) ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="{url}/app/views/assets/css/style.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>

	<div class="navbar-fixed">
		<nav>
			<div class="nav-wrapper indigo lighten-5 teal-text text-darken-2">
				<a href="#!" class="brand-logo teal-text text-darken-2">Logo</a>
				<form class="right" method="POST" enctype="multipart/form-data">
					<!-- <span class="center">Já é cadastrado?</span> -->
					<div class="row">
						<div class="input-field col s4">
							<i class="material-icons prefix">email</i>
							<input id="login" name="login" type="text" class="validate">
							<label for="login">Email</label>
						</div>
						<div class="input-field col s4">
							<i class="material-icons prefix">lock_outline</i>
							<input id="senha" name="senha" type="text" class="validate">
							<label for="senha">Senha</label>
						</div>
						<div class="input-field col s2">
							<button class="btn waves-effect waves-light blue-grey lighten-1" type="submit" name="action">Entrar</button>
						</div>
					</div>
				</form>
			</div>
		</nav>
	</div>

	<?= $this->section('content') ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
</body>

</html>