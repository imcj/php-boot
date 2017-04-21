<?php
require_once('vendor/autoload.php');

use initialize\Initializer;
use initialize\AOPInitializeCommand;
use initialize\IOCInitializeCommand;
use initialize\PHPEnvCommand;

$initializer = new Initializer();

$initializer->addCommand(new AOPInitializeCommand(__DIR__));
$initializer->addCommand(new IOCInitializeCommand(__DIR__));
$initializer->addCommand(new PHPEnvCommand(__DIR__));

$initializer->run();

use Illuminate\Config\Repository;

$config = new Repository();

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
// Create a simple "default" Doctrine ORM configuration for Annotations
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . "/org/"), true);
$conn = array(
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . '/db.sqlite',
);
// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);

// require_once('config/routes.php');