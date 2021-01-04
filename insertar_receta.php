<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">
 
    <title>Document</title>

</head>
<body>
    <div class="container">
        <div class="card-panel">
            <div class="row">
             <div class="col l4 m4 s12 ">

    <form action="controllers/BuscarClienteRut.php" method="POST">
          <input type="text" 
          name="rut" 
          placeholder="Rut Cliente"
          value="<?= isset($_SESSION['cliente']) ? $_SESSION['cliente']['rut_cliente']: '' ?>"
          
          />
        <button class="btn-small">Buscar</button>
    </form>
    

    </div>
    <div class="col l8 m8 s12 ">
        <?php if (isset($_SESSION['error'])){ ?>
    <p>
         <?=$_SESSION['error']?>

    </p>
    <?php
        unset($_SESSION['error']);

}
?>

<?php if(isset($_SESSION['cliente'])){ ?>
    <div class="collection">
        <a href="#!" class="collection-item">
            Nombre:
        <?=$_SESSION['cliente']['nombre_cliente']?>
    </a>
   
        <a href="#!" class="collection-item">
            Teléfono
        <?=$_SESSION['cliente']['telefono_cliente']?>
    </a>
          </div>

    <?php
    unset($_SESSION['cliente']);

}?>


    </div>
</div>    
        </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>
</html>