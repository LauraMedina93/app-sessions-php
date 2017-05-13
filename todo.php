<!DOCTYPE html>
<html>
<?php session_start();?>
<?php require 'datas.php'?>
<head>
  <meta charset="UTF-8">

  <title>Consultas</title>

  <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
  <link rel="stylesheet" href="css/main.css" media="screen" type="text/css" />
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>

<body>
    
<?php if (isset($_SESSION['name'])):?>
<div id="logmsk" style="display: block;">
    
    <div id="userbox">
        <h1 accesskey="index.php" id="signup" class= "title">Lista de Consultas: <?php echo $_SESSION['name'];?> </h1>
        <form action="addConsult.php" method="POST" id="form-login">
            <div class="form-group">
              <input id="task" class="inline-input input" name="consult" placeholder="Nueva Consulta">
               <button type="submit" class="inline-button">Agregar consulta</button>
            </div>
        </form>
        <form action="logout.php" method="POST" id="salir">
            <button class="salida">Salir</button>
        </form>
        <ul>
            <?php foreach ($consultas as $nomConsulta ):?>
            <li> <?php echo $nomConsulta['nomConsulta']?> </li>
            <?php endforeach?>
                   
       </ul>
    </div>
</div>
<?php else: ?>
<?php Header('Location: index.php')?>
<?php endif; ?>
</body>

</html>
