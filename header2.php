<?php

  $id = $_SESSION['id_usuario'] ;
  $nombreu = $_SESSION['usuario'];
  $tipo_user = $_SESSION['id_rol'] ;

  $nombreu = mb_convert_case($nombreu, MB_CASE_UPPER, "UTF-8");


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Final</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
  <a href="lista_vehiculosc.php " class=navbar-brand>Autos</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">

<!-- Botton 1 -->
<?php if ($tipo_user == 1){?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Usuarios
          </a>
          <ul class="dropdown-menu">
      
            <li><a class="dropdown-item" href="create_usuarios.php">Ingreso Usuarios</a></li>
            <li><a class="dropdown-item" href="control_usuarios.php">Lista Usuarios</a></li>
            <li><a class="dropdown-item" href="create_roles.php">Ingreso Roles</a></li>
            <li><a class="dropdown-item" href="control_roles.php">Lista Roles</a></li>
          </ul>
      
        </li>
        <?php }?>
<!-- Botton 2 -->
<?php if ($tipo_user == 1 || $tipo_user == 2)  {?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Autorizacion Solicitudes de Renta
          </a>
          <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="control_solicitudes.php">Autorizar Renta Vehiculos</a></li>
          <li><a class="dropdown-item" href="formEstatus.php">Catalogo Estatus Renta</a></li>
            
          </ul>
        </li>
        <?php }?>
<!-- Botton 3 -->
<?php if ($tipo_user == 1){?>
<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Vehiculo
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="lista_vehiculos.php">Ingreso Vehiculos</a></li>
            <li><a class="dropdown-item" href="formLineas.php">Ingreso Lineas</a></li>
            <li><a class="dropdown-item" href="formMarcas.php">Ingreso Marcas</a></li>
            <li><a class="dropdown-item" href="formModelos.php">Ingreso Modelos</a></li>
            <li><a class="dropdown-item" href="formTiposV.php">Ingreso Tipo Vehiculo</a></li>
            <?php if ($tipo_user == 1 || $tipo_user == 2 || $tipo_user == 3 ){?>
            <li><a class="dropdown-item" href="lista_vehiculosc.php">Consulta de Vehiculos</a></li>
            <?php }?>
          </ul>
        </li>
        <?php }?>
        <!-- Botton 4 -->
      
<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Solicitudes Renta Vehiculos
          </a>
          <ul class="dropdown-menu">
          <?php if ($tipo_user == 1 || $tipo_user == 2 || $tipo_user == 3 ){?>
            <li><a class="dropdown-item" href="formRentas.php">Ingreso Solicitud</a></li>
            <li><a class="dropdown-item" href="control_solicitudesUs.php">Imprimir Solicitud </a></li>

            <?php }?> 
            <?php if ($tipo_user == 1 || $tipo_user == 2){?>
            <li><a class="dropdown-item" href="control_solicitudes.php">Autorizar Renta Vehiculo</a></li>
            <li><a class="dropdown-item" href="formEstatus.php">Catalogo Estatus Renta</a></li>
            <?php }?> 
           
          </ul>
        </li>
      </ul>
    </div>
  </div>

  <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo "!Bienvenido!  " . $nombreu; ?><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php">Home</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="salir.php">Cerrar Sesion</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
</nav>

<!-- 
    <nav class="navbar navbar-dark  bg-dark">
        <div class="container">
              <a href="home.php " class=navbar-brand>Sistema de Reservas de Automoviles </a>
        </div>
    </nav>
 -->
</body>
</html>