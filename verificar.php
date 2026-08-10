<?php
// Credenciales fijas
$usuario_permitido = "admin";
$password_permitido = "1234";

// Recibimos los datos del form
$usuario = $_POST['usuario'];
$password = $_POST['password'];

// Validamos
if ($usuario === $usuario_permitido && $password === $password_permitido) {
    // Si es correcto, iniciamos sesión y redirigimos
    session_start();
    $_SESSION['usuario'] = $usuario;
    header("Location: index.html");
    exit();
} else {
    // Si falla, volvemos al login con un mensaje (puedes añadir un parámetro GET para el error)
    header("Location: index.php?error=1");
    exit();
}
?>