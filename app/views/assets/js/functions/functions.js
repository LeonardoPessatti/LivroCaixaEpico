$(document).ready(function () {

	$("#modalCat a").click(function () {
		$.post(url + "/usuario/ajax/categoria", {
				nome: $("#modalCat #nome").val(),
				desc: $("#modalCat #desc").val(),
			})
			.done(function (data) {
				if (data.erro == null) {
					M.toast({
						html: 'Categoria cadastrada com sucesso!'
					});
					$("#cat").append('<option value="' + data + '">' + $("#modalCat #nome").val() + '</option>');
					$('select').formSelect();
				} else {
					M.toast({
						html: 'Erro no cadastro.'
					})
					// alert(data.erro)
				}
			});
	});

	$("#modalCli a").click(function () {
		$.post(url + "/usuario/ajax/cliente", {
				nome: $("#modalCli #nome").val()
			})
			.done(function (data) {
				if (data.erro == null) {
					M.toast({
						html: 'Cliente cadastrado com sucesso!'
					});
					$("#cli").append('<option value="' + data + '">' + $("#modalCli #nome").val() + '</option>');
					$('select').formSelect();
				} else {
					M.toast({
						html: 'Erro no cadastro.'
					})
					// alert(data.erro)
				}
			});
	});

	$("#send").click(function () {
		$.post(url + "/usuario/ajax/movimentacao", {
				valor: $("#valor").val(),
				desc: $("#mov_desc").val(),
				is_saida: $("#is_saida").prop('checked'),
				cli: $("#cli").val(),
				cat: $("#cat").val(),
			})
			.done(function (data) {
				if (data.erro == null) {
					M.toast({
						html: 'Movimentação cadastrada com sucesso!'
					});
					var saida = is_saida = 'false' ? 0 : 1;
					card(saida, data, $("#valor").val(), $("#cli").text(), $("#mov_desc").val(), $("#nome_hidden").val(), $("#cat").text())

				} else {
					M.toast({
						html: 'Erro na inserção da movimentação.'
					})
					// alert(data.erro)
				}
			});
	});

});

function card(is_saida, id, valor, cli, desc, user, cat) {
	var color = is_saida == 0 ? 'light-green darken-3' : 'red';

	$("#main").prepend('<div class="row"><div class="col s12 m6 offset-m3"><div class="card ' + color + ' hoverable"><div class="card-content white-text"> <span class="card-title">Movimentação #' + id + '</span><div class="row valign-wrapper"><div class="col"><h4>R$' + valor + '</h4></div><div class="col"><p>Para ' + cli + '</p ></div ></div > <p>' + desc + '</p> <p>Incluído por <b>' + user + '</b> na categoria <b>' + cat + '</b>.</p></div ></div ></div ></div >')
}