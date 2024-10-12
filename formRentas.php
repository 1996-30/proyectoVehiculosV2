<?php 
include("db.php");
session_start();

$vehiculos = "SELECT id_vehiculo, CONCAT(marcas.nombre,' - ',linea.nombre,' - ', modelo.nombre,' - ', matricula) as nombre 
              FROM vehiculos 
              INNER JOIN marcas ON vehiculos.id_marca=marcas.id_marca
              INNER JOIN linea ON vehiculos.id_linea=linea.id_linea
              INNER JOIN modelo ON vehiculos.id_modelo=modelo.id_modelo" ;
$respuestaVehiculos = mysqli_query($conn, $vehiculos);

if(isset($_GET['id_cliente'])){
    $id = $_GET['id_cliente'];
    $query = "SELECT * FROM cliente WHERE id_cliente = $id";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result)==1)
    {
        $row = mysqli_fetch_array($result);
        $nombre =$row['nombre'];
        $dpi =$row['DPI'];
        $nit =$row['NIT'];
        $email =$row['email'];
    }
}

if(isset($_POST['guardar'])){
    $id = $_GET['id_cliente'];
    $nombre = $_POST['nombre'];
    $dpi = $_POST['DPI'];
    $nit = $_POST['NIT'];
    $email = $_POST['email'];

 
}
?>

<?php 
include("header.php")
?>

 <div class="container p-4">
    <div class="row">
        <div class="col-md-3">
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
         <form action="formRentas.php?id_cliente=<?php echo $_GET['id_cliente'] ;  ?>" method="POST">
                <h2>Cliente: </h1>
                <div class="form-group">
                    <label for="">Nombre del Cliente</label>
                    <input type="text" name="nombre" class="form-control" placeholder=" Nombre Cliente" value="<?php echo $nombre ?>">
                    <br>
                    <label for="">DPI</label>
                    <input type="text" name="DPI" class="form-control" placeholder="DPI" value="<?php echo $dpi ?>">
                    <br>
                    <label for="">NIT</label>
                    <input type="text" name="NIT" class="form-control" placeholder=" NIT" value="<?php echo $nit ?>">
                    <br>
                    <label for="">Correo Electrónico</label>
                    <input type="email" name="email" class="form-control" placeholder="email" value="<?php echo $email ?>">
                    <br>
                    <div>
                    <label for="Vehiculos" class="form-control">Seleccione Vehiculo:</label><br>
                    <select name="id_vehiculo" id="vehiculos" class="form-control">
                    <option value=""></option>
                    <?php while($row = $respuestaVehiculos->fetch_assoc()){ ?>
                        <option value="<?php echo $row['id_vehiculo']; ?>"><?php echo $row["nombre"]; ?></option>
                    <?php } ?>
                    </select>
                    <br>
                    <label for="">Estado del Automovil</label>
                    <input type="email" name="email" class="form-control" placeholder="Estatus" value="">
                    <br>

                </div>
                <br>


                </div>
                <br>
               <button class="btn btn-info" name="guardar">Guardar Reserva</button>
            </form>

         </div>
        </div>
           <!-- contenido de la columna 8 tabla de datois -->
        <div class="col-md-9   ">
            <table class="table table-bordered">
                <thead>
                <tr>
               
                <th>Nombre</th>
                <th>Vehiculo</th>
                <th>E.R</th>
                <th>Fecha Renta</th>
                <th>Acciones</th>


                </tr>
                </thead>
                <tbody>
                  
                        <tr>
                           
                            <td>Heber</td>
                            <td>Toyota-Corolla-2010</td>
                            <td>A</td>
                            <td>2024-10-10</td>
                            
                           
                            
                            <td>
                                <a href="" class="btn btn-success">Actualizar</a>
                                <a href="" class="btn btn-danger">Estado Reserva</a>
                            </td>

                        </tr>

                       

            </tbody>
            </table>
      
        </div>

    </div>

 </div>


    <?php 
include("footer.php");
?>    