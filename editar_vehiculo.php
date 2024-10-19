<?php 
	session_start();
	include("db.php");
	include("header2.php");
	
	if (!isset($_SESSION['id_usuario'])) {
		header("Location: index.php");
		exit;
	}
	
	// Variables de sesión
	$id = $_SESSION['id_usuario'];
	$nombreu = $_SESSION['usuario'];
	$tipo_user = $_SESSION['id_rol'];
	$correo = $_SESSION['email'];
	$dpi = $_SESSION['dpi'];
	$nit = $_SESSION['nit'];
	$telefono = $_SESSION['telefono'];
	$direccion = $_SESSION['direccion'];
	
	
	/*if($_SESSION['rol'] != 1 AND $_SESSION['rol'] != 2)
	{
		header("location: ./");
	}

	include "../db.php";*/

	if(!empty($_POST))
	{

		$alert='';
		if(empty($_POST['marca']) || empty($_POST['modelo']) || empty($_POST['linea']) || empty($_POST['foto_actual']) || empty($_POST['foto_remove'])  )
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{

			$id 		 = $_POST['id'];
			$marca 		 = $_POST['marca'];
			$modelo      = $_POST['modelo'];
			$linea       = $_POST['linea'];
			$tipo        = $_POST['tipo'];
			$matricula   = $_POST['matricula'];
			$precio      = $_POST['precio'];
			$imgProducto = $_POST['foto_actual'];
			$imgRemove   = $_POST['foto_remove'];
			
			$foto        = $_FILES['foto'];
			$nombre_foto = $foto['name'];
			$type        = $foto['type'];  
			$url_temp    = $foto['tmp_name'];

			$upd = '';

			if($nombre_foto != '')
			{
				$destino     = 'img/uploads/';
				$img_nombre  = 'img_'.md5(date('d-m-Y H:m:s'));
				$imgProducto = $img_nombre.'.jpg';
				$src         = $destino.$imgProducto;
			}else{
				if($_POST['foto_actual'] != $_POST['foto_remove']){
					$imgProducto = 'img_producto.jpg';
				}
			}

			$query_update = mysqli_query($conn,"UPDATE vehiculos SET id_marca = '$marca',
																 id_modelo = '$modelo',
																 id_linea = '$linea',
																 id_tipo = '$tipo',
																 status = '1', 
																 matricula = '$matricula',
																 precio = '$precio',
																 foto = '$imgProducto'
													WHERE id_vehiculo = '$id'");

			if($query_update){

				if(($nombre_foto != '' && ($_POST['foto_actual'] != 'img_producto.jpg')) || ($_POST['foto_actual']  != $_POST['foto_remove'] )){
					unlink('img/uploads/'.$_POST['foto_actual']);
				}

				if($nombre_foto != ''){
					move_uploaded_file($url_temp,$src);
				}
				$alert='<p class="msg_save">Vehiculo Actualizado Correctamente.</p>';
			}else{
				$alert='<p class="msg_error">Error al Actualizar el Vehiculo.</p>';
			}
		}	
		
	}

// mostrar datos

if(empty($_REQUEST['id'])){
	//header ('Location: lista_vehiculos.php');
}else{

$id = $_GET['id'];

$query = mysqli_query($conn,"SELECT v.id_vehiculo AS id,
									mar.id_marca AS id_marca,
                                    mar.nombre AS marca,
									mo.id_modelo AS id_modelo,
                                    mo.nombre AS modelo,
									li.id_linea AS id_linea,
                                    li.nombre AS linea,
									ti.id_tipo AS id_tipo,
                                    ti.nombre AS tipo,
                                    v.matricula AS matricula,
									v.precio AS precio,
                                    es_v.nombre AS status,
                                    v.foto AS foto
                                    FROM vehiculos AS v LEFT JOIN marcas AS mar ON(v.id_marca=mar.id_marca)
                                    LEFT JOIN modelo AS mo ON(v.id_modelo=mo.id_modelo)
                                    LEFT JOIN linea AS li ON(v.id_linea=li.id_linea)
                                    LEFT JOIN tipo_vehiculo AS ti ON(v.id_linea=ti.id_tipo)
                                    LEFT JOIN status_v AS es_v ON(v.status=es_v.status)
                                    LEFT JOIN usuarios AS u ON(v.id_usuario=u.id_usuario)
									WHERE id_vehiculo='$id' ");
$result = mysqli_num_rows($query);

$foto = "";
$classRemove = 'notBlock';

if($result > 0){
	$data = mysqli_fetch_assoc($query);
		if($data['foto'] != 'img_producto.jpg'){
			$classRemove = '';
			$foto = '<img id="img" src="img/uploads/'.$data['foto'].'" alt="Vehiculo">';
		}
		
			}
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Actualizar Vehiculo</title>
	<link rel="stylesheet" href="css/style4.css">
</head>
<body>

	<section id="container">
		
		<div class="form_register">
			<h1><i class="fa-solid fa-car-on"></i> Actualizar Vehiculo</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name = "id" value="<?php echo $data['id'];?>">
			<input type="hidden" id = "foto_actual" name = "foto_actual" value="<?php echo $data['foto'];?>">
			<input type="hidden" id = "foto_remove" name = "foto_remove" value="<?php echo $data['foto'];?>">

			<!--  Marcas  -->
				<label for="marca">Marca:</label>
					<?php 
						$marcas = ("SELECT id_marca, nombre FROM marcas");
						$result_marcas = mysqli_query($conn,$marcas);		
					?>
				<select name="marca" id="marca" class="notItemOne">
					<option value="<?php echo $data['id_marca']; ?>" selected ><?php echo $data['marca']; ?></option>
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
					?>
				<select name="modelo" id="modelo" class="notItemOne">
					<option value="<?php echo $data['id_modelo']; ?>" selected ><?php echo $data['modelo']; ?></option>
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
					?>
				<select name="linea" id="linea" class="notItemOne">
				<option value="<?php echo $data['id_linea']; ?>" selected ><?php echo $data['linea']; ?></option>
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
					
					?>
				<select name="tipo" id="tipo" class="notItemOne">
					<option value="<?php echo $data['id_tipo']; ?>" selected ><?php echo $data['tipo']; ?></option>
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
				<input type="text" name="matricula" id="matricula" placeholder="Matricula / Placa"  value = "<?php echo $data['matricula']; ?>" >

				<label for="precio">Precio por Hora:</label>
				<input type="number" name="precio" id="precio" placeholder="Precio del Producto" value = "<?php echo $data['precio']; ?>" >

				<div class="photo">
					<label for="foto">Foto</label>
        				<div class="prevPhoto">
							<span class="delPhoto <?php echo $classRemove; ?>">X</span>
							<label for="foto"></label>
						
        				</div>
        				<div class="upimg">
        					<input type="file" name="foto" id="foto">
        				</div>
        				<div id="form_alert"></div>
				</div> 
				<button type="submit" class="btn_save"><i class="far fa-save fa-lg"></i> Actualizar Vehiculo</button>
			</form>
		</div>

	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>