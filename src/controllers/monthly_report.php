<?php
session_start();
requireValidSession();

$currentDate = new DateTime();

$user = $_SESSION['user'];
$selectedUserId = $user->id;
$users = null;
if($user->is_admin){
    $users = User::get();
    $selectedUserId = $_POST['user'] ? $_POST['user'] : $user->id;
}

$selectedPeriod = $_POST['period'] ? $_POST['period'] : $currentDate->format('Y-m');
$periods = [];
for($yearDiff = 0; $yearDiff <= 2; $yearDiff++) {
     $year = date('Y')  - $yearDiff;
    for($month = 12; $month >= 1; $month--) {
        $date = new DateTime ("{$year}-{$month}-1");
        $periods[$date->format('Y-m')] = strftime('%B de %Y', $date->getTimestamp());

    }
}

$selectPeriod = $_POST['period'] ? $_POST['period'] : $currentDate->format('Y-m');

$registries =  WorkingHours::getMonthlyReport($selectedUserId, $selectedPeriod);

$report = [];
$workday = 0;
$sumOfWorkedTime = 0;
$lastDay = getLastDayOfMonth($selectPeriod)->format('d');

for($day =1 ; $day <= $lastDay ; $day++){
    $date = $selectPeriod . '-' . sprintf('%02d', $day);
    $registry = $registries[$date];

    if(isPastWorkDay($date)) $workday++;

    if( $registry) {
        $sumOfWorkedTime += $registry->worked_time;
        array_push($report, $registry);
    }else{
        array_push($report, new WorkingHours([
            'work_date' => $date,
            'worked_time' => 0
        ]));
    }

}
$expecteTime = $workday * DAILY_TIME;
$balance = getTimeStringFromSeconds($sumOfWorkedTime - $expecteTime);
$sign = ($sumOfWorkedTime > $expecteTime) ? '+'  : '-';

loadTemplateView('monthly_report',[
    'report'=> $report,
    'sumOfWorkedTime' => getTimeStringFromSeconds($sumOfWorkedTime),
    'balance' => "{$sign}{$balance}",
    'selectedPeriod' => $selectedPeriod,
    'selectedUserId' => $selectedUserId,
    'periods' => $periods,
    'users' => $users,
]);


    