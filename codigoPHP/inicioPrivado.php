<?php
    /**
    * @author: Gonzalo Junquera Lorenzo
    * @since: 24/11/2025
    * Proyecto Login logoff Tema 5.
    */
    session_start();
    
    // comprobamos que existe la sesion para este usuario, sino redirige al login
    if (!isset($_SESSION["usuarioDAW205AppLoginLogoffTema5"])) {
        header("location: login.php"); 
        exit;
    }

    // Volvemos al índice general destruyendo la sesión
    if (isset($_REQUEST['cerrarSesion'])) {
        // Destruye la sesión
        session_destroy();
        header('Location: ../indexLoginLogoffTema5.php');
        exit;
    }

    // comprueba si existe una cookie de idioma y si no existe la crea en español
    if (!isset($_COOKIE['idioma'])) {
        setcookie("idioma", "ES", time()+604.800); // caducidad 1 semana
        header('Location: ./inicioPrivado.php');
        exit;
    }

    // vamos a la página detalle
    if (isset($_REQUEST['detalle'])) {
        header('Location: detalle.php');
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
    <link rel="icon" type="image/png" href="../webroot/media/images/logo.png">
    <link rel="stylesheet" href="webroot/css/fonts.css">
    <link rel="stylesheet" href="../webroot/css/estilos.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" type="text/css" rel="stylesheet">
    <title>Gonzalo Junquera Lorenzo</title>
</head>
<body>
    <div id="aviso">Login Logoff Tema 5</div>
    <nav>
        <a href="../indexLoginLogoffTema5.php"><img src="../webroot/media/images/logo.png" alt="logo"></a>
        <h2>Inicio privado</h2>
        <form action="" method="post">
            <button name="cerrarSesion" class="boton"><span>Cerrar sesión</span></button>
        </form>
    </nav>
    <main>
         <form action="" method="post">
            <button name="detalle" class="boton"><span>Detalle</span></button>
        </form>
        <?php
            
            $aUsuarioEnCurso = $_SESSION['usuarioDAW205AppLoginLogoffTema5'];
            $fechaUltimaConexion = new DateTime($aUsuarioEnCurso['FechaHoraUltimaConexionAnterior']);

            if ($_COOKIE["idioma"]=="ES") {
                setlocale(LC_TIME, 'es_ES.utf8');

                echo '<h2>Bienvenido '.$aUsuarioEnCurso['DescUsuario'].'.</h2>';
                echo '<h2>Esta el la '.$aUsuarioEnCurso['NumConexiones'].' vez que se conecta.</h2>';
                if (($aUsuarioEnCurso['NumConexiones'])>1) {
                    echo '<h2>Usted se conectó por última vez el '.strftime("%d de %B de %Y a las %H:%M:%S", $fechaUltimaConexion->getTimestamp()).'.</h2>';
                }
                
            }
            if ($_COOKIE["idioma"]=="EN") {
                setlocale(LC_TIME, 'en_GB.utf8');

                echo '<h2>Welcome '.$aUsuarioEnCurso['DescUsuario'].'.</h2>';
                echo '<h2>This is the '.$aUsuarioEnCurso['NumConexiones'].' time you have connected.</h2>';
                if (($aUsuarioEnCurso['NumConexiones'])>1) {
                    echo '<h2>You were last connected on '.strftime("%d de %B de %Y a las %H:%M:%S", $fechaUltimaConexion->getTimestamp()).'.</h2>';
                }
            }
            if ($_COOKIE["idioma"]=="FR") {
                setlocale(LC_TIME, 'fr_FR.UTF-8');

                echo '<h2>Bienvenue '.$aUsuarioEnCurso['DescUsuario'].'.</h2>';
                echo '<h2>Voici votre '.$aUsuarioEnCurso['NumConexiones'].' e connexion.</h2>';
                if (($aUsuarioEnCurso['NumConexiones'])>1) {
                    echo '<h2>Votre dernière connexion remonte au '.strftime("%d de %B de %Y a las %H:%M:%S", $fechaUltimaConexion->getTimestamp()).'.</h2>';
                }
            }
            
        ?>
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