<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Óptica 2020</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body class="fondo3">

    <div class="container">
        <div class="row">

             <div class="col l4 m4 s12 red">

              </div>
            <div class="col l4 m4 s12 center">
                <img class="img_1"  width="100" src="https://www.aquaser.com.ar/sistema/img/lock_user.png" alt="">
                <h3 class="center h3-c">Acceso Administrador</h3>
                <h5 class="center h3-c">Optica Central</h5>


                 <p class="red-text">
                    <?php
                    session_start();
                    if (isset($_SESSION['error'])) {
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }

                    ?>
                  </p>

                 <form action="controllers/LoginController-admin.php" method="POST">
                    <div class="input-field">
                        <input id="rut" type="text" name="rut">
                        <label  for="rut">RUT</label>
                    </div>
                    <div class="input-field">
                        <input id="clave" type="text" name="clave">
                        <label for="clave">CLAVE</label>
                    </div>
                    <button class="btn ancho-100">Iniciar Sesión</button>
                    <p class="center">
                        <a href="index.php">Volver al Menú</a>
                    </p>
                 
                    <p>
                    <?php
                    //session_start();
                    if(isset($_SESSION['respuesta'])){
                        echo $_SESSION['respuesta'];
                        unset ($_SESSION['respuesta']);

                    }
                      ?>             
                 </p>

                   

                    </form>

            </div>

        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>

</html>