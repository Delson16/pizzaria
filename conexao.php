<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mariopizza";

if($conn = new mysqli($servername, $username, $password, $dbname)){
    // echo "Conexão realizada com sucesso!";
}else{
    echo "Falha ao se conectar";
}