<?php 
include("db.php");
session_start();

$marcas ="SELECT id_marca, nombre FROM marcas";
$result_marcas = mysqli_query($conn, $marcas);
?>

<?php 
include("header.php")
?>

 <div class="container p-1">
    <div class="row">
        <div class="col-md-2">
        <!-- contenido de la columna 4 formulario -->
        
        <!-- alert conf -->
       
        <?php if(isset($_SESSION['message'])){ ?>
                   
                   <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                   <?= $_SESSION['message']?>
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   </div>

            
        <?php 
        session_unset();
         }
         ?>
         <div class="car card-body">
            <form action="GuardaVehiculo.php" method="POST">
                <div class="form-group">
                    <h5>Registro de Vehiculos:</h5>
                </div>
                <br><!-- Este es un salto de linea -->
                <div>
                    
                    </select>
                        <label for="">Marca</label>
                        <select name="id_marca" id="marcas" class="form-control">
                        <option value=""></option>
                        <?php while($row = $result_marcas->fetch_assoc()){ ?>
                            <option value="<?php echo $row['id_marca']; ?>"><?php echo $row['nombre']; ?></option>
                        <?php } ?>
                    </select>
                    
                    <br>

                    <?php 
                        $modelos ="SELECT id_modelo, nombre FROM modelo";
                        $result_modelos = mysqli_query($conn, $modelos);
                    ?>
                    </select>
                        <label for="">Modelo</label>
                        <select name="id_modelo" id="modelo" class="form-control">
                        <option value=""></option>
                        <?php while($row = $result_modelos->fetch_assoc()){ ?>
                            <option value="<?php echo $row['id_modelo']; ?>"><?php echo $row['nombre']; ?></option>
                        <?php } ?>
                    </select>

                    <br>

                    <?php
                        $lineas ="SELECT id_linea, nombre FROM linea";
                        $result_lineas = mysqli_query($conn, $lineas);
                    ?>
                    </select>
                        <label for="">Linea</label>
                        <select name="id_linea" id="linea" class="form-control">
                        <option value=""></option>
                        <?php while($row = $result_lineas->fetch_assoc()){ ?>
                            <option value="<?php echo $row['id_linea']; ?>"><?php echo $row['nombre']; ?></option>
                        <?php } ?>
                    </select>

                    <br>

                    <?php
                        $tipos ="SELECT id_tipo, nombre FROM tipo_vehiculo";
                        $result_tipos = mysqli_query($conn, $tipos);
                    ?>
                    </select>
                        <label for="">Tipo</label>
                        <select name="id_tipo" id="tipo" class="form-control">
                        <option value=""></option>
                        <?php while($row = $result_tipos->fetch_assoc()){ ?>
                            <option value="<?php echo $row['id_tipo']; ?>"><?php echo $row['nombre']; ?></option>
                        <?php } ?>
                    </select>

                    <br>

                    <label>Matricula:</label>
                    <input type="text" name="matricula"  class="form-control" placeholder="Matricula / Placa"></text>
                    <br>


                </div>
                <br>
                <input type="submit" class="btn btn-info btn-block" name="GuardaVehiculo" value="Guardar">
                 <input type="submit" class="btn btn-danger btn-block"  value="Cancelar"> 
            </form>

         </div>
        </div>
           <!-- contenido de la columna 11 tabla de datois -->
        <div class="col-md-10">
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
                <th>Usuario</th>
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
                            <td><?php echo $row['usuario']?></td>
                                                
                            <td>
                                <a href="updateLineas.php?id_vehiculo=<?php echo $row['id']; ?>" class="btn btn-success">Actualizar</a>
                                <a href="deleteVehiculos.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Baja</a>
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