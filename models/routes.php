<?php
class Pages
{
  public static function pageRoutes($link)
  {
    switch ($link) {
      case 'login' || 'users' || 'edit' || 'exit':
        $module = 'views/modules/' . $link . '.php';
        break;
      case 'index':
        $module = 'views/modules/login.php';
        break;
      case 'ok':
        $module = 'views/modules/login.php';
        break;
      case 'change':
        $module = 'views/modules/users.php';
        break;
      case 'fail':
        $module = 'views/modules/login.php';
        break;
      default:
        $module = 'views/modules/login.php';
        break;
    }
    return $module;
  }
}
