<?php
    session_start();
    requireValidSession(true);

$exception = null;
$userData = [];

if(count($_POST) === 0 && isset($_GET['update'])){
    $user = User::getOne((['id' => $_GET['update']]));
    $userData = $user->getValues();
    $userData['password'] = null;
    
} elseif(count($_POST) > 0){
    try{
        $newUser = new User($_POST);
        if($newUser->id){
            $newUser->update();
            addSuccessMsg('Usuário alterado com sucesso!');
            header('Location: users.php');
            exit();
        }else{
            $newUser->insert();
            addSuccessMsg('Usuário cadastrador com sucesso!');
        }
        
        $_POST = [];
    }catch(Exception $e){
        $exception = $e;
    } finally{
        $userData = $_POST;
    }

}
loadTemplateView('save_user', $userData + ['exception' => $exception]);