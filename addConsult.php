<?php

require_once 'lib_sql.php';
session_start();

if (isset($_POST['consult']) && !empty($_POST['consult'])){
	addConsult($_SESSION['id'], $_POST['consult']);
    $_SESSION['consult'] = $_POST['consult'];
    Header('Location: todo.php');
}
 else {
    header('Location: todo.php?error="invalid consult"');
}

