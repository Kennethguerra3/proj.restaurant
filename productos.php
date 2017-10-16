<?php
session_start();
if (@!$_SESSION['Atiende']){//sino existe enviar a index
	header("Location:index.php");
}else{
	if($_SESSION['Power']==3){header("Location:pedidos.php");}
	if($_SESSION['Power']==2){header("Location:caja.php");}
}
?>
<!DOCTYPE html>
<html lang="es">

<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Inicio: Infocat-Grifo</title>

		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="css/estilosElementosv2.css?version=1.0.1" rel="stylesheet">
		<link href="css/sidebarDeslizable.css?version=1.0.1" rel="stylesheet">
		<link rel="stylesheet" href="css/cssBarraTop.css?version=1.0.1">
		<link rel="stylesheet" href="css/icofont.css">
		<link rel="stylesheet" href="css/snack.css?version=1.0.4">
		<link href="css/bootstrap-select.min.css" rel="stylesheet"> <!-- extraido de: https://silviomoreto.github.io/bootstrap-select/-->
		<link rel="stylesheet" href="css/bootstrap-datepicker3.css"> <!-- extraído de: https://uxsolutions.github.io/bootstrap-datepicker/-->

</head>

<body>

<div id="wrapper">

	<!-- Sidebar -->
	<div id="sidebar-wrapper">
		<ul class="sidebar-nav">
				<div class="sidebar-brand ocultar-mostrar-menu" >
						<a href="#">
								Control Panel
						</a>
				</div>
				<div class="logoEmpresa ocultar-mostrar-menu">
					<img class="img-responsive" src="images/empresa.png" alt="">
				</div>
				<li>
						<a href="principal.php"><i class="icofont icofont-space-shuttle"></i> Inicio</a>
				</li>
				<li class="active">
						<a href="productos.php"><i class="icofont icofont-washing-machine"></i> Productos</a>
				</li>
				<li>
						<a href="pedidos.php"><i class="icofont icofont-fork-and-knife"></i> Pedidos</a>
				</li>
				<li>
						<a href="caja.php"><i class="icofont icofont-cart"></i> Cobrar</a>
				</li>
				<li>
						<a href="ventas.php"><i class="icofont icofont-cart"></i> Cuadrar caja</a>
				</li>
				<li>
						<a href="#!" id="aGastoExtra"><i class="icofont icofont-ui-rate-remove"></i> Gasto extra</a>
				</li>
				<li >
						<a href="#!" id="aIngresoExtra"><i class="icofont icofont-ui-rate-add"></i> Ingreso extra</a>
				</li>
				<li>
						<a href="usuarios.php"><i class="icofont icofont-users"></i> Usuarios</a>
				</li>
				<li>
						<a href="#"><i class="icofont icofont-ui-copy"></i> Reportes</a>
				</li>
				<li>
						<a href="#!" class="ocultar-mostrar-menu"><i class="icofont icofont-swoosh-left"></i> Ocultar menú</a>
				</li>
		</ul>
	</div>
			<!-- /#sidebar-wrapper -->
<div class="navbar-wrapper">
	<div class="container-fluid">
			<nav class="navbar navbar-fixed-top encoger">
				<div class="container">
					<div class="navbar-header ">
					<a class="navbar-brand ocultar-mostrar-menu" href="#"><img id="imgLogoInfocat" class="img-responsive" src="images/logo.png" alt=""></a>
							<button type="button" class="navbar-toggle collapsed" id="btnColapsador" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							</button>
							
					</div>
					<div id="navbar" class="navbar-collapse collapse ">
							<ul class="nav navbar-nav">
								<li class="hidden down"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">HR <span class="caret"></span></a>
											<ul class="dropdown-menu">
													<li><a href="#">Change Time Entry</a></li>
													<li><a href="#">Report</a></li>
											</ul>
									</li>
							</ul>
							<ul class="nav navbar-nav pull-right">
								 <li>
									<div class="btn-group has-clear hidden"><label for="txtBuscarNivelGod" class="text-muted visible-xs">Buscar algo:</label>
										<input type="text" class="form-control" id="txtBuscarNivelGod" placeholder="&#xeded;">
										<span class="form-control-clear glyphicon glyphicon-remove-circle form-control-feedback hidden"></span>
									</div>
								 </li>
								 <li id="liDatosPersonales"><a href="#!"><p><strong>Usuario: </strong> <span class="mayuscula" id="menuNombreUsuario"><?php echo $_SESSION["Atiende"]; ?></span></p><small class="text-muted text-center" id="menuFecha"><span id="fechaServer"></span> <span id="horaServer"><?php require('php/gethora.php') ?></span> </small></a></li>
									
				<li class="text-center"><a href="php/desconectar.php"><span class="visible-xs">Cerrar Sesión</span><i class="icofont icofont-sign-out"></i></a></li>
							</ul>
							
					</div>
			</div>
			</nav>
	</div>
