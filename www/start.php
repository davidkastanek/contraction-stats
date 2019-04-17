<?php

use App\Entities\Contraction;
use Doctrine\ORM\EntityManager;

require __DIR__ . '/../bootstrap.php';

$contraction = new Contraction();
$contraction->setStartTime(new \DateTime());

$em = EntityManager::create($conn, $config);
$em->persist($contraction);
$em->flush();

header("Location: index.php");
exit();
