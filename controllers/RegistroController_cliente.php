<?php

namespace controllers;
use models\Cliente_Model as Cliente_Model;


require_once("../models/Cliente_Model.php");

class RegistroController_cliente
{
    public $rut;
    public $nombre;
    public $direccion;
    public $fono;
    public $fecha;
    public $email;
   
    public function __construct()
    {
        $this->rut = $_POST['rut'];
        $this->nombre = $_POST['nombre'];
        $this->direccion = $_POST['direccion'];
        $this->fono = $_POST['fono'];
        $this->fecha = $_POST['fecha'];
        $this->email = $_POST['email'];
    }

    public function registrar()
    {
        session_start();
        if ($this->rut == "" || $this->nombre=="" || $this->direccion==""||$this->fono =="" || $this->fecha==""||$this->email=="" ) {
            $_SESSION['error'] = "Complete los datos";
            header("Location: ../inicioSesion_cliente.php");
            return;
        }
       
        $modelo = new Cliente_Model();
        $data = ['rut' => $this->rut,'nombre' => $this->nombre,'direccion' => $this->direccion,'fono' => $this->fono,'fecha' => $this->fecha, 'email'=>$this->email];
        $count = $modelo->insertarCliente($data);

        if ($count == 0)
         {          
            $_SESSION['error'] = "Hubo un error en la base de datos";
        }else{
            $_SESSION['respuesta'] = "Registro Guardado";
        }
       $_SESSION['cliente'] = $data[0];
        header("Location: ../registro_cliente.php");
    }
}

$obj = new RegistroController_cliente();
$obj->registrar();