</div>
<!-- Page Content -->
<div id="page-content-wrapper">
	<div class="container-fluid">				 
			<div class="row">
				<div class="col-lg-12 contenedorDeslizable">
				<!-- Empieza a meter contenido principal dentro de estas etiquetas -->
				 <h2 class="purple-text text-lighten-1"><i class="icofont icofont-options"></i> Panel de configuraciones generales</h2>

					<ul class="nav nav-tabs">
					<li class="active"><a href="#tabAgregarLabo" data-toggle="tab">Listado de productos</a></li>
					<li><a href="#tabCambiarPassUser" data-toggle="tab">Categorías</a></li>
					
					</ul>
					
					<div class="tab-content">
					<!--Panel para buscar productos-->
						<!--Clase para las tablas-->
						<div class="tab-pane fade in active container-fluid" id="tabAgregarLabo">
						<!--Inicio de pestaña 01-->
							<div class="row" style="padding-bottom: 15px">
								<div class="col-xs-4">
									<button class="btn btn-success btn-outline btn-lg" id="btnAddNewProduct"><i class="icofont icofont-chef"></i> Agregar nuevo producto</button>
								</div>
								<div class="col-xs-4"></div>
								<div class="col-xs-4"></div>
							</div>
							<div class="row"><strong>
								<div class="col-xs-2">Categoría</div>
								<div class="col-xs-5">Producto</div>
								<div class="col-xs-2">Precio</div>
								<div class="col-xs-2">Stock</div>
								<div class="col-xs-1">@</div></strong>
							</div>
							<div id="divProductosListado">
								
							</div>

						<!--Fin de pestaña 01-->
						</div>

						

						<!--Panel para nueva compra-->
						<div class="tab-pane fade container-fluid" id="tabCambiarPassUser">
						<!--Inicio de pestaña 02-->
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, quis, facilis beatae recusandae optio molestias ipsam quibusdam aliquid rerum voluptatem incidunt in vero quo illo natus? Asperiores, ipsum placeat dolorum.
						<!--Fin de pestaña 02-->
						</div>
						
					</div>
					<!-- Fin de meter contenido principal -->
					</div>
					
				</div>
		</div>
</div>
<!-- /#page-content-wrapper -->
</div><!-- /#wrapper -->

<!-- Modal para agregar producto nuevo a la BD -->
<div class="modal fade modal-addProductoBD" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
<div class="modal-dialog modal-sm" role="document">
	<div class="modal-content">
		<div class="modal-header-warning">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class="icofont icofont-help-robot"></i> Agregar nuevo producto</h4>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
			<div class="row">
				<label for="">Producto:</label> <input type="text" class="form-control text-center mayuscula" id="txtModalProdNomAdd">
				<label for="">Precio:</label>
				<input type="number" class="form-control mayuscula text-center esMoneda" id="txtModalPrecioadd" value="0" min=0 step=1 >
				<label for="">Categoría:</label>
				<div  id="divSelectProductoListNew">
					<select class="selectpicker mayuscula" title="Producto..."  data-width="100%" data-live-search="true"">
						<?php require 'php/listarProductosCategoriaOption.php'; ?>
					</select>
				</div>
			</div>
			<div class="" id="divCajaProductosExtrResultado" style="padding-top: 15px;">

			</div>
			</div>
			<label class="text-danger labelError hidden" for=""><i class="icofont icofont-animal-squirrel"></i> Lo siento! <span class=mensaje></span></label>
		</div>
		
		<div class="modal-footer">
			<button class="btn btn-danger btn-outline" data-dismiss="modal" ><i class="icofont icofont-close"></i> Cerrar</button>
			<button class="btn btn-success btn-outline" id="btnGuardarAddConfig"><i class="icofont icofont-save"></i> Guardar</button>
		</div>
	</div>
	</div>
</div>

