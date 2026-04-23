
<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$users = file("users.txt");

foreach ($users as $user) {
    list($name, $savedEmail, $savedPass) = explode("|", trim($user));

    if ($email === $savedEmail && password_verify($password, $savedPass)) {
        $_SESSION['user'] = $email;
        header("Location: dashboard.php");
        exit();
    }
}

echo "Datos incorrectos";
?>
