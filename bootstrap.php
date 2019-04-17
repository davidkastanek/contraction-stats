<?php

use Doctrine\ORM\Tools\Setup;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use Twig\Extension\DebugExtension;

require_once "vendor/autoload.php";

date_default_timezone_set('Europe/Prague');

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration([__DIR__."/src/Entities"], $isDevMode, null, null, false);

$conn = array(
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . '/db.sqlite',
);

$loader = new FilesystemLoader(__DIR__ . '/src/templates');
$twig = new Environment(
    $loader,
    [
        'debug' => true
    ]
);
$twig->addExtension(new DebugExtension());
