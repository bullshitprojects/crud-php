<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
  include_once 'header.php'
  ?>
  <title>Logout</title>
</head>

<body>
  <script type="text/javascript">
    $(document).ready(function() {
      Swal.fire({
        title: 'Saliste de la sesión',
        icon: 'warning',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Volver a inicio'
      }).then((result) => {
        if (result.isConfirmed) {
          location.replace('index.php?action=login')
        }
      })
    })
  </script>