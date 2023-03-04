<?php

//loadModel('WorkingHours');

$wh = WorkingHours::loadFromUserAndDate(1, date('Y-m-d'));
$workedtInterval = $wh->getWorkedInterval()->format('%H:%I:%S');
print_r($workedtInterval);
echo '</br>';

$lunchIntervalString = $wh->getLunchInterval()->format('%H:%I:%S');
print_r($lunchIntervalString);
echo '</br>';

print_r($wh->getExitTime());