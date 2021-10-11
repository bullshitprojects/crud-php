<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
  include 'header.php';
  ?>
  <title>Principal</title>
</head>

<body>
  <style>
    .box {
      max-height: 500px;
      width: 100%;
      overflow-x: hidden;
      overflow-y: auto;
    }
  </style>
  <main class="container my-5">
    <div class="row">
      <h1 class="text-center">Usuarios Registrados</h1>
    </div>

    <div class="row">
      <div class="mt-5 mb-3">
        <a href="views/modules/report.php" target="_blank" class="link-primary">Imprimir Reporte</a>
        <a href="index.php?action=add" class="mx-4 link-success">Nuevo usuario</a>
        <a class="my-5 link-warning" href="index.php?action=logout">Cerrar Sesión</a>
      </div>
      <table class="table table-hover my-2 shadow box">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Ciudad</th>
            <th>Fecha de Inscripci&oacute;n</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $userView = new AppController();
          $userView->viewUsers();
          $userView->deleteUser();
          ?>
        </tbody>
      </table>
    </div>
    <div class="row my-5">
      <h1 class="text-center">Buscar Usuario</h1>
    </div>
    <div class="row mt-5">
      <div class="col-4">
        <form action="" method="POST">
          <div class="input-group ">
            <input type="text" class="form-control" placeholder="Ingresa un apellido" name="lastnameSearch" required>
            <input type="submit" value="Buscar" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>

    <div class="row">
      <table class="table table-hover my-5 shadow">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Ciudad</th>
            <th>Fecha de Inscripci&oacute;n</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $userSearch = new AppController();
          $userSearch->searchUser();
          ?>
        </tbody>
      </table>
    </div>
  </main>