<?php

namespace controllers;

use models\RecetaModel as RecetaModel;

require_once("../models/RecetaModel.php");

class BuscarRecetaRut
{
    public $rut;

    public function __construct()
    {
        $this->rut = $_POST['rut'];
    }

    public function buscarRecetaRut()
    {

         session_start();
        if ($this->rut == ""  ) {
            $_SESSION['error_buscar'] = "Complete los datos";
            header("Location: ../registro_cliente.php");
            return;
        }
        $modelo = new RecetaModel();
        $arr = $modelo->buscarRecetaXRut($this->rut);
        
        if (count($arr) == 0) {
            $_SESSION['error_buscar'] = "rut o clave no se encuentra";
            header("Location: ../registro_cliente.php");
            return;
        }else{
            $_SESSION['receta_rut'] = $arr[0];
            header("Location: ../receta.php");

        }
           
           }
    }


$obj = new BuscarRecetaRut();
$obj->buscarRecetaRut();
