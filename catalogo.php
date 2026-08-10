<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo Completo - Catálogo Gamer</title>
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body class="catalog-body">

    <!-- Cabecera -->
    <header class="catalog-header">
        <h1 class="catalog-title">Catálogo Gamer / Biblioteca Global</h1>
        <div>
            <span class="user-info">Usuario: <?php echo htmlspecialchars($_SESSION['usuario']); ?></span>
            <a href="logout.php" class="btn-logout">Cerrar Sesión</a>
        </div>
    </header>

    <!-- Barra de Búsqueda -->
    <section class="search-section">
        <input type="text" id="buscador" class="search-input" placeholder="Busca tu juego favorito por nombre o género...">
    </section>

    <!-- Contenedor de las Tarjetas -->
    <main>
        <div id="contenedor-juegos" class="games-grid">
            <!-- Los juegos se cargarán aquí dinámicamente -->
        </div>
    </main>

    <!-- Lógica de la API y Renderizado -->
    <script>
        const urlAPI = 'https://api.allorigins.win/raw?url=' + encodeURIComponent('https://www.freetogame.com/api/games');
        let listaGlobalJuegos = [];

        async function obtenerCatalogoCompleto() {
            const contenedor = document.getElementById('contenedor-juegos');
            contenedor.innerHTML = '<p style="color: #00ff41; grid-column: 1 / -1; text-align: center; font-size: 1.2rem;">CARGANDO BIBLIOTECA DE JUEGOS...</p>';
            
            try {
                const respuesta = await fetch(urlAPI);
                listaGlobalJuegos = await respuesta.json();
                mostrarJuegos(listaGlobalJuegos);
            } catch (error) {
                console.error('Error al conectar con la API:', error);
                contenedor.innerHTML = '<p style="color: #ff0055; grid-column: 1 / -1; text-align: center;">Error al cargar la base de datos de juegos.</p>';
            }
        }

        function mostrarJuegos(juegos) {
            const contenedor = document.getElementById('contenedor-juegos');
            contenedor.innerHTML = '';

            if (juegos.length === 0) {
                contenedor.innerHTML = '<p style="color: #fff; grid-column: 1 / -1; text-align: center;">No se encontraron videojuegos.</p>';
                return;
            }

            juegos.forEach(juego => {
                contenedor.innerHTML += `
                    <div class="game-card">
                        <div>
                            <img src="${juego.thumbnail}" alt="${juego.title}" class="game-img">
                            <h3 class="game-title" title="${juego.title}">${juego.title}</h3>
                            <p class="game-desc">${juego.short_description}</p>
                        </div>
                        <div>
                            <div class="game-footer">
                                <span class="tag-genre">${juego.genre}</span>
                                <span class="tag-price">GRATIS</span>
                            </div>
                            <a href="${juego.game_url}" target="_blank" class="btn-game-link">Ver / Descargar</a>
                        </div>
                    </div>
                `;
            });
        }

        // Buscador en tiempo real
        document.getElementById('buscador').addEventListener('input', (e) => {
            const textoBusqueda = e.target.value.toLowerCase();
            const juegosFiltrados = listaGlobalJuegos.filter(juego => 
                juego.title.toLowerCase().includes(textoBusqueda) || 
                juego.genre.toLowerCase().includes(textoBusqueda)
            );
            mostrarJuegos(juegosFiltrados);
        });

        obtenerCatalogoCompleto();
    </script>
</body>
</html>