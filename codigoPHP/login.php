<?php
    /**
    * @author: Gonzalo Junquera Lorenzo
    * @since: 24/11/2025
    * Proyecto Login logoff Tema 5.
    */

    if (isset($_REQUEST['cancelar'])) {
        header('Location: ../indexLoginLogoffTema5.php');
        exit;
    }

    require_once "../core/231018libreriaValidacion.php"; // importamos nuestra libreria
    
    $entradaOK = true; //Variable que nos indica que todo va bien
    $aErrores = [  //Array donde recogemos los mensajes de error
        'nombre' => '', 
        'contrasena'=>''
    ];
    $aRespuestas=[ //Array donde recogeremos la respuestas correctas (si $entradaOK)
        'nombre' => '',  
        'contrasena'=>''
    ]; 
    
    //Para cada campo del formulario: Validar entrada y actuar en consecuencia
    if (isset($_REQUEST["entrar"])) {//Código que se ejecuta cuando se envía el formulario

        // Validamos los datos del formulario
        $aErrores['usuario']= validacionFormularios::comprobarAlfabetico($_REQUEST['usuario'],100,0,1,);
        $aErrores['contrasena'] = validacionFormularios::validarPassword($_REQUEST['contrasena'],20,4,2);
        
        foreach($aErrores as $campo => $valor){
            if(!empty($valor)){ // Comprobar si el valor es válido
                $entradaOK = false;
            } 
        }
        
    } else {//Código que se ejecuta antes de rellenar el formulario
        $entradaOK = false;
    }
    //Tratamiento del formulario
    if($entradaOK){ //Cargar la variable $aRespuestas y tratamiento de datos OK
        if (isset($_REQUEST['entrar'])) {
            header('Location: inicioPrivado.php');
            exit;
        }
        
    } else { //Mostrar el formulario hasta que lo rellenemos correctamente
        //Mostrar formulario
        //Mostrar los datos tecleados correctamente en intentos anteriores
        //Mostrar mensajes de error (si los hay y el formulario no se muestra por primera vez)
?>
<!DOCTYPE html>
<!--
    Autor: Gonzalo Junquera Lorenzo
    Fecha modificación: 20/11/2025
    Descripción: Aplicación Login Logoff Tema 5
-->
<html lang="es">
<body>
    <div id="aviso">Login Logoff Tema 5</div>
    <nav>
        <img src="../webroot/media/images/logo.png" alt="logo">
        <h2>Login</h2>
    </nav>
    <main>
        <h2>INICIO SESIÓN</h2>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post"> 
            <input type="text" id="usuario" name="usuario" value="<?php echo $_REQUEST['usuario']??'' ?>" placeholder="Usuario">
            <br>
            <input type="password" id="contrasena" name="contrasena" value="<?php echo $_REQUEST['contrasena']??'' ?>" placeholder="Contraseña">
            <br>   
            <button name="entrar" class="boton" id="entrar"><span>Entrar</span></button>
            <button name="cancelar" class="boton" id="cancelar"><span>Cancelar</span></button>
            <br>
            <hr>
            <p>¿No tienes cuenta?</p>
            <input type="button" value="Registrarse" name="registrarse" class="boton" id="registrarse">
        </form>
        <?php
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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="webroot/media/favicon/favicon-32x32.png">
    <link rel="stylesheet" href="webroot/css/fonts.css">
    <link rel="stylesheet" href="../webroot/css/estilos.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" type="text/css" rel="stylesheet">
    <title>Gonzalo Junquera Lorenzo</title>
    <style>
        main{
            width:600px;
            height: 500px;
            min-height: 500px;
            margin: auto;
            background-color: #eeeeee;
            /* background-color: #bfc9cd; */
            /* background-color: #fff1de; */
            /* border: 2px solid #fff1de; */
            border-radius: 20px;
            margin-top: 20px;
            padding: 10px;
            margin-bottom: 190px;
        }
        main h2{
            font-family: 'Times New Roman', Times, serif;
            text-align: center;
            margin: 10px;
            font-size: 1.5rem;
            font-weight: bold;
            /* color: #335d7fff; */
        }
        main p{margin:10px 60px;}
        form *{
            margin-top: 10px; 
        }
        .error{
            font-size: 0.75rem;
            margin-left: 30px;
        }
        input{
            padding: 15px 20px;
            margin: 20px 22px;
            font-size: 1.2rem;
            border-radius: 5px;
            font-family: 'Times New Roman', Times, serif;
            border: 2px solid black;
            width: 500px;
            background-color: transparent;
        }
        button, #registrarse{
            padding: 10px 25px;
            font-size: 1.2rem;
            margin: 20px 60px;
            border-radius: 20px;
            background-color: #4988bbff;
            color: white;
            font-family: 'Times New Roman', Times, serif;
            border: 0px solid #252525ff;
        }
        .error{
            font-family: 'Times New Roman', Times, serif;
            color: red;
            font-size: 0.9rem;
        }
        #registrarse{
            width: 200px;
            background-color: #5433eb;
            color: white;
            border-radius: 6px;
            font-weight: bold;
            /* font-family: 'Times New Roman', Times, serif; */
        }
        #usuario, #contrasena{
            background-color: #fff1de;
        }
    </style>
</head>
</html>