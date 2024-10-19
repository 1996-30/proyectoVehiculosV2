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
	

 ?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Lista de Vehiculos</title>
	<link rel="stylesheet" href="css/style4.css">
</head>
<body>
	
	<section id="container">
		
		<h1><i class="fa-solid fa-car-side"></i> Lista de Vehiculos</h1>
		<a href="registro_vehiculo.php" class="btn_new"><i class="fas fa-plus"></i> Registrar Vehiculo</a>
		
		<form action="buscar_producto.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
			<button type="submit" class="btn_search"><i class="fas fa-search"></i></button>
		</form>

		<table>
			<tr>
				<th>id</th>
				<th>Marca</th>
				<th>Modelo</th>
				<th>linea</th>
				<th>Tipo</th>
				<th>Matricula</th>
				<th>Status</th>
				<th>Foto</th>
				<th>Acciones</th>
			</tr>
		<?php 
			//Paginador
			$sql_registe = mysqli_query($conn,"SELECT COUNT(*) as total_registro FROM vehiculos WHERE status != 'X' ");
			$result_register = mysqli_fetch_array($sql_registe);
			$total_registro = $result_register['total_registro'];

			$por_pagina = 10;

			if(empty($_GET['pagina']))
			{
				$pagina = 1;
			}else{
				$pagina = $_GET['pagina'];
			}

			$desde = ($pagina-1) * $por_pagina;
			$total_paginas = ceil($total_registro / $por_pagina);
			
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
			                        ORDER BY v.id_vehiculo DESC LIMIT $desde,$por_pagina");

			mysqli_close($conn);

			$result = mysqli_num_rows($query);
			if($result > 0){

				while ($data = mysqli_fetch_array($query)) {
				if($data['foto'] != 'img_producto'){
					$foto = 'img/uploads/'.$data['foto'];
				}else{
					$foto = 'img/'.$data['foto'];
				}
		
			?>
				<tr>
					<td><?php echo $data["id"]; ?></td>
					<td><?php echo $data["marca"]; ?></td>
					<td><?php echo $data["modelo"]; ?></td>
					<td><?php echo $data["linea"]; ?></td>
					<td><?php echo $data["tipo"]; ?></td>
					<td><?php echo $data["matricula"]; ?></td>
					<td><?php echo $data["status"]; ?></td>
					<!-- <td><?php echo $data["foto"]; ?></td>  -->

					<td class="img_producto"><img src="<?php echo $foto; ?>" alt="<?php echo $data['marca']; ?>"></td>

					<?php if($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2) { ?>
					<td>
						
						
						<a href="formRentas.php" class="btn btn-info">Inicia Reserva</a>
					</td>
					<?php } ?>                       						
				</tr>
			
		<?php 
				}

			}
		 ?>


		</table>
		<div class="paginador">
			<ul>
			<?php 
				if($pagina != 1)
				{
			 ?>
				<li><a href="?pagina=<?php echo 1; ?>"><i class="fas fa-step-backward"></i></a></li>
				<li><a href="?pagina=<?php echo $pagina-1; ?>"><i class="fas fa-backward"></i></a></li>
			<?php 
				}
				for ($i=1; $i <= $total_paginas; $i++) { 
					# code...
					if($i == $pagina)
					{
						echo '<li class="pageSelected">'.$i.'</li>';
					}else{
						echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
					}
				}

				if($pagina != $total_paginas)
				{
			 ?>
				<li><a href="?pagina=<?php echo $pagina + 1; ?>"><i class="fas fa-forward"></i></a></li>
				<li><a href="?pagina=<?php echo $total_paginas; ?> "><i class="fas fa-step-forward"></i></a></li>
			<?php } ?>
			</ul>
		</div>


	</section>
	
</body>
</html>