<?php
if(!isset($_SESSION)){
   session_start(); 
}
require 'lib_sql.php';

$consultas = array();
if ($_SESSION['id']){
   $consultas = getConsult($_SESSION['id']);
}

