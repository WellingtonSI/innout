<?php

date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR','pt_BR.uft-8','portuguese');

//pastas
define('MODEL_PATH', realpath(dirname(__FILE__,2).'/models/'));

//var_dump(dirname(__FILE__));
require_once(realpath(dirname(__FILE__).'/database.php'));