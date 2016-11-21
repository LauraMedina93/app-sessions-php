<?php
require_once 'lib_sql.php';
session_start();
/**
 * Validate
 */

$validate = array();
if (!isset($_POST['name'],$_POST['password'],$_POST['duplicated_password'])){
    $validate[] = 'Invalidate Input' ;
}elseif(empty($_POST['name'])|| empty($_POST['password'])|| empty($_POST['duplicated_password'])){
    $validate[] = 'Missing Input';
}elseif($_POST['password'] != $_POST['duplicated_password']){
    $validate[] = 'Password does not Match';
}
if(empty($validate)){
    addUser($_POST['name'], $_POST['password']);
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['pass'] = $_POST['password'];
    
    header('Location: todo.php');
}else{
    header('Location: register.php?error='.  implode('|', $validate));
}
?>
