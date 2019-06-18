$(document).ready(function () {
	$("#modalCli a").click(function () {
		$.post(url + "/usuario/ajax/cliente", {
				nome: $("#modalCli #nome").val()
			})
			.done(function (data) {
				alert("Data Loaded: " + data);
			});
	});
});