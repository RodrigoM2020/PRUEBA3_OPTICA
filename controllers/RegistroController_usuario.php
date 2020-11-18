<?php

namespace controllers;
use models\UsuarioModel as UsuarioModel;

require_once("../models/UsuarioModel_cliente.php");

class RegistroController_usuario
{
    public $rut;
    public $nombre;
    public $rol;
    public $clave;
    public $estado;
   



    public function __construct()
    {
        $this->rut = $_POST['rut'];
        $this->nombre = $_POST['nombre'];
        $this->rol = $_POST['rol'];
       $this->clave = $_POST['clave'];
       $this->estado = $_POST['estado'];
    }

    public function registrar()
    {
        session_start();
        $this->rol ="vendedor";
        $this->clave ="123456";
        $this->estado ="1";
        if ($this->rut == "" || $this->nombre=="" || $this->rol==""||$this->clave =="" || $this->estado=="" ) {
            $_SESSION['error'] = "Complete los datos";
            header("Location: ../registro_usuario.php");
            return;
        }
       
        $modelo = new UsuarioModel();

        $data = ['rut' => $this->rut,'nombre' => $this->nombre,'rol' => $this->rol,'clave' => $this->clave,'estado' => $this->estado];
        $count = $modelo->insertarUsuario($data);

        if ($count == 0 ) {
                       $_SESSION['error'] = "Hubo un error en la base de datos";
                   }else{
                    $_SESSION['respuesta'] = "Registro guardado....";

                   }
        header("Location: ../registro_usuario.php");
    }
}

$obj = new RegistroController_usuario();
$obj->registrar();
