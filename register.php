<!DOCTYPE html>
<html>
<?php session_start()?>
<head>

  <meta charset="UTF-8">

  <title>Registrarse</title>

  <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
  <link rel="stylesheet" href="css/main.css" media="screen" type="text/css" />
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>

<body>
    
<?php if (!isset($_SESSION['name']) || !isset($_SESSION['pass'])):?>
<div id="logmsk" style="display: block;">
    <div id="userbox">
        <?php if (isset($_GET['error'])):?>
        <p id="paragraph"> Error: <?php echo ($_GET['error'])?>!</p>
        <?php endif?>
        <h1 id="signup" class= "title">Registrarse</h1>
        <form action="signup.php" method="POST" id="form-login">
            <input id="name" name="name" class="input" placeholder="Usuario">
            <input id="pass" name="password" class="input" type="password" placeholder="Password">
            <input id="pass" name="duplicated_password" class="input" type="password" placeholder=" Confirm Password">
            <input type="submit" id="signupb" class="button" value="Confirmar"/>
        </form>

        <input id="redirect" class="button" onclick="location.href='index.php'" value="Log In"/>
    </div>
    <script src="js/index.js"></script>
</div>
<?php else: ?>
<?php Header('Location: todo.php');?>
<?php endif; ?>
    
</body>
</html>