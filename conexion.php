<?php 

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'test_countries');

$conn = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if(!$conn) {
    
    die('Imposible Conectarse: ' . mysqli_error($conn));
}

if(@mysqli_connect_errno()) {
    
    die('Conexion Fallo: ' . mysqli_connect_errno() . ': ' . mysqli_connect_error());
}


?>