<?php
class Pages
{
  public static function pageRoutes($link)
  {
    switch ($link) {
      case 'login' || 'users' || 'edit' || 'logout' || 'add':
        $module = 'views/modules/' . $link . '.php';
        break;
      case 'index':
        $module = 'views/modules/login.php';
        break;
      case 'change':
        $module = 'views/modules/users.php';
        break;
      default:
        $module = 'views/modules/login.php';
        break;
    }
    return $module;
  }
}
