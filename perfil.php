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
<body>
    <div class="login-container" style="width: 380px;">
        <h2>Perfil del Sistema</h2>
        <div style="background: #000; border: 1px solid #333; padding: 1.2rem; margin-bottom: 1.5rem; text-align: left;">
            <p style="color: #aaa; font-size: 0.85rem; margin-bottom: 0.5rem;">ESTADO: <span style="color: #00ff41;">ONLINE</span></p>
            <p style="color: #fff; font-size: 1rem; margin-bottom: 0.5rem;">Usuario: <span style="color: #00d4ff; font-weight: bold;"><?php echo htmlspecialchars($_SESSION['usuario']); ?></span></p>
            <p style="color: #aaa; font-size: 0.85rem; margin-bottom: 0.5rem;">Rol: <span style="color: #ff0055;">Administrador / Global</span></p>
            <p style="color: #aaa; font-size: 0.85rem; margin-bottom: 0;">Correo: <span style="color: #fff;">admin@catalogogamer.com</span></p>
        </div>

        <div style="background: #000; border: 1px solid #333; padding: 1rem; margin-bottom: 1.5rem; text-align: left;">
            <p style="color: #aaa; font-size: 0.8rem; margin-bottom: 0.3rem;">Estadísticas:</p>
            <p style="color: #fff; font-size: 0.9rem; margin-bottom: 0.2rem;">Juegos favoritos: 12</p>
            <p style="color: #fff; font-size: 0.9rem; margin-bottom: 0;">Acceso activo: 1 sesión</p>
        </div>

        <a href="catalogo.php" class="btn-game-link" style="margin-bottom: 1rem; display: block;">Volver al Catálogo</a>
        <a href="logout.php" class="btn-login" style="display: block; text-decoration: none; text-align: center; box-sizing: border-box;">Cerrar Sesión</a>
    </div>
</body>
</html>