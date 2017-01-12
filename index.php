<?php
require_once 'src/bootstrap.php';

use core\Container;
use example\MainController;

$main = Container::shared()->get(MainController::class);
Container::shared()->call([$main, "index"]);
