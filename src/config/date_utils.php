<?php
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

function getDateAsDateTime($date){
    return is_string($date) ? new DateTime($date) : $date;
}

function isWeenked($date){
    $inputDate = getDateAsDateTime($date);
    return $inputDate->format('N') >= 6;
}

function isBefore($date1, $date2){
    $inputDate1 = getDateAsDateTime($date1);
    $inputDate2 = getDateAsDateTime($date2);
    return $inputDate1 <= $inputDate2;
}

function getNextDay($date){
    $inputDate = getDateAsDateTime($date);
    $inputDate->modify('+1 day');
    return $inputDate;
}

function sumIntervals($interval1, $interval2){
    $date = new DateTime('00:00:00');
    $date->add($interval1);
    $date->add($interval2);
    return (new DateTime('00:00:00'))->diff($date);
}
function subtractIntervals($interval1, $interval2){
    $date = new DateTime('00:00:00');
    $date->add($interval1);
    $date->sub($interval2);
    return (new DateTime('00:00:00'))->diff($date);
}

function getDateFromInterval($interval){
    return new DateTimeImmutable($interval->format('%H:%i:%s'));
}

function getDateFromString($str){
    return DateTimeImmutable::createFromFormat('H:i:s',$str);
}

function getFirstDayOfMonth($date){
    $dateTime =  getDateAsDateTime($date)->getTimestamp();
    return new DateTime(date('Y-m-1',$dateTime));
}

function getLastDayOfMonth($date){
    $dateTime =  getDateAsDateTime($date)->getTimestamp();
    return new DateTime(date('Y-m-t',$dateTime));
}

function getSecondsFromDateInterval($interval){
    $d1 = new DateTimeImmutable();
    $d2 = $d1->add($interval);

    return $d2->getTimestamp() - $d1->getTimestamp();
}

function isPastWorkDay($date){
    return !isWeenked($date) && isBefore($date , new DateTime());
}

function getTimeStringFromSeconds($seconds){
    $h = intdiv($seconds, 3600);
    $m = intdiv($seconds % 3600, 60);
    $s = $seconds - ($h * 3600) - ($m * 60);
    return sprintf('%02d:%02d:%02d', $h, $m, $s);
}

function formatDateWithLocale($date, $pattern){
    $time = getDateAsDateTime($date)->getTimestamp();
    return strftime($pattern,$time);
}