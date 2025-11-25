<?php
    /**
    * @author: Gonzalo Junquera Lorenzo
    * @since: 24/11/2025
    * Proyecto Login logoff Tema 5.
    */
    if (isset($_REQUEST['iniciarSesion'])) {
        header('Location: codigoPHP/login.php');
        exit;
    }
    if (!isset($_COOKIE['idioma'])) {
        setcookie("idioma", "ES", time()+604.800); // caducidad 1 semana
    }

    if (isset($_REQUEST['idioma'])) {
        setcookie("idioma", $_REQUEST['idioma'], time()+604.800); // caducidad 1 semana
        header('Location: ./indexLoginLogoffTema5.php');
        exit;
    }
?>
<!DOCTYPE html>
<!--
    Autor: Gonzalo Junquera Lorenzo
    Fecha modificación: 24/11/2025
    Descripción: Aplicación Login Logoff Tema 5
-->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="webroot/media/favicon/favicon-32x32.png">
    <link rel="stylesheet" href="webroot/css/fonts.css">
    <link rel="stylesheet" href="webroot/css/estilos.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" type="text/css" rel="stylesheet">
    <title>Gonzalo Junquera Lorenzo</title>
</head>
<body>
    <div id="aviso">Login Logoff Tema 5</div>
    <nav>
        <img src="webroot/media/images/logo.png" alt="logo">
        <h2>Inicio público</h2>
        <form action="" method="post">
            <button name="iniciarSesion" class="boton"><span>Iniciar Sesión</span></button>
            <input type="submit" value="ES" name="idioma" style="background-color:<?php echo $_COOKIE["idioma"]=="ES"? 'red' : 'lightgray'; ?>">
            <input type="submit" value="EN" name="idioma" style="background-color:<?php echo $_COOKIE["idioma"]=="EN"? 'red' : 'lightgray'; ?>"> 
            <input type="submit" value="FR" name="idioma" style="background-color:<?php echo $_COOKIE["idioma"]=="FR"? 'red' : 'lightgray'; ?>">
        </form>
    </nav>
    <main>
        <h1>Bienvenido a la aplicacion</h1>
        <h2>Login Logoff Tema 5</h2>
    </main>
    <footer id="pie">
        <div>
            <a href="https://github.com/GonJunLor/GJLDWESLoginLogoffTema5.git" target="_blank">
                <i class="fa-brands fa-github"></i>
            </a>
        </div>
        2025-26 IES LOS SAUCES. &#169;Todos los derechos reservados. 
        <div>
            <a href="https://gonzalojunlor.ieslossauces.es/" target="_blank">
            <address style="display: inline;">Gonzalo Junquera Lorenzo</address>
            </a>
            <time datetime="2025-11-20">20-11-2025.</time>
            <a href="https://mogutable.com/" id="webImitada" target="_blank">Web imitada</a>
        </div>
    </footer>
</body>
</html>