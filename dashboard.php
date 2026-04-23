<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.html");
    exit();
}
?>

<h1>Bienvenido <?php echo $_SESSION['user']; ?></h1>

<a href="logout.php">Cerrar sesión</a>
