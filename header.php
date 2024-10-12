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
  <a href="home.php " class=navbar-brand>Sistema de Reservas de Automoviles </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">

<!-- Botton 1 -->
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

<!-- Botton 2 -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Clientes
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="formClientes.php">Ingreso Clientes</a></li>
          </ul>
        </li>
        
<!-- Botton 3 -->
<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Vehiculo
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="formLineas.php">Ingreso Lineas</a></li>
            <li><a class="dropdown-item" href="formMarcas.php">Ingreso Marcas</a></li>
            <li><a class="dropdown-item" href="formModelos.php">Ingreso Modelos</a></li>
            <li><a class="dropdown-item" href="formTiposV.php">Ingreso Tipo Vehiculo</a></li>
          </ul>
        </li>
      </ul>
      <a href="cerrar_sesion.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a>
    </div>
  </div>
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