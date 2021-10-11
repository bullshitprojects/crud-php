<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
  include 'header.php';
  ?>
  <title>Login</title>
</head>

<body>
  <main class="my-5 container">
    <div class="row justify-content-center">
      <div class="col-5">
        <div class="card shadow my-5 p-4">
          <h1 class="my-5 text-center">Inicia Sesión</h1>
          <form action="" method="POST">
            <div class="mb-3">
              <label for="username">Usuario</label>
              <input type="text" class='form-control' name='username' required>
            </div>
            <div class="mb-3">
              <label for="password">Contrase&ntilde;a</label>
              <input type="password" class="form-control" name="password" required>
            </div>
            <div class="d-flex my-5 justify-content-center">
              <input type="submit" name="submit" class="btn btn-primary" value="Iniciar Sesión">
            </div>
          </form>
        </div>
      </div>
    </div>

  </main>

  <?php
  $ingreso = new AppController();
  $ingreso->login();
  ?>