<?php
namespace controllers;

use models\Cliente_Model as Cliente_Model;

require_once("../models/Cliente_Model.php");

class BuscarClienteRut{
    public $rut;

public function __construct()
{
$this->rut = $_POST['rut'];
}

 public function buscar(){
     session_start();
    $model = new Cliente_Model();
    $arr = $model->buscarClienteXRut($this->rut);

    if(count($arr)==0){
        $_SESSION['error']="Rut no existe";
        header("Location: ../insertar_receta.php");
        return;
    }
    $_SESSION['cliente'] = $arr[0];
    header("Location: ../insertar_receta.php");
 }

}

$obj = new BuscarClienteRut();
$obj ->buscar();

