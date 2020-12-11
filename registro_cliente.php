<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RegistroClientes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="fondo3">
    <div class="container">
        <div class="row">
            <div class="col l4 m4 s12">

            </div>
            <div class="col l4 m8 s12 center">
                <img width="50" src="https://aseisdedos.com/wp-content/uploads/2020/01/Tipos-de-clientes.png" alt="">
                <h5 class="center h3-c">Registro Clientes</h5>
               
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

                <form action="controllers/RegistroController_cliente.php" method="POST">
                    <div class="input-field">
                        <input id="rut" type="text" name="rut">
                        <label for="rut">RUT</label>
                    </div>
                    <div class="input-field">
                        <input id="nombre" type="text" name="nombre">
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="input-field">
                        <input id="direccion" type="text" name="direccion">
                        <label for="direccion">Dirección</label>
                    </div>
                    <div class="input-field">
                        <input id="fono" type="text" name="fono">
                        <label for="fono">Teléfono</label>
                    </div>
                    <div class="input-field">
                        <input id="fecha" type="date" name="fecha">
                        <label for="fecha">Fecha</label>
                    </div>
                    <div class="input-field">
                        <input id="email" type="text" name="email">
                        <label for="email">E-Mail</label>
                    </div>

                    <button class="btn pink ancho-100">Registrar Cuenta</button>
                    <p class="center ">
                        <a href="SubMenu_usuario.php">Volver al Menu Clientes</a>
                    </p>
                </form>

            </div>
        </div>

    </div>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      
    <script>
       document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.datepicker');
        var instances = M.Datepicker.init(elems, {
            autoclose:true,
            format : 'dd-mm-yyy',
            i18n: {
                months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic"],
                weekdays: ["Domingo","Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
                weekdaysShort: ["Dom","Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                weekdaysAbbrev: ["D","L", "M", "M", "J", "V", "S"]
            }
        });
       });
      </script>
</body>

</html>