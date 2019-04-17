<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\EntityManager;

require_once __DIR__ . '/bootstrap.php';

$em = EntityManager::create($conn, $config);

return ConsoleRunner::createHelperSet($em);
