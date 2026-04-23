<?php
$conn = new mysqli("localhost", "root", "", "login_db");

if ($conn->connect_error) {
    die("Error de conexión");
}
?>
