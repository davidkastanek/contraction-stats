<?php

use App\Entities\Contraction;
use Doctrine\ORM\EntityManager;

require __DIR__ . '/../bootstrap.php';

$em = EntityManager::create($conn, $config);
/** @var Contraction $contraction */
$contraction = $em->getRepository(Contraction::class)->find($_GET['id']);
$contraction->setEndTime(new \DateTime());

$em->persist($contraction);
$em->flush();

header("Location: index.php");
exit();
