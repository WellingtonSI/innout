<?php

require_once(dirname(__FILE__,2).'/src/config/config.php');
require_once(dirname(__FILE__,2).'/src/models/User.php');

$user = new User(['name'=>'mateus','email'=>'mateus@gmail.com']);

print_r($user->email);
//echo "FIm!";

// $sql = 'select * from users';
// $result = Database::getResultFromQuery($sql);

// while($row = $result->fetch_assoc()){
//     print_r($row);
//     echo '<br>';
// }