<?php

use models\UsuarioModel as UsuarioModel;

require_once("models/UsuarioModel_cliente.php");

$modelo =new UsuarioModel();
$vendedor = $modelo->listarTareas();?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Usuario</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="fondo2">
    <div class="container">
        <div class="row">
           <div class="col l4 m6 s12 center" >
                <img width="80" src="https://previews.123rf.com/images/stodolskaya/stodolskaya1511/stodolskaya151100027/49219342-iniciar-sesi%C3%B3n-de-usuario-o-el-icono-de-autenticaci%C3%B3n-de-acceso.jpg" alt="">
                <h4 class="center h3-c">Registro Usuario</h4>
                <h6 class="center h3-c">Óptica Central</h6>

                <p class="red-text">
                    <?php
                    session_start();
                    if (isset($_SESSION['error'])) {
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    ?>
                </p>

                <p class="green-text">
                    <?php
                    //session_start();
                    if (isset($_SESSION['respuesta'])) {
                        echo $_SESSION['respuesta'];
                        unset($_SESSION['respuesta']);
                    }
                    ?>
                </p>



                <form action="controllers/RegistroController_usuario.php" method="POST">
                    <div class="input-field">
                        <input id="rut" type="text" name="rut">
                        <label for="rut">RUT</label>
                    </div>
                    <div class="input-field">
                        <input id="nombre" type="text" name="nombre">
                        <label for="nombre">Nombre</label>
                    </div>
                    <button class="btn pink ancho-100">Registrar Cuenta</button>
                    <p class="center">
                        <a href="index.php">Volver</a>
                    </p>       
                </form> 
                                    
                    
                    
                <div>
                   <div class="col l8 m6 s12">
                    <table>
                        <tr>
                            <th> RUT </th>
                            <th> NOMBRE </th>
                            <th> ESTADO </th>
                        </tr>
                          <?php foreach($vendedor as $ve){  ?>
                          <tr>
                            <td> <?= $ve["rut"] ?></td>
                            <td> <?= $ve["nombre"]?></td>
                            <td> <?= $ve["estado"] ?></td>
                          </tr
                          
                            <?php } ?>
                          </table>
                    </div>
                </div>
               

            </div>
        </div>

    </div>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      
    
</body>

</html>