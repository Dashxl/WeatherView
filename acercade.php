<?php
session_start();
$loggedIn = isset($_SESSION['user_name']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acerca de</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .profile-photo {
            border: 5px; /* Color del borde verde para la imagen */
            border-radius: 10px;
            width: 400px;
            height: 400px;
        }
        .social-icons {
            font-size: 35px;
        }
        .social-icons a {
            margin: 0 5px;
            color: #ffffff; /* Color verde para los íconos */
            text-decoration: none;
        }
        .social-icons a:hover {
            color: #eeeeee; /* Cambio de color al pasar el cursor */
        }
        .search-container_2 {
            position: absolute; 
            left: 8%; 
            transform: translateX(-50%);
            display: flex;
            align-items: center;
            gap: 15px;
            z-index: 10;
    }
    </style>
    <!-- Fontawesome -->
<script src="https://kit.fontawesome.com/678a40a4d2.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</head>
<body>
<header>
        <nav>
            <div class="search-container_2">
            <a href="./"><h1>WeatherView</h1></a>
            </div>
                <?php if ($loggedIn): ?>
                    <li><p>Bienvenido, <?= $_SESSION['user_name'] ?> | <a href="logout.php">Cerrar sesión</a></p></li>
                <?php else: ?>
                    <li><a href="google-login.php">Iniciar sesión con Google</a></li>
                <?php endif; ?>
        </nav>
    </header>
    <br>
    <div align="center">
        <h1>Acerca de mí</h1>
    </div>
    <br>
    <div class="container">
        <div align="center">
            <img src="img/foto.jpg" alt="Foto de perfil" class="profile-photo">
        </div>
        <br>
        <div align="center">
            <p style="font-size: 35px;">
              <strong>Sandro Ramirez Carrillo</strong>  
            </p>
            <br>
            <p style="font-size: 20px;">
                Tecnologías de la Información Área Desarrollo de Software Multiplataforma
            </p>
            <p style="font-size: 20px;">
                Universidad Tecnológica de la Costa 
            </p>
            <p style="font-size: 20px;">
                Grupo: TIDSM41
            </p>
            <p style="font-size: 20px;">
                Edad: 22 años
            </p>
        </div>
        <br>
        <div align="center" class="social-icons">
            <a href="https://wa.me/523231025480" target="_blank"><i class="fab fa-whatsapp"></i></a>
            <a href="https://www.instagram.com/dash._.xl/?igsh=MjJ4azRpN3c5Mmhu&utm_source=qr" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://github.com/Dashxl" target="_blank"><i class="fab fa-github"></i></a>
        </div>
    </div>
    <br>
</body>
</html>