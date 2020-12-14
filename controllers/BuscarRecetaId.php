<?php

namespace controllers;

use models\RecetaModel as RecetaModel;

require_once("../models/RecetaModel.php");

class BuscarRecetaId
{
    public $id;

    public function __construct()
    {
        $this->rut = $_POST['id'];
    }

    public function buscarRecetaId()
    {

         session_start();
        if ($this->id == ""  ) {
            $_SESSION['error_buscarId'] = "Complete los datos";
            header("Location: ../inicioSesion_cliente.php");
            return;
        }
        $modelo = new RecetaModel();
        $arr = $modelo->buscarRecetaXID($this->id);
        
        if (count($arr) == 0) {
            $_SESSION['error_buscarId'] = "rut o clave no se encuentra";
            header("Location: ../inicio_Sesion_cliente.php");
            return;
        }else{
            $_SESSION['receta_id'] = $arr[0];
            header("Location: ../receta.php");

        }
           
           }
    }


$obj = new BuscarRecetaRut();
$obj->buscarRecetaRut();
