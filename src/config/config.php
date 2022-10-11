<?php

date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR','pt_BR.uft-8','portuguese');

//pastas
define('MODEL_PATH', realpath(dirname(__FILE__,2).'/models/'));
define('VIEW_PATH', realpath(dirname(__FILE__,2).'/views/'));


//Arquivos
require_once(realpath(dirname(__FILE__).'/database.php'));
require_once(realpath(MODEL_PATH .'/Model.php')); 