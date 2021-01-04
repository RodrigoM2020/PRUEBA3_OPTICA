<?php

namespace controllers;

use models\UsuarioModel as UsuarioModel;

require_once("../models/UsuarioModel.php");

class LoginController
{
    public $rut;
    public $clave;
   

    public function __construct()
    {
        $this->rut = $_POST['rut'];
        $this->clave = $_POST['clave'];
    }

    public function iniciarSesion()
    {
        session_start();
        $modelo= new UsuarioModel();
         $array = $modelo->buscarVendedor($this->rut, $this->clave);
         
         if ($this->rut == "" || $this->clave=="" ) {
            $_SESSION['error'] = "Complete los datos";
            header("Location: ../inicio_sesion_admin.php");
            return;
        }
        if (count($array) == 0) {
            $_SESSION['error'] = "rut o clave no se encuentra";
            header("Location: ../inicio_sesion_admin.php");
            return;
        }else{
            $_SESSION['usuario'] = $array[0];
            header("Location: ../SubMenu_usuario.php");
        }
            
 
    }

       
}


$obj = new LoginController();
$obj->iniciarSesion();
