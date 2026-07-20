<?php
// API FreeToGame - Ranking Mundial

$url = "https://www.freetogame.com/api/games?sort-by=popularity";

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => false
]);

$respuesta = curl_exec($curl);

if (curl_errno($curl)) {
    die("Error al conectar con la API: " . curl_error($curl));
}

curl_close($curl);

$juegos = json_decode($respuesta, true);

if (!$juegos) {
    die("No fue posible obtener los datos de la API.");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ranking Mundial de Popularidad</title>

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="css/api-juegos.css">

</head>

<body>

    <main class="container">

        <header class="api-header">

            <h2>RANKING DE POPULARIDAD MUNDIAL</h2>

            <p class="subtitle">
                Los videojuegos gratuitos más populares del momento
            </p>

        </header>

        <div class="games-grid">

            <?php

            $puesto = 1;

            foreach ($juegos as $juego) {

            ?>

                <article class="game-card">

                    <div class="ranking-badge">

                        TOP #<?= $puesto; ?>

                    </div>

                    <img
                        src="<?= htmlspecialchars($juego['thumbnail']); ?>"
                        alt="<?= htmlspecialchars($juego['title']); ?>"
                        class="game-img">

                    <div class="game-info">

                        <h3>

                            <?= htmlspecialchars($juego['title']); ?>

                        </h3>

                        <div class="meta-specs">

                            <p>

                                <i class="fa-solid fa-gamepad"></i>

                                <strong>Género</strong>

                                <span><?= htmlspecialchars($juego['genre']); ?></span>

                            </p>

                            <p>

                                <i class="fa-solid fa-desktop"></i>

                                <strong>Plataforma</strong>

                                <span><?= htmlspecialchars($juego['platform']); ?></span>

                            </p>

                            <p>

                                <i class="fa-solid fa-building"></i>

                                <strong>Distribuidor</strong>

                                <span><?= htmlspecialchars($juego['publisher']); ?></span>

                            </p>

                            <p>

                                <i class="fa-solid fa-calendar-days"></i>

                                <strong>Lanzamiento</strong>

                                <span><?= htmlspecialchars($juego['release_date']); ?></span>

                            </p>

                            <p>

                                <i class="fa-solid fa-fingerprint"></i>

                                <strong>ID</strong>

                                <span>#<?= htmlspecialchars($juego['id']); ?></span>

                            </p>

                        </div>

                        <div class="game-description">

                            <h4>

                                <i class="fa-solid fa-file-lines"></i>

                                Sinopsis

                            </h4>

                            <p>

                                <?= htmlspecialchars($juego['short_description']); ?>

                            </p>

                        </div>

                    </div>

                </article>

            <?php

                $puesto++;
            }

            ?>

        </div>

    </main>

    <script src="js/api-juegos.js"></script>

</body>

</html>