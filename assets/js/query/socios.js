$(document).ready(function()
{

	$("body").on("click","#socio",function(){
	var op = $(this).attr('op');
	var iden = $(this).attr('iden');
    $.post("application/src/routes.php", {op:op, iden:iden}, function(htmlexterno){
	$("#ver-socio").show();
	$("#ver-socio").html(htmlexterno);
	$("#socios").hide();
	$("#ver-movimientos").hide();
   	 });
	});

	$("body").on("click","#movimientossocio",function(){
	var op = $(this).attr('op');
	var iden = $(this).attr('iden');
    $.post("application/src/routes.php", {op:op, iden:iden}, function(htmlexterno){
	$("#ver-movimientos").show();
	$("#ver-movimientos").html(htmlexterno);
	$("#socios").hide();
	$("#ver-socio").hide();
   	 });
	});
		

	$('#btn-addsocio').click(function(e){ /// para el formulario
		e.preventDefault();
		$.ajax({
			url: "application/src/routes.php?op=4",
			method: "POST",
			data: $("#form-addsocio").serialize(),
			success: function(data){
				$("#resultado").html(data);
				$("#form-addsocio").trigger("reset");
			}
		})
	})
$("#form-addsocio").keypress(function(e) {//Para deshabilitar el uso de la tecla "Enter"
if (e.which == 13) {
return false;
}
});



});