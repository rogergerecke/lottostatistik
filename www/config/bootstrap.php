<?php
// bootstrap.php
require_once "../vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array("/path/to/entity-files");
$isDevMode = false;

// the connection configuration

$yaml_config_file = "../../docker-compose.yml";

if(file_exists($yaml_config_file)){
    $yaml = yaml_parse_file($yaml_config_file);

    print_r($yaml);
}

$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'foo',
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);
