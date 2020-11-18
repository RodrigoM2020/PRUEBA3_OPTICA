<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body class="fondo2">

    <div class="container">
        <div class="row">

            <div class="col l4 m4 s12 red">

            </div>
            <div class="col l4 m4 s12 center">
                <img class="img_1"  width="100" src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/1200px-User_icon_2.svg.png" alt="">
                <h3 class="center h3-c">Acceso Usuarios</h3>
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

                <form action="controllers/LoginController_cliente.php" method="POST">
                    <div class="input-field">
                        <input id="rut" type="text" name="rut">
                        <label  for="rut">RUT</label>
                    </div>
                   
                    <button class="btn ancho-100">Iniciar Sesión</button>

                    <p class="center">
                        <a href="optica_menu.php">Volver al Menú</a>
                    </p>

                </form>
            </div>

        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>

</html>