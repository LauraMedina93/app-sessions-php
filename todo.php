<!DOCTYPE html>
<html>
<?php session_start();?>
<?php require 'search.php'?>
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
  <div id="logmsk" style="display: block;">
    <?php if (isset($_SESSION['name'])):?>
   
    <!--NEW-->
    <div class="tweet">
    <h1 accesskey="index.php" id="signup" class= "title">Nueva Consulta</h1>
      <form id="form-login" action="" method="GET">
        <button type="submit" class="searchTweet"><span class="assistive-text">Buscar</span></button>
        <input type="text" id="q" name="q" value="<?php echo @$_GET['q'] ?>" placeholder="Introduce una Búsqueda" required>
      </form>
      <?php if(isset($results)): ?>
        <div class="tweets">
          <?php if(count($results->statuses)): ?>
           
            <?php foreach ($results->statuses as $tweet): ?>
              <div class="content-tweet">
               <ul>
                <div class="tweet-user">
                 <li>
                  <img class="tweet-user-image" src="<?php echo $tweet->user->profile_image_url ?>" alt="@<?php echo $tweet->user->screen_name ?>">
                  <a class="tweet-user-link" href="http://twitter.com/<?php echo $tweet->user->screen_name ?>" title="@<?php echo $tweet->user->screen_name ?>"><?php echo $tweet->user->name ?></a>
                </div>
                <p class="tweet-text"><?php echo tweet_text($tweet->text); ?></p>
                </div>
                </li>
              
            <?php endforeach; ?>
            </ul>
          <?php else: ?>
            <div class="error-message">No se ha encontrado ningún tweet</div>
          <?php endif; ?>
        </div>
      <?php endif; ?>
        <form action="logout.php" method="POST" id="salir">
            <button class="salida">Salir</button>
        </form>
        <input class="button" id="back" onclick="location.href='menu.php'" value="Volver"/>
    </div>
    
     </div>
<?php else: ?>
<?php Header('Location: index.php')?>
<?php endif; ?>
</body>

</html>
