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
        header('Location: ./detalle.php');
        exit;
    }

    // volvemos a la página de inicio privado
    if (isset($_REQUEST['volver'])) {
        header('Location: inicioPrivado.php');
        exit;
    }
?>
<!DOCTYPE html>
<!--
    Autor: Gonzalo Junquera Lorenzo
    Fecha modificación: 20/11/2025
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
    <style>
        :root {
            --colorFondo1: #ffffff;
            --colorFondo2: #f3f3f3;
            --colorFondo3: #bfc9cd;
            --colorFondo4: black;
        
            --colorBorde: #c5c5c5;
            --radioBorde: 6px;
            --anchoBorde: 1px;
        
            --colorTexto: #000000;
            --tamanoTexto: 16px;
            --fuenteTexto1: Sofia,sans-serif;
            --fuenteTexto2: Arial,sans-serif;

            --anchoArticulo: 18vw;
            --altoArticulo: 26vw;
            --altoSuperpuesto: 20vw;
        }
        *{
            padding: 0;
            margin: 0;
            font-family: var(--fuenteTexto2);
        }

        /* Barra superior*/
        #aviso{
            background-color: var(--colorFondo4);
            color: white;
            text-align: center;
            font-size: 0.7em;
            letter-spacing: 1px;
            padding: 10px;
        }
        nav{
            background-color: var(--colorFondo1);
            border-bottom: var(--colorBorde) solid var(--anchoBorde);
            padding: 15px 18px;
            position: sticky;
            top: 0;
            z-index: 2000;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        /* Cabecera */
        body>header{
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 60vh;
            display: flex;
            flex-direction: row;
            align-items:end;
        }
        h1{
            color: rgba(0, 0, 0, 0.247);
            -webkit-text-stroke: 2px white;
            font-size: 3em;
            text-transform: uppercase;
            margin-left: 5%;
            margin-bottom: 10%;
            width: 13em;
        }
        main>h3{
            text-align: center;
            padding: 1em;
            margin-top: 2em;
        }
        main{
            margin: 20px 20px 20px 20px;
        }
        table{
            border-collapse: collapse;
            width: 100%;
            table-layout: fixed;
            overflow: auto;
        }
        th{
            background-color: gainsboro;
            border: 1px solid black;
            padding: 3px;
        }
        td{
            border: 1px solid black;
            padding: 3px;
            /* word-break: break-all; */
            overflow-wrap: break-word;
        }
        tr td:first-child{
            background-color: #8db7faff;
            font-weight: bold;
        }
        tr td:first-child, th:first-child{width: 30%;}
        tr td:nth-of-type(2), th:nth-of-type(2){width: 69%;}
        h3{
            text-align: center;
            margin: 10px;
        }
        body {
            background-color: white !important; /* Fuerza el fondo a blanco */
            color: black !important; /* Fuerza el texto a negro */
        }
        #phpinfo{
            background-color: white; 
            color: black;
        }
        #phpinfo .v{background-color: white;}
        #phpinfo .e{background-color: #8db7faff;}
    </style>
