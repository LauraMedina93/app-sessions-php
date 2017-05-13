<?php
session_start();
require_once 'lib_sql.php';

if(isset($_POST['name']) && isset($_POST['password']) && (!empty($_POST['name']) && !empty($_POST['password']))) {
  $user = getUser($_POST['name']);
  $password = getUser ($_POST['password']);
  if(!is_null($user)&& $user['password'] == md5($_POST['password'])){
        $_SESSION['name'] = $user['nomUsuario'];
        $_SESSION['id']   = $user['id'] ;

        Header('Location: todo.php');
        }elseif (is_null($user) || (is_null($password))) {
            Header('Location: index.php?error= Los datos ingresados no son correctos');
        }        
      
      }else {
        Header('Location: index.php?error= Falta completar un campo');
      }


