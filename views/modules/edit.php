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
    <h1 class="my-5 text-center">Modificar Usuario</h1>
    <div class="row justify-content-center">
      <div class="col-6">
        <form action="" method="POST">
          <?php
          $editUser = new AppController();
          $editUser->editUser();
          $editUser->updateUser();
          ?>
          <a href="index.php?action=users" class="link-primary">Regresar</a>
          <input type="submit" value="Guardar" class="btn btn-primary mx-4">
        </form>
      </div>
    </div>
  </main>