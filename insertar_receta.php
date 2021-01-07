<?php

use models\RecetaModel;

require_once("models/RecetaModel.php");
session_start();

$model = new RecetaModel();

$tipos = $model->getTipos();
$armazon = $model->getArmazones();
$materiales = $model->getMateriales();
$base = ['No Aplica', 'Superior','Inferior', 'Interna','Externa'];
$prisma = ['No Aplica', '1','2', '3','4','5'];
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
   

}?>


    </div>
</div>    


</div>
<form action="controllers/InsertarReceta.php" method="POST">
<input type="hidden" name="rut_cliente" 
    value="<?php if(isset($_SESSION['cliente'])) {
        echo$_SESSION['cliente']['rut_cliente'];
        unset($_SESSION['cliente']);
    }else{
        echo"";
    }
     ?>"/>

<div class="card-panel">

    <div class="row">
        <div class="col l12 m12 s12">
            Tipo de Lentes
            <p>
                <label >
                    <input type="checkbox" name="tipo_lente[]" value="Cerca"/>
                    <span>Cerca</span>
                </label>
                &nbsp;&nbsp;
                <label >
                    <input type="checkbox" name="tipo_lente[]" value="Lejos"/>
                    <span>Lejos</span>
                </label>

            </p>
        </div>
    </div>
    <div class="row">
        <div class="col l3 m3 s12">
            Tipo Cristal
            <select name="tipo_cristal" >
              <?php foreach($tipos as $tipo){ ?>
                <option value="<?=$tipo['id_tipo_cristal']?>"><?=$tipo['tipo_cristal']?></option>
              <?php } ?>
          </select>

             Base
             <select name="base" >
            <?php foreach($base as $b){ ?>
                <option value="<?=$b ?>"><?=$b ?></option>
             <?php } ?>
            </select>
        </div>

        <div class="col l3 m3 s12">
             Material de Cristal
             <select name="material_cristal" >
                 <?php foreach($materiales as $material){ ?>
                   <option value="<?=$material['id_material_cristal']?>"><?=$material['material_cristal']?></option>
                 <?php } ?>
                </select>

            Armazón
             <select name="armazon" >
               <?php foreach($armazones as $armazon){ ?>
                    <option value="<?= $armazon['id_armazon'] ?>"><?= $armazon['nombre_armazon']?></option>
                <?php } ?>
              </select>
        </div>

        <div class="col l3 m3 s12">
            Esfera (Ojo Izquiero)
                    <input type="text" name="esfera_oi" placeholder="+0.25" required>
            Cilindro        
                    <input type="text" name="cilindro_oi" placeholder="+0.25" required>
             Eje      
                    <input type="text" name="eje_oi" placeholder="0-180" required>

        </div>

        <div class="col l3 m3 s12">
        Esfera (Ojo Derecho)
                    <input type="text" name="esfera_od" placeholder="+0.25" required>
            Cilindro        
                    <input type="text" name="cilindro_od" placeholder="+0.25" required>
             Eje      
                    <input type="text" name="eje_od" placeholder="0-180" required>

        </div>
        <div class="card-panel"> 
    <div class="row">
       <div class="col l3 m3 s12">
           Prisma
                <select name="prisma" >
         <?php foreach($prisma as $p){ ?>
                <option value="<?=$p ?>"><?=$p ?></option>
         <?php } ?>
            </select>
            Rut Médico
            <input type="text" name="rut_medico" placeholder="11.111.111-1" required>
       Observación
            <textarea name="observacion"></textarea>
        </div>
        <div class="col l3 m3 s12">
           Distancia Pupilar
                <select name="distancia_pupilar" >
         <?php for($i=40; $i<=75;$i++){ ?>
                <option value="<?=$i ?>"><?=$i ?></option>
         <?php } ?>
            </select>
            Nombre Médico
            <input type="text" name="nombre_medico" placeholder="Nombre Apellido" required>
       
           </div>
          
        <div class="col l3 m3 s12">
            Fecha de Entrega
            <input type="text" name="fecha_entrega"class="datepicker" placeholder="yyyy-mm-dd" required>
        </div>
        <div class="col l3 m3 s12">
       Precio Lente
            <input type="text" name="precio" placeholder="20000" required>
        </div>

    </div>


 </div>

<button class="btn-small right">Guardar</button>

        </div>
    
 

    </form>
               </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
     document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems,{
        format:'yyyy-mm-dd',
        autoClose:true
    });
  });
</script>

</body>
</html>