</head>
<body>
    <div id="aviso">Login Logoff Tema 5</div>
    <nav>
        <a href="../indexLoginLogoffTema5.php"><img src="../webroot/media/images/logo.png" alt="logo"></a>
        <h2>Página de detalle</h2>
        <form action="" method="post">
            <button name="cerrarSesion" class="boton"><span>Cerrar sesión</span></button>
        </form>
    </nav>
    <main>
         <form action="" method="post">
            <button name="volver" class="boton"><span>Volver</span></button>
        </form>
        <?php
       /**
        * @author: Gonzalo Junquera Lorenzo
        * @since: 16/11/2025
        * 0. Mostrar el contenido de las variables superglobales y phpinfo().
        */
        
        //Contenido de la variable $_SESSION-------------------------------------------------------
        echo '<br><br><h3>Contenido de la variable $_SESSION</h3><br>';
        echo '<table >';
        echo '<tr><th>Variable</th><th>Valor</th></tr>';
        if (!empty($_SESSION)) {
            foreach ($_SESSION as $variable => $resultado) {
                echo "<tr>";
                echo '<td>$_SESSION[' . $variable . ']</td>';
                echo "<td><pre>" . print_r($resultado, true) . "</pre></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'><em>La variable \$_SESSION está vacía.</em></td></tr>";
        }
        echo "</table>";

        //Contenido de la variable $_COOKIE---------------------------------------------------
        echo '<br><br><h3>Contenido de la variable $_COOKIE</h3><br>';
        echo '<table >';
        echo '<tr><th>Variable</th><th>Valor</th></tr>';
        if (!empty($_COOKIE)) {
            foreach ($_COOKIE as $variable => $resultado) {
                echo "<tr>";
                echo '<td>$_COOKIE[' . $variable . ']</td>';
                echo "<td><pre>" . $resultado . "</pre></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'><em>La variable \$_COOKIE está vacía.</em></td></tr>";
        }
        echo "</table>";


        //Contenido de la variable $_SERVER-----------------------------------------------
        echo '<h3>Contenido de la variable $_SERVER</h3>';
        echo '<table >';
        echo '<tr><th>Variable</th><th>Valor</th></tr>';
        if (!empty($_SERVER)) {
            foreach ($_SERVER as $variable => $resultado) {
                echo "<tr>";
                echo '<td>$_SERVER[' . $variable . ']</td>';
                echo "<td><pre>" . print_r($resultado, true) . "</pre></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'><em>La variable \$_SERVER está vacía.</em></td></tr>";
        }
        echo "</table>";

        //Contenido de la variable $_ENV -----------------------------------------------
        echo '<h3>Contenido de la variable $_ENV</h3>';
        echo '<table >';
        echo '<tr><th>Variable</th><th>Valor</th></tr>';
        if (!empty($_ENV)) {
            foreach ($_ENV as $variable => $resultado) {
                echo "<tr>";
                echo '<td>$_SERVER[' . $variable . ']</td>';
                echo "<td><pre>" . print_r($resultado, true) . "</pre></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'><em>La variable \$_ENV está vacía.</em></td></tr>";
        }
        echo "</table>";

        //Contenido de la variable $_REQUEST -----------------------------------------------
        echo '<h3>Contenido de la variable $_REQUEST</h3>';
        echo '<table >';
        echo '<tr><th>Variable</th><th>Valor</th></tr>';
        if (!empty($_REQUEST)) {
            foreach ($_REQUEST as $variable => $resultado) {
                echo "<tr>";
                echo '<td>$_SERVER[' . $variable . ']</td>';
                echo "<td><pre>" . print_r($resultado, true) . "</pre></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'><em>La variable \$_REQUEST está vacía.</em></td></tr>";
        }
        echo "</table>";

        //Contenido de la variable $_GET -----------------------------------------------
        echo '<h3>Contenido de la variable $_GET</h3>';
        echo '<table >';
        echo '<tr><th>Variable</th><th>Valor</th></tr>';
        if (!empty($_GET)) {
            foreach ($_GET as $variable => $resultado) {
                echo "<tr>";
                echo '<td>$_SERVER[' . $variable . ']</td>';
                echo "<td><pre>" . print_r($resultado, true) . "</pre></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'><em>La variable \$_GET está vacía.</em></td></tr>";
        }
        echo "</table>";

        //Contenido de la variable $_POST -----------------------------------------------
        echo '<h3>Contenido de la variable $_POST</h3>';
        echo '<table >';
        echo '<tr><th>Variable</th><th>Valor</th></tr>';
        if (!empty($_POST)) {
            foreach ($_POST as $variable => $resultado) {
                echo "<tr>";
                echo '<td>$_SERVER[' . $variable . ']</td>';
                echo "<td><pre>" . print_r($resultado, true) . "</pre></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'><em>La variable \$_POST está vacía.</em></td></tr>";
        }
        echo "</table>";

        //Contenido de la variable $_FILES -----------------------------------------------
        echo '<h3>Contenido de la variable $_FILES</h3>';
        echo '<table >';
        echo '<tr><th>Variable</th><th>Valor</th></tr>';
        if (!empty($_FILES)) {
            foreach ($_FILES as $variable => $resultado) {
                echo "<tr>";
                echo '<td>$_SERVER[' . $variable . ']</td>';
                echo "<td><pre>" . print_r($resultado, true) . "</pre></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'><em>La variable \$_FILES está vacía.</em></td></tr>";
        }
        echo "</table>";

                echo '<div id="phpinfo">'; // Contenedor para phpinfo()
        phpinfo();
        echo '</div>';
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