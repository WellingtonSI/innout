<?php

date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR','pt_BR.uft-8','portuguese');

//pastas
define('MODEL_PATH', realpath(dirname(__FILE__,2).'/models/'));
define('VIEW_PATH', realpath(dirname(__FILE__,2).'/views/'));
define('TEMPLATE_PATH', realpath(dirname(__FILE__,2).'/views/template'));
define('CONTROLLER_PATH', realpath(dirname(__FILE__,2).'/controllers/'));
define('EXCEPTION_PATH', realpath(dirname(__FILE__,2).'/exceptions/'));



//Arquivos
require_once(realpath(dirname(__FILE__).'/database.php'));
require_once(realpath(dirname(__FILE__).'/loader.php'));
require_once(realpath(MODEL_PATH .'/Model.php')); 
require_once(realpath(EXCEPTION_PATH .'/AppException.php')); 
require_once(realpath(EXCEPTION_PATH .'/ValidationException.php')); 