<!-- Modal para agregar producto extra a caja -->
<div class="modal fade modal-configurarProducto" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
<div class="modal-dialog modal-sm" role="document">
	<div class="modal-content">
		<div class="modal-header-warning">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class="icofont icofont-help-robot"></i> Configuración de producto</h4>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
			<div class="row">
				<label for="">Producto:</label> <span class="mayuscula" id="spanModalPrecioConf"></span><span class="hidden" id="spanModalIdProdConf"></span><br>
				<label for="">Precio:</label>
				<input type="number" class="form-control mayuscula text-center esMoneda" id="txtModalPrecioConf" min=0 step=1 >
				<label for="">Stock:</label>
				<input type="number" class="form-control mayuscula text-center" id="txtModalStockConf" min=0 step=1 ><input type="number" class="hidden" id="stockAnterior">
				<label for="">Categoría:</label>
				<div  id="divSelectProductoListado">
					<select class="selectpicker mayuscula" title="Producto..."  data-width="100%" data-live-search="true"">
						<?php require 'php/listarProductosCategoriaOption.php'; ?>
					</select>
				</div>
			</div>
			<div class="" id="divCajaProductosExtrResultado" style="padding-top: 15px;">

			</div>
			</div>
			<label class="text-danger labelError hidden" for=""><i class="icofont icofont-animal-squirrel"></i> Lo siento! <span class=mensaje></span></label>
		</div>
		
		<div class="modal-footer">
			<button class="btn btn-danger btn-outline" data-dismiss="modal" ><i class="icofont icofont-close"></i> Cerrar</button>
			<button class="btn btn-success btn-outline" id="btnGuardarCambioConfig"><i class="icofont icofont-save"></i> Guardar</button>
		</div>
	</div>
	</div>
</div>

<!-- Modal para indicar que falta completar campos o datos con error -->
<div class="modal fade modal-faltaCompletar" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
<div class="modal-dialog modal-sm" role="document">
	<div class="modal-content">
		<div class="modal-header-danger">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class="icofont icofont-help-robot"></i> Campos incorrectos o faltantes</h4>
		</div>
		<div class="modal-body">
			Ups, un error: <i class="icofont icofont-animal-squirrel"></i> <strong id="lblFalta"></strong>
		</div>
		<div class="modal-footer"> <button class="btn btn-danger btn-outline" data-dismiss="modal"><i class="icofont icofont-alarm"></i> Ok, revisaré</button></div>
	</div>
</div>
</div>

<!-- Modal para eliminar producto de la BD -->
<div class="modal fade modal-removerProducto" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
<div class="modal-dialog modal-sm" role="document">
	<div class="modal-content">
		<div class="modal-header-danger">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class="icofont icofont-help-robot"></i> Eliminar Producto</h4>
		</div>
		<div class="modal-body">
			<p>Desea eliminar el producto <strong>«<span id="remoProdNombre"></span>»</strong><span class="hidden" id="remoProdId"></span>. </p>
			<p>Confirme con su contraseña por favor.</p>
			<input type="password" id="txtPassRemover" class="form-control text-center" >
			<label class="text-danger labelError hidden" for=""><i class="icofont icofont-animal-squirrel"></i> Lo siento! <span class=mensaje></span></label>
		</div>
		<div class="modal-footer">
			<button class="btn btn-danger btn-outline" data-dismiss="modal"><i class="icofont icofont-close"></i> Cerrar</button>
			<button class="btn btn-danger btn-outline" id="btnEliminarProdModal"><i class="icofont icofont-alarm"></i> Ok, eliminar</button>
		</div>
	</div>
</div>
</div>
<?php include 'php/llamandoModals.php'; ?>

	
<!-- jQuery -->
<script src="js/jquery-2.2.4.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="js/moment.js"></script>
<script src="js/inicializacion.js?version=1.1"></script>
<script src="js/accionesGlobales.js?version=1.1"></script>
<script src="js/bootstrap-select.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/bootstrap-datepicker.es.min.js"></script>


<script>
$(document).ready(function(){
datosUsuario();
$('.selectpicker').selectpicker('refresh');

$('.mitooltip').tooltip();
$('input').keypress(function (e) {
	if (e.keyCode == 13)
	{
		$(this).parent().next().children().focus();
		//$(this).parent().next().children().removeAttr('disabled'); //agregar atributo desabilitado
	} 
});

$.ajax({url:'php/listarProductos.php', data: 'POST'}).done(function (resp) { //console.log(resp)
	$.each(JSON.parse(resp), function (i, dato) {
		$('#divProductosListado').append(`<div class="row">
				<div class="col-xs-2 mayuscula"><button class="btn btn-danger btn-circle btn-NoLine btn-outline btnRemoverProducto" id="${dato.idProducto}"><i class="icofont icofont-close"></i></button>${i+1}. <span class="spanCategoria">${dato.tipDescripcion}</span></div>
				<div class="col-xs-5 mayuscula divNombrProd">${dato.prodDescripcion}</div>
				<div class="col-xs-2 divPrecPro">${parseFloat(dato.prodPrecio).toFixed(2)}</div>
				<div class="col-xs-2 divStockPro">${dato.stockCantidad}</div>
				<div class="col-xs-1"><button class="btn btn-success btn-outline btn-NoLine btnConfigProducto" id="${dato.idProducto}"><i class="icofont icofont-options"></i></button></div></div>`);
	});
});
}); //Fin de document ready

