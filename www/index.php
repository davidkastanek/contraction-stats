<?php

use Doctrine\ORM\EntityManager;
use App\Entities\Contraction;

require __DIR__ . '/../bootstrap.php';

$em = EntityManager::create($conn, $config);

/** @var Contraction[] $contractionsData */
$contractionsData = $em->getRepository(Contraction::class)->findBy([], ['startTime' => 'DESC']);
$contractions = [];
$lastHourIntervals = [];
$lastHourDurations = [];
foreach ($contractionsData as $key => $contractionData) {
    $intervalSec = isset($contractionsData[$key + 1]) ? $contractionData->getStartTime()->getTimestamp() - $contractionsData[$key + 1]->getEndTime()->getTimestamp() : null;
    $durationSec = $contractionData->getEndTime() ? $contractionData->getEndTime()->getTimestamp() - $contractionData->getStartTime()->getTimestamp() : null;
    $contraction = [
        'start' => $contractionData->getStartTime()->format('Y-m-d H:i:s'),
        'end' => $contractionData->getEndTime() ? $contractionData->getEndTime()->format('Y-m-d H:i:s') : null,
        'duration' => $durationSec ? gmdate('i \m\i\n s \s\e\c', $durationSec) : null,
        'interval' => $intervalSec ? gmdate('i \m\i\n s \s\e\c', $intervalSec) : null
    ];
    $contractions[] = $contraction;
    $lastHour = (new \DateTime())->modify('-1 hour');
    if ($contractionData->getStartTime() > $lastHour) {
        $lastHourIntervals[] = $intervalSec;
        $lastHourDurations[] = $durationSec;
    }
}

$contraction = $em->getRepository(Contraction::class)->findOneBy(['endTime' => null]);
$template = $twig->load('index.html');
echo $template->render(
    [
        'contraction' => $contraction,
        'contractions' => $contractions,
        'lastHourIntervalAvg' => gmdate('i \m\i\n s \s\e\c', array_sum($lastHourIntervals) / count($lastHourIntervals)),
        'lastHourDurationAvg' => gmdate('i \m\i\n s \s\e\c', array_sum($lastHourDurations) / count($lastHourDurations))
    ]
);
