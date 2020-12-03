<?php

namespace controllers;

use models\UsuarioModel as UsuarioModel;

require_once("../models/UsuarioModel_cliente.php");

class LoginController
{
    public $rut;
   

    public function __construct()
    {
        $this->rut = $_POST['rut'];
       $this ->clave = $_POST['clave'];
       
    }

    public function iniciarSesion()
    {
        session_start();
        if ($this->rut == "" || $this->clave=="") {
            $_SESSION['error'] = "Complete los datos";
            header("Location: ../index.php");
            return;
        }

        $modelo = new UsuarioModel();
        
        $array = $modelo->buscarUsuarioLogin($this->rut, $this->clave);
        
        if (count($array) == 1) {
            $_SESSION['error'] = "rut o clave no se encuentra";
            header("Location: ../index.php");
            return;
        }
            $_SESSION['usuario'] = $array[0];
             header("Location: ../registro_usuario.php");
 
    }
}

$obj = new LoginController();
$obj->iniciarSesion();
