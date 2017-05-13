 <?php
function connect (){
    $connect = mysqli_connect('localhost','root','','consultas-bd');
    if ($connect){
        return $connect;
    }else{
        throw new Exception($message);
    }
}

function getUser ($name){
    try {
        $link = connect();
        $result = mysqli_query($link, 'SELECT * FROM usuarios AS u WHERE u.nomUsuario ="' . $name . '"');
        return mysqli_fetch_assoc($result);
    } catch (Exception $exc) {
        syslog(LOG_CRIT, $exc->getMessage());
        return $exc;
    }
    
}

function getConsult($idUsuario){
    $link = connect();
    $result = mysqli_query($link, 'SELECT * FROM consultas  WHERE idUsuario = "'. $idUsuario .'"' );
    return $result;
}

function addConsult ($idUser, $name){
    $usuario = getUser($idUser);
    $link = connect();
    echo 'INSERT INTO consultas (idUsuario, nomConsulta) VALUES ("'.$idUser.'","'.$name.'")';
    $result = mysqli_query($link, 'INSERT INTO consultas (idUsuario, nomConsulta) VALUES ("'.$idUser.'","'.$name.'")');
    return $result;
}

function addUser ($name,$pass){
    $link = connect();
    $pass = md5($pass);
    $result = mysqli_query($link, 'INSERT INTO usuarios (nomUsuario, password) VALUES ("'.$name.'","'.$pass.'") ');
}
