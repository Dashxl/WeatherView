<?php
session_start();
$loggedIn = isset($_SESSION['user_name']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeatherView</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
</head>
<body>
    <header>
        <nav>
            <div class="search-container">
                <a href="./"><h1>WeatherView</h1></a>
                <input
                    type="text"
                    id="search-input"
                    placeholder="Buscar lugar..."
                    class="search-bar"
                />
                <button id="search-button" class="search-button">Buscar</button>
            </div>
            <ul class="nav-links">
                <li><a href="acercade.php">Acerca de</a></li>
                <?php if ($loggedIn): ?>
                    <li><p>Bienvenido, <?= $_SESSION['user_name'] ?> | <a href="logout.php">Cerrar sesión</a></p></li>
                <?php else: ?>
                    <li><a href="google-login.php">Iniciar sesión con Google</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <br>
    <br>
    <div class="container_2">
        <div id="map"></div>
        <div id="weather-info">
            <h2>Información del Clima</h2>
            <img id="weather-icon" class="weather-icon" src="" alt="Icono del clima" style="display: none;">
            <div class="weather-data">
                <p id="location"></p>
                <p id="temperature"></p>
                <p id="description"></p>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="script.js"></script>
</body>
</html>
