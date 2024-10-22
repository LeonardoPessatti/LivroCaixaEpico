<!DOCTYPE html>

<html>

<head>
	<title><?= $this->e($title) ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="{url}/app/views/assets/css/style.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script> url = '<?= '{url}' ?>';</script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<body>

	<div class="navbar-fixed">
		<nav>
			<div class="nav-wrapper blue-grey lighten-1">
				<a href="#!" class="brand-logo">Logo</a>
				<ul class="right hide-on-med-and-down">
					<li><a href="{url}">Home</a></li>
					<li><a href="{url}\logoff">Sair</a></li>
					<!-- <li><a href="{url}/posts">Posts</a></li>
					<li><a href="{url}/admin/posts">Go to admin</a></li> -->
				</ul>
			</div>
		</nav>
	</div>

	<?= $this->section('content') ?>

	<!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script src="{url}/app/views/assets/js/functions.min.js"></script>
	<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->

	<script>
		$(document).ready(function(){
			$('.modal').modal();
			$('select').formSelect();
		});
	</script>
</body>

</html>