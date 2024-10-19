<?php 
session_start();
include("db.php");

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



$marcas ="SELECT id_marca, nombre FROM marcas";
$result_marcas = mysqli_query($conn, $marcas);
?>

<?php 
include("header.php")
?>

 <div class="container p-1">
    <div class="row">
        <div class="col-md">
        <!-- contenido de la columna 4 formulario -->
        
        <!-- alert conf -->
       
        <?php if(isset($_SESSION['message'])){ ?>
                   
                   <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                   <?= $_SESSION['message']?>
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   </div>

            
        <?php 
       
         }
         ?>
        
           <!-- contenido de la columna 11 tabla de datois -->
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                <th>ID</th> 
                <th>Marca</th>
                <th>Modelo</th>
                <th>Linea</th>
                <th>Tipo</th>
                <th>Matricula</th>
                <th>Status</th>
                <th>Fecha Registro</th>
                
                <th class="text-center">Acciones</th>

                </tr>
                </thead>
                <tbody>
                    <?php

                        $query = "SELECT id_vehiculo AS id,
                                    mar.nombre AS marca,
                                    mo.nombre AS modelo,
                                    li.nombre AS linea,
                                    ti.nombre AS tipo,
                                    v.matricula AS matricula,
                                    es_v.nombre AS status,
                                    v.fecha_creacion AS fecha,
                                    u.nombre AS usuario
                                    FROM vehiculos AS v LEFT JOIN marcas AS mar ON(v.id_marca=mar.id_marca)
                                    LEFT JOIN modelo AS mo ON(v.id_modelo=mo.id_modelo)
                                    LEFT JOIN linea AS li ON(v.id_linea=li.id_linea)
                                    LEFT JOIN tipo_vehiculo AS ti ON(v.id_linea=ti.id_tipo)
                                    LEFT JOIN status_v AS es_v ON(v.status=es_v.status)
                                    LEFT JOIN usuarios AS u ON(v.id_usuario=u.id_usuario)";

                        $result_task = mysqli_query($conn,$query);

                        while($row = mysqli_fetch_array($result_task))  {               ?>
                        <tr>
                            <td><?php echo $row['id']?></td>
                            <td><?php echo $row['marca']?></td>
                            <td><?php echo $row['modelo']?></td>
                            <td><?php echo $row['linea']?></td>
                            <td><?php echo $row['tipo']?></td>
                            <td><?php echo $row['matricula']?></td>
                            <td><?php echo $row['status']?></td>
                            <td><?php echo $row['fecha']?></td>
                           
                                                
                            <td>
                               
                                <a href="formRentas.php" class="btn btn-info">Inicia Reserva</a>
                            </td>

                        </tr>

                        <?php }?>

            </tbody>
            </table>
      
        </div>

    </div>

 </div>


    <?php 
include("footer.php");
?>    