<?php 
include("db.php");
session_start();
?>

<?php 
include("header.php")
?>

 <div class="container p-4">
    <div class="row">
        <div class="col-md-4">
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
         <div class="car card-body">
            <form action="GuardaEstatus.php" method="POST">
                <div class="form-group">
                    <h5>Registro Estatus Estado de Reservas:</h5>
                </div>
                <br><!-- Este es un salto de linea -->
                <div class="form-group">
                    <input type="text" name="nombre"  class="form-control" placeholder="Ingrese Estatus"></text>
                </div>
                <br>
                <input type="submit" class="btn btn-info btn-block" name="guardaEstatus" value="Guardar">
                 <input type="submit" class="btn btn-danger btn-block"  value="Cancelar"> 
            </form>

         </div>
        </div>
           <!-- contenido de la columna 8 tabla de datois -->
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                <tr>
                <th>Codigo</th> 
                <th>Estatus Reservacion</th>
                <th>Acciones</th>

                </tr>
                </thead>
                <tbody>
                    <?php

                        $query = "SELECT status, nombre FROM status_r";
                        $resultadoEstatus = mysqli_query($conn,$query);

                        while($row = mysqli_fetch_array($resultadoEstatus))  {               ?>
                        <tr>
                            <td><?php echo $row['status']?></td>
                            <td><?php echo $row['nombre']?></td>
                            
                            <td>
                            <a href="updateEstatus.php?status=<?php echo $row['status']; ?>" class="btn btn-success">Actualizar</a>
                            <a href="deleteEstatus.php?status=<?php echo $row['status']; ?>" class="btn btn-danger">Eliminar</a>

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