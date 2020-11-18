<?php

namespace controllers;

use models\UsuarioModel as UsuarioModel;

require_once("../models/UsuarioModel.php");

class LoginController
{
    public $rut;
   

    public function __construct()
    {
        $this->rut = $_POST['rut'];
      
    }

    public function iniciarSesion()
    {
        session_start();
        if ($this->rut == "" ) {
            $_SESSION['error'] = "Complete los datos";
            header("Location: ../inicioSesion_cliente.php");
            return;
        }

        $modelo = new UsuarioModel();
        $array = $modelo->buscarUsuarioLogin($this->rut);
       
        if (count($array) == 1) {
            $_SESSION['error'] = "rut o clave no se encuentra";
            header("Location: ../inicioSesion_cliente.php");
            return;
        }
            $_SESSION['cliente'] = $array[0];
             header("Location: ../registro_cliente.php");

        

        
    }
}

$obj = new LoginController();
$obj->iniciarSesion();
