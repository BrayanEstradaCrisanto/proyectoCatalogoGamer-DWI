<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = 'admin';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="css/perfil.css">
</head>
<body class="profile-body">
    <div class="profile-container">
        <h2 class="profile-title">Perfil del Sistema</h2>
        
        <div class="info-card">
            <p class="info-row">ESTADO: <span class="val-online">ONLINE</span></p>
            <p class="info-row">Usuario: <span class="val-user"><?php echo htmlspecialchars($_SESSION['usuario']); ?></span></p>
            <p class="info-row">Rol: <span class="val-role">Administrador / Global</span></p>
            <p class="info-row">Correo: <span class="val-text">admin@catalogogamer.com</span></p>
        </div>

        <div class="info-card">
            <p class="label-title">Estadísticas:</p>
            <p class="info-row">Juegos favoritos: <span class="val-text">12</span></p>
            <p class="info-row">Acceso activo: <span class="val-text">1 sesión</span></p>
        </div>

        <a href="catalogo.php" class="btn-profile btn-catalog">Volver al Catálogo</a>
        <a href="logout.php" class="btn-profile btn-logout-profile">Cerrar Sesión</a>
    </div>
</body>
</html>