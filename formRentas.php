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

$vehiculos = "SELECT id_vehiculo, CONCAT(marcas.nombre,' - ',linea.nombre,' - ', modelo.nombre,' - ', matricula, ' - ',tipo_vehiculo.nombre ) as nombre 
              FROM vehiculos 
              INNER JOIN marcas ON vehiculos.id_marca=marcas.id_marca
              INNER JOIN linea ON vehiculos.id_linea=linea.id_linea
              INNER JOIN modelo ON vehiculos.id_modelo=modelo.id_modelo
              INNER JOIN tipo_vehiculo ON vehiculos.id_tipo=tipo_vehiculo.id_tipo" ;
$respuestaVehiculos = mysqli_query($conn, $vehiculos);

if(mysqli_num_rows($respuestaVehiculos)==1)
    {
        $row = mysqli_fetch_array($respuestaVehiculos);
        $id_auto = $_POST['id_vehiculo'];
        $nombre_auto = $_POST['nombre'];
    }



?>

<?php 
include("header.php")
?>








 <section class="contenedorFormulario">
 <h5>Solicitud de Reserva: </h5>
    <div class="">
        <div class="">
        <div class="container p-4">
    <div class="row">
        <div class="col-md-6">
        <!-- contenido de la columna 4 formulario -->
        
        <!-- alert conf -->
       
       
         <div class="car card-body">
         <form action="GuardaSolicitud.php" method="POST">
                
                <br>
                
                <div class="form-group">
                    <label for="">NIT: </label>
                    <input type="text" name="nit" class="form-control" placeholder=" NIT" value="<?php echo $nit ?>">
                    <br>
                    <label for="">Nombre</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="<?php echo $nombreu ?>">
                    <br>
                    <label for="">DPI</label>
                    <input type="text" name="DPI" class="form-control" placeholder=" DPI" value="<?php echo $dpi ?>">
                    <br>
                    <label for="">Correo Electrónico</label>
                    <input type="email" name="email" class="form-control" placeholder="email" value="<?php echo $correo ?>">
                    <br>
                    <label for="">Telefono</label>
                    <input type="number" name="telefono" class="form-control" placeholder="telefono" value="<?php echo $telefono ?>">
                    <br>
                    <label for="">Direccion</label>
                    <input type="direc" name="direccion" class="form-control" placeholder="direccion" value="<?php echo $direccion ?>">
                    <br>
                    <label for="" class="form-control">Observaciones</label>
                   <textarea name="obs" id="obs" class="form-control"></textarea>
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
                    

                </div>
                <br>


            </div>
                <br>
               <button class="btn btn-info" name="guardarSolicitud">Solicitar Renta de Vehiculo</button>
               <button class="btn btn-danger" name="guardar">cancelar Reserva</button>
            </form>

         </div>
        </div>
          
    </div>

 </div>

        </div>
    </div>
 </section>
 
    <?php 
include("footer.php");
?>    