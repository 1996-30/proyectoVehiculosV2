<?php 
include("db.php");
session_start();




if(isset($_GET['status'])){
    $id = $_GET['status'];
    $query = "SELECT * FROM status_r WHERE status=$id";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result)==1)
    {
        $row = mysqli_fetch_array($result);
        $nombre =$row['nombre'];
    
        
        
          
      
    }
}

if(isset($_POST['update'])){
    $id = $_GET['status'];
    $nombre = $_POST['nombre'];
    

    $query ="UPDATE status_r SET nombre = '$nombre' WHERE status= $id";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Registro  Actualizado Exitosamente';
     $_SESSION['message_type'] = 'success';
    
     header("Location: formEstatus.php");
       
}

?>


<?php include("header.php")?>

<div class="container p-4 ">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <!-- AQUI VA EL CARD -->
            <div class="car card-body">
            <form action="updateEstatus.php?status=<?php echo $_GET['status'] ;  ?>" method="POST">
                <div class="form-group">
                    <input type="text" name="nombre" class="form-control" placeholder="Actualizar Estatus" value="<?php echo $nombre ?>">
                </div>
                
               <button class="btn btn-success" name="update">Actualizar</button>
            </form>

         </div>
        </div>
        </div>
    </div>
