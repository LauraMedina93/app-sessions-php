 <?php
function connect (){
    $connect = mysqli_connect('localhost','root','','consultas');
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
function getConsult($nomUsuario){
    $usuario = getUser($nomUsuario);
    $link = connect();
    $result = mysqli_query($link, 'SELECT * FROM consultas WHERE idUsuario ='. $usuario['id'] );
    return ($result);
}

function addConsult ($idUsuario, $name){
    $link = connect();
    $result = mysqli_query($link, 'INSERT INTO consultas (idUsuario, nomConsulta) VALUES ("'.$idUsuario.'","'.$name.'")');
    return $result;
}
function addUser ($name,$pass){
    $link = connect();
    $pass = md5($pass);
    $result = mysqli_query($link, 'INSERT INTO usuarios (nomUsuario, password) VALUES ("'.$name.'","'.$pass.'") ');
}
    ?>