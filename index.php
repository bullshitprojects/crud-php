<?php
require_once 'models/routes.php';
require_once 'controllers/AppController.php';
require_once 'models/crud.php';

$pages = new AppController();
$pages->page();
