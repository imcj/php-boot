<?php
require_once('vendor/autoload.php');

use initialize\Initializer;
use initialize\AOPInitializeCommand;
use initialize\IOCInitializeCommand;

$initializer = new Initializer();

$initializer->addCommand(new AOPInitializeCommand(__DIR__));
$initializer->addCommand(new IOCInitializeCommand(__DIR__));

$initializer->run();

require_once('config/routes.php');