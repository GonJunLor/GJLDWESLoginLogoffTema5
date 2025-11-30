<?php
    /**
    * @author: Gonzalo Junquera Lorenzo
    * @since: 24/11/2025
    * Proyecto Login logoff Tema 5.
    */

    session_start();

    $textoBotonIniciarSesion = 'Iniciar Sesión';
    
    // comprobamos que existe la sesion para este usuario para cambiar el texto del boton de iniciar sesión
    if (isset($_SESSION["usuarioDAW205AppLoginLogoffTema5"])) {
        $textoBotonIniciarSesion = 'Hola '.$_SESSION["usuarioDAW205AppLoginLogoffTema5"]['CodUsuario'];

        // si está la sesión iniciada redirigimos directamente al inicio privado
        if (isset($_REQUEST['iniciarSesion'])) {
            header('Location: codigoPHP/inicioPrivado.php');
            exit;
        }
    }

    // Redireccion a página login al dar al botón de iniciar sesión
    if (isset($_REQUEST['iniciarSesion'])) {
        header('Location: codigoPHP/login.php');
        exit;
    }

    // comprubea si existe una cookie de idioma y si no existe la crea en español
    if (!isset($_COOKIE['idioma'])) {
        setcookie("idioma", "ES", time()+604.800); // caducidad 1 semana
        header('Location: ./indexLoginLogoffTema5.php');
        exit;
    }

    // comprueba si se ha pulsado cualquier botón de idioma y pone en la cookie su valor para establecer el idioma
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
        <a href="./indexLoginLogoffTema5.php"><img src="webroot/media/images/logo.png" alt="logo"></a>
        <h2>Inicio público</h2>
        <form action="" method="post">
            <button type="submit" name="idioma" value="ES" id="ES" 
            style="background-color:<?php echo $_COOKIE["idioma"]=="ES"? '#c2bcb9' : 'white';?>">
                <img src="webroot/media/images/banderaEs.png" alt="es">
            </button>
            <button type="submit" name="idioma" value="EN" id="EN"
            style="background-color:<?php echo $_COOKIE["idioma"]=="EN"? '#c2bcb9' : 'white';?>">
                <img src="webroot/media/images/banderaGb.png" alt="en">
            </button>
            <button type="submit" name="idioma" value="FR" id="FR"
            style="background-color:<?php echo $_COOKIE["idioma"]=="FR"? '#c2bcb9' : 'white';?>">
                <img src="webroot/media/images/banderaFr.png" alt="fr">
            </button>
        </form>
        <form action="" method="post">
            <button name="iniciarSesion" class="boton"><span><?php echo $textoBotonIniciarSesion; ?></span></button>
        </form>
    </nav>
    <main>
        <img src="webroot/media/images/arbol.png" alt="arbol de aplicación">
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