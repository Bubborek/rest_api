<?php
define("PROJECT_ROOT_PATH", __DIR__ . "/..");
// Include config file
require_once PROJECT_ROOT_PATH . "/inc/config.php";
// Include model and controller files
require_once PROJECT_ROOT_PATH . "/Model/Database.php";
require_once PROJECT_ROOT_PATH . "/Model/UserModel.php";
require_once PROJECT_ROOT_PATH . "/Controller/Api/BaseController.php";
require_once PROJECT_ROOT_PATH . "/Controller/Api/UserController.php";