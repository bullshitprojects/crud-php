<?php
class AppController
{
  public function page()
  {
    include 'views/main.php';
  }

  public function linkPages()
  {
    if (isset($_GET['action'])) {
      $link = $_GET['action'];
    } else {
      $link = 'login';
    }

    $response = Pages::pageRoutes($link);

    include $response;
  }

  public function newUser()
  {
    if (isset($_POST['newUser'])) {
      $controllerData = array('name' => $_POST['name'], 'lastname' => $_POST['lastname'], 'city' => $_POST['city'], 'inscription_date' => $_POST['inscription_date'], 'email' => $_POST['email']);
      $response = Data::newUser($controllerData);

      if ($response === 1) {
        header('location:index.php?action=ok');
      } else {
        header('lcation:login.php');
      }
    }
  }

  public function login()
  {
    if (isset($_POST['login'])) {
      $controllerData = array('username' => $_POST['username'], 'password' => $_POST['password']);
      $response = Data::login($controllerData);

      if ($response['username'] === $_POST['username'] && $response['password'] === $_POST['password']) {
        @session_start();

        $_SESSION['validate'] = true;
        header('location:index.php?action=users');
      } else {
        header('location:index.php?action=fail');
      }
    }
  }

  public function viewUsers()
  {
    $response = Data::viewUsers();

    foreach ($response as $row => $item) {
      echo '
        <tr>
          <td>', $item['id'], '</td>
          <td>', $item['name'], '</td>
          <td>', $item['lastname'], '</td>
          <td>', $item['city'], '</td>
          <td>', $item['inscription_date'], '</td>
          <td>', $item['email'], '</td>
          <td><a class="link-primary" href="index.php?action=edit&id=', $item['id'], '">Editar</a></td>
          <td><a class="link-danger" onclick="javascript:return confirm("Seguro que desea eliminar este usuario?");" href="index.php?action=users&idDelete=', $item['id'], '">Eliminar</a></td>
        </tr>
      ';
    }
  }

  public function deleteUser()
  {
    if (isset($_GET['idDelete'])) {
      $id = $_GET['idDelete'];
      $response = Data::deleteUser($id);
      if ($response === 1) {
        header('location:index.php?action=users');
      }
    }
  }

  public function editUser()
  {
    $id = $_GET['id'];
    $response = Data::getUserById($id);

    echo '
      <input type="hidden" value="', $response['id'], '" name="idEdit" />
      <div class="form-group">
        <label for="nameEdit">Nombre</label>
        <input type="text" name="nameEdit" value="', $response['name'], '" class="form-control"  required />
      </div>
      <div class="form-group">
        <label for="lastnameEdit">Apellido</label>
        <input type="text" name="lastnameEdit" value="', $response['lastname'], '" class="form-control"  required />
      </div>
      <div class="form-group">
        <label for="cityEdit">Nombre</label>
        <input type="text" name="cityEdit" value="', $response['city'], '" class="form-control"  required />
      </div>
      <div class="form-group">
        <label for="inscription_dateEdit">Fecha de Inscripción</label>
        <input type="text" name="inscription_dateEdit" value="', $response['inscription_date'], '" class="form-control"  required />
      </div>
      <div class="form-group">
        <label for="emailEdit">Email</label>
        <input type="email" name="emailEdit" value="', $response['email'], '" class="form-control"  required />
      </div>
    ';
  }

  public function updateUser()
  {
    if (isset($_POST['editUser'])) {
      $controllerData = array('id' => $_POST['idEdit'], 'name' => $_POST['nameEdit'], 'lastname' => $_POST['lastnameEdit'], 'city' => $_POST['cityEdit'], 'inscription_date' => $_POST['inscription_dateEdit'], 'email' => $_POST['emailEdit']);
      $response = Data::updateUser($controllerData);

      if ($response === 1) {
        header('location:index.php?action=change');
      } else {
        echo '
        <script type=\'text/javascript\'>
        $(document).ready(function(){
          Swal.fire({
            icon: \'error\',
            title: \'Ocurrió un error al intentar actualizar al usuario\',
            showConfirmButton: false,
            timer: 1500
          })
        });
        </script>
        ';
      }
    }
  }

  public function searchUser()
  {
    if ($_POST['searchUser']) {
      $lastname = $_POST['lastnameSearch'];

      $response = Data::searchUser($lastname);

      foreach ($response as $row => $item) {
        echo '
          <tr>
            <td>', $item['id'], '</td>
            <td>', $item['name'], '</td>
            <td>', $item['lastname'], '</td>
            <td>', $item['city'], '</td>
            <td>', $item['inscription_date'], '</td>
            <td>', $item['email'], '</td>
          </tr>
        ';
      }
    }
  }
}
