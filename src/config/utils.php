<?php

function addSuccessMsg($msg){
    $_SESSION['message'] = [
        'type' => 'sucess',
        'message' => $msg
    ];
}

function addErrorMsg($msg){
    $_SESSION['message'] = [
        'type' => 'error',
        'message' => $msg
    ];
}
