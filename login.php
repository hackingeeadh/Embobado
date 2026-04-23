<?php
session_start();
include "db.php";

$email = $_POST['email'];
$password = $_POST['password'];

// buscar usuario
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // verificar contraseña encriptada
    if (password_verify($password, $user['password'])) {

        // guardar sesión
        $_SESSION['user'] = $user['email'];

        header("Location: dashboard.php");
    } else {
        echo "Contraseña incorrecta";
    }

} else {
    echo "Usuario no encontrado";
}
?>