$('body').on('click', '.btnConfigProducto', function () {
	var contenedor= $(this).parent().parent();
	$('#spanModalIdProdConf').text($(this).attr('id'));
	$('#spanModalPrecioConf').text(contenedor.find('.divNombrProd').text());
	$('#txtModalPrecioConf').val(contenedor.find('.divPrecPro').text());
	$('#txtModalStockConf').val(contenedor.find('.divStockPro').text());
	$('#stockAnterior').val(contenedor.find('.divStockPro').text());
	$('#divSelectProductoListado .selectpicker').selectpicker('val',contenedor.find('.spanCategoria').text()).selectpicker('refresh');
	$('.modal-configurarProducto').modal('show');
});
$('#btnGuardarCambioConfig').click(function () {
	if($('#txtModalPrecioConf').val()<0 || $('#txtModalStockConf').val()<0 ){
		$('.modal-configurarProducto .labelError').removeClass('hidden').find('.mensaje').text('No se pueden guardar valores negativos');
	}else{
		$('.modal-configurarProducto .labelError').addClass('hidden');
		var idCategoria=$('#divSelectProductoListado').find('li.selected a').attr('data-tokens');
		console.log(idCategoria);
		var diferencia= $('#txtModalStockConf').val()-$('#stockAnterior').val();
		//console.log(diferencia)
		$.ajax({url:'php/actualizarStockPrecioProducto.php', type: 'POST', data:{idProd: $('#spanModalIdProdConf').text(),stock: $('#txtModalStockConf').val(), precio: $('#txtModalPrecioConf').val() , categoria: idCategoria, idUser: $.JsonUsuario.idUsuario, cantidad: diferencia }}).done(function (resp) { console.log(resp)
			if(resp>0){window.location.href = 'productos.php';}
		});
	}
	

});
$('body').on('click','.btnRemoverProducto',function () {
	var contenedor= $(this).parent().parent();
	var idElim=$(this).attr('id');
	$('#remoProdNombre').text(contenedor.find('.divNombrProd').text());
	$('#remoProdId').text(idElim);
	$('.modal-removerProducto').modal('show');
});
$('#btnEliminarProdModal').click(function () {
	$.ajax({url: 'php/eliminarProductoBD.php', type: 'POST', data: {idProd:$('#remoProdId').text(), idUser: $.JsonUsuario.idUsuario, pass: $('#txtPassRemover').val()  }}).done(function (resp) { //console.log(resp);
		if(resp=='Y'){window.location.href = 'productos.php';}
		else{$('.modal-removerProducto .labelError').removeClass('hidden').find('.mensaje').text('Su contraseña no es la correcta.');}
	});
});
$('#btnAddNewProduct').click(function () {
	$('.modal-addProductoBD').modal('show');
});
$('#btnGuardarAddConfig').click(function () {
	var idCategoria=$('#divSelectProductoListNew').find('li.selected a').attr('data-tokens');
	if($('#txtModalProdNomAdd').val()==''){ $('.modal-addProductoBD .labelError').removeClass('hidden').find('.mensaje').text('Debe ingresar un nombre.');}
	else if($('#txtModalPrecioadd').val()<0){ $('.modal-addProductoBD .labelError').removeClass('hidden').find('.mensaje').text('Un precio no puede ser negativo.');}
	else if(idCategoria==null){ $('.modal-addProductoBD .labelError').removeClass('hidden').find('.mensaje').text('Debe selecionar una categoría.');}
	else{
		$('.modal-addProductoBD .labelError').addClass('hidden');
		$.ajax({url:'php/insertarProductoNuevo.php', type: 'POST', data:{descripcion: $('#txtModalProdNomAdd').val(), precio: $('#txtModalPrecioadd').val(), tipoProd: idCategoria }}).done(function (resp) {
			if(resp>0){window.location.href = 'productos.php';}
		});
	}
	
});

</script>
</body>
</html>
