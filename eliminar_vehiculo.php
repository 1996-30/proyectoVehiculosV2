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

	
	if(!empty($_POST))
		{
			
		$id = $_POST['id_usuario'];
		print_r($id);

		$query_delete = mysqli_query($conn,"UPDATE vehiculos SET status = 2 WHERE id_vehiculo = $id ");
		mysqli_close($conn);
		if($query_delete){
			header("location: lista_vehiculos.php");
		}else{
			echo "Error al eliminar";
		}

	}

	if(empty($_REQUEST['id']) || $_REQUEST['id'] == 1 )
	{
		header("location: lista_vehiculos.php");
		mysqli_close($conn);
	}else{

		$id = $_REQUEST['id'];

		$query = mysqli_query($conn,"SELECT v.id_vehiculo AS id,
                                    mar.nombre AS marca,
                                    mo.nombre AS modelo,
                                    li.nombre AS linea,
                                    ti.nombre AS tipo,
                                    v.matricula AS matricula,
                                    es_v.nombre AS status,
                                    v.foto AS foto
                                    FROM vehiculos AS v LEFT JOIN marcas AS mar ON(v.id_marca=mar.id_marca)
                                    LEFT JOIN modelo AS mo ON(v.id_modelo=mo.id_modelo)
                                    LEFT JOIN linea AS li ON(v.id_linea=li.id_linea)
                                    LEFT JOIN tipo_vehiculo AS ti ON(v.id_linea=ti.id_tipo)
                                    LEFT JOIN status_v AS es_v ON(v.status=es_v.status)
                                    LEFT JOIN usuarios AS u ON(v.id_usuario=u.id_usuario)
									WHERE id_vehiculo = $id");
		$result = mysqli_num_rows($query);

		if($result > 0){
			while ($data = mysqli_fetch_array($query)) {
				$id        = $data['id'];
				$marca     = $data['marca'];
				$modelo    = $data["modelo"];
				$linea     = $data["linea"]; 
				$tipo      = $data["tipo"]; 
				$matricula = $data["matricula"];
				}
		}else{
			header("location: lista_vehiculos.php");
		}


	}
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Dar de Baja Vehiculo</title>
	<link rel="stylesheet" href="css/style4.css">
</head>
<body>
	
	<section id="container">
		<div class="data_delete">
			
			<i class="fa-solid fa-car-burst fa-7x" style="color: #e66262"></i>
			<br><br>
			<h2>¿Está seguro que desea dar de baja el vehiculo?</h2>
			<p>Id: <span><?php echo $id; ?></span></p>
			<p>Marca: <span><?php echo $marca; ?></span></p>
			<p>Modelo: <span><?php echo $modelo; ?></span></p>
			<p>Linea: <span><?php echo $linea; ?></span></p>
			<p>Tipo: <span><?php echo $tipo; ?></span></p>
			<p>Matricula / Placa: <span><?php echo $matricula; ?></span></p>
			
			<form method="post" action="">
			<input type="hidden" name="id"  style="color: #e66262" value="<?php echo $id; ?>">
				<button type="submit" class="btn_ok" ><i class="fa-solid fa-car-burst"></i> Dar de Baja</button> 
				<a href="lista_vehiculos.php" class="btn_cancel"><i class="fas fa-ban"></i> Cancelar</a>
			</form>
		</div>

	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>