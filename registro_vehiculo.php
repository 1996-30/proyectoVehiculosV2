<?php 
	session_start();
	include "db.php";	
	include "header2.php";

	if(!isset($_SESSION['id_usuario'])){
		header("Location: inicio.php");
	}  
	
	$id = $_SESSION['id_usuario'] ;
	$nombreu = $_SESSION['usuario'];
	$tipo_user = $_SESSION['id_rol'] ;
	$nombreu = mb_convert_case($nombreu, MB_CASE_UPPER, "UTF-8");
	 $correo =  $_SESSION['email'] ;
	 $dpi = $_SESSION['dpi'] ;
	 $nit = $_SESSION['nit'] ;
	 $telefono = $_SESSION['telefono'] ;
	 $direccion = $_SESSION['direccion'];
	
	

	if(!empty($_POST))
	{

		$alert='';
		if(empty($_POST['marca']) || empty($_POST['modelo']) || empty($_POST['linea']) || empty($_POST['tipo'])  )
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{

			$marca 		 = $_POST['marca'];
			$modelo      = $_POST['modelo'];
			$linea       = $_POST['linea'];
			$tipo        = $_POST['tipo'];
			$matricula   = $_POST['matricula'];
			
			$foto        = $_FILES['foto'];
			$nombre_foto = $foto['name'];
			$type        = $foto['type'];  
			$url_temp    = $foto['tmp_name'];

			$imgProducto = 'img_producto.jpg';

			if($nombre_foto != '')
			{
				$destino     = 'img/uploads/';
				$img_nombre  = 'img_'.md5(date('d-m-Y H:m:s'));
				$imgProducto = $img_nombre.'.jpg';
				$src         = $destino.$imgProducto;
			}

			$query_insert = mysqli_query($conn,"INSERT INTO vehiculos(id_marca, id_modelo, id_linea, id_tipo, status, matricula, id_usuario, foto)
																VALUES('$marca','$modelo','$linea','$tipo','1','$matricula','".$_SESSION['id_usuario']."','$imgProducto')");

			if($query_insert){
				if($nombre_foto != ''){
					move_uploaded_file($url_temp,$src);
				}
				$alert='<p class="msg_save">Producto Guardado Correctamente.</p>';
			}else{
				$alert='<p class="msg_error">Error al Guardar el Producto.</p>';
			}
		}	
		
	}

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	
	<title>Registrar Automovil</title>
	<link rel="stylesheet" href="css/style4.css">
</head>
<body>
    
	<section id="container">
		
		<div class="form_register">
			<h1><i class="fa-solid fa-car-side"></i> + Registrar Vehiculo</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post" enctype="multipart/form-data">

			<!--  Marcas  -->
				<label for="marca">Marca:</label>
					<?php 
						$marcas = ("SELECT id_marca, nombre FROM marcas");
						$result_marcas = mysqli_query($conn,$marcas);
						//mysqli_close($conn);
					?>
				<select name="marca" id="marca">
					<?php 
							if($result_marcas > 0){
							while ($marcas = mysqli_fetch_array($result_marcas)){
					?>
				  	<option value="<?php echo $marcas['id_marca']; ?>"><?php echo $marcas['nombre']; ?></option>
							<?php
									}
								}
							?>	
				</select> 

			<!--  Modelos -->
				<label for="modelo">Modelo:</label>
					<?php 
						$modelos = ("SELECT id_modelo, nombre FROM modelo");
						$result_modelos = mysqli_query($conn,$modelos);
						//mysqli_close($conn);
					?>
				<select name="modelo" id="modelo">
					<?php 
							if($result_modelos > 0){
							while ($modelos = mysqli_fetch_array($result_modelos)){
					?>
				  	<option value="<?php echo $modelos['id_modelo']; ?>"><?php echo $modelos['nombre']; ?></option>
							<?php
									}
								}
							?>	
				</select> 

			<!--  Linea -->
				<label for="linea">Linea:</label>
					<?php 
						$lineas = ("SELECT id_linea, nombre FROM linea");
						$result_lineas = mysqli_query($conn,$lineas);
						//mysqli_close($conn);
					?>
				<select name="linea" id="linea">
					<?php 
							if($result_lineas> 0){
							while ($lineas = mysqli_fetch_array($result_lineas)){
					?>
				  	<option value="<?php echo $lineas['id_linea']; ?>"><?php echo $lineas['nombre']; ?></option>
							<?php
									}
								}
							?>	
				</select> 

			<!-- Linea -->
				<label for="tipo">Tipo:</label>
					<?php 
						$tipos= ("SELECT id_tipo, nombre FROM tipo_vehiculo");
						$result_tipos = mysqli_query($conn,$tipos);
						//mysqli_close($conn);
					?>
				<select name="tipo" id="tipo">
					<?php 
							if($result_tipos> 0){
							while ($tipos= mysqli_fetch_array($result_tipos)){
					?>
				  	<option value="<?php echo $tipos['id_tipo']; ?>"><?php echo $tipos['nombre']; ?></option>
							<?php
									}
								}
							?>	
				</select> 

				<label for="matricula">Matricula</label>
				<input type="text" name="matricula" id="matricula" placeholder="Matricula / Placa">
				
				<label for="precio">Precio por Hora:</label>
				<input type="number" name="precio" id="precio" placeholder="Precio del Producto">

				<div class="photo">
					<label for="foto">Foto</label>
        				<div class="prevPhoto">
        				<span class="delPhoto notBlock">X</span>
        				<label for="foto"></label>
        				</div>
        				<div class="upimg">
        				<input type="file" name="foto" id="foto">
        				</div>
        				<div id="form_alert"></div>
				</div> 

				<button type="submit" class="btn_save"><i class="far fa-save fa-lg"></i>  Guardar Producto</button>
				
			</form>

		</div>


	</section>
	
</body>
</html>