<!DOCTYPE html>
<html>
<?php session_start();?>
<?php require 'datas.php'?>
<head>
  <meta charset="UTF-8">

  <title>Menú</title>

  <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
  <link rel="stylesheet" href="css/main.css" media="screen" type="text/css" />
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>

<body>
    
<?php if (isset($_SESSION['name'])):?>
<div id="logmsk" style="display: block;">
    
    <div id="userbox">
        <h1 accesskey="index.php" id="signup" class= "title">Bienvenid@: <b><?php echo $_SESSION['name'];?></b> </h1>
        <input id="createCons" class="button" onclick="location.href='todo.php'" value="Hacer una Consulta"/>
        <input id="seeCons" class="button" onclick="location.href='todo.php'" value="Ver mis Consultas"/>
        <input id="tt" class="button" onclick="location.href='#'" value="Trending Topics"/>

        <form action="logout.php" method="POST" id="salir">
            <button class="salida">Salir</button>
        </form>
        
    </div>
</div>
<?php else: ?>
<?php Header('Location: index.php')?>
<?php endif; ?>
</body>

</html>