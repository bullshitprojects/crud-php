<?php
session_start();
if (!$_SESSION['validate']) {
  header('location:index.php?action=login');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php
  include 'header.php';
  ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar</title>
</head>

<body>

  <main class="container">
    <h1 class="my-5 text-center">Nuevo Usuario</h1>
    <div class="row justify-content-center">
      <div class="col-6">
        <form action="" method="POST">
          <div class="mb-3">
            <label for="username">Nombre</label>
            <input type="text" class='form-control' name='name' required>
          </div>
          <div class="mb-3">
            <label for="username">Apellido</label>
            <input type="text" class='form-control' name='lastname' required>
          </div>
          <div class="mb-3">
            <label for="username">Ciudad</label>
            <input type="text" class='form-control' name='city' required>
          </div>
          <div class="mb-3">
            <label for="username">Fecha de Inscripci&oacute;n</label>
            <input type="text" class='form-control' name='inscription_date' required>
          </div>
          <div class="mb-3">
            <label for="username">Email</label>
            <input type="email" class='form-control' name='email' required>
          </div>
          <?php
          $newUser = new AppController();
          $newUser->newUser();
          ?>
          <a href="index.php?action=users" class="link-primary">Regresar</a>
          <input type="submit" value="Agregar Usuario" class="btn btn-primary mx-4">
        </form>
      </div>
    </div>
  </main>