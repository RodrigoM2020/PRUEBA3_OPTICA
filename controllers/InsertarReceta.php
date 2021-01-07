<?php

namespace controllers;
require_once("../models/RecetaModel.php");

class InsertarReceta
{
public $rut_cliente;
public $tipo_lente;
public $esfera_oi;
public $esfera_od;
public $tipo_cristal;
public $base;
public $material_cristal;
public $armazon;
public $cilindro_oi;
public $eje_oi;
public $cilindro_od;
public $eje_od;
public $prisma;
public $rut_medico;
public $distancia_pupilar;
public $nombre_medico;
public $fecha_entrega;
public $precio;
public $observacion;

public function __construct()
{
 $this->rut_cliente = $_POST['rut_cliente'];
 $this->tipo_lente = $_POST['tipo_lente'];
 $this->esfera_oi = $_POST['esfera_oi'];
 $this->esfera_od = $_POST['esfera_od'];
 $this->tipo_cristal = $_POST['tipo_cristal'];
 $this->base = $_POST['base'];
 $this->material_cristal = $_POST['material_cristal'];
 $this->armazon = $_POST['armazon'];
 $this->cilindro_oi = $_POST['cilindro_oi'];
 $this->eje_oi = $_POST['eje_oi'];
 $this->cilindro_od = $_POST['cilindro_od'];
 $this->eje_od = $_POST['eje_od'];
 $this->prisma = $_POST['prisma'];
 $this->rut_medico = $_POST['rut_medico'];
 $this->distancia_pupilar= $_POST['distancia_pupilar'];
 $this->nombre_medico = $_POST['nombre_medico'];
 $this->fecha_entrega = $_POST['fecha_entrega'];
 $this->precio = $_POST['precio'];
 $this->observacion = $_POST['observacion'];

 
}public function InsertarReceta(){
    if(count($this->tipo_lente)==0){
        echo "error";
    }else{
        if(count($this->tipo_lente)==1){
            $tipo = $this->tipo_lente[0];
        }else{
            $tipo = $this->tipo_lente[0] . ' - ' . $this->tipo_lente[1];
        }
    }
    

$data=[
'tipo_lente'=>$tipo,
'esfera_oi'=>$this->esfera_oi,
'esfera_od'=>$this->esfera_od,
'cilindro_oi'=>$this->cilindro_oi,
'cilindro_od'=>$this->cilindro_od,
'eje_oi'=>$this->eje_oi,
'eje_od'=>$this->eje_od,
'prisma'=>$this->prisma,
'base'=>$this->base,
'armazon'=>$this->armazon,
'material_cristal'=>$this->material_cristal,
'tipo_cristal'=>$this->tipo_cristal,
'distancia_pupilar'=>$this->distancia_pupilar,
'valor_lente'=>$this->precio,
'fecha_entrega'=>$this->fecha_entrega,
'fecha_retiro'=>'NULL',
'observacion'=>$this->observacion,
'rut_cliente'=>$this->rut_cliente,
'fecha_visita_medico'=>'NULL',
'rut_medico'=>$this->rut_medico,
'nombre_medico'=>$this->nombre_medico,
'rut_usuario'=>$_SESSION['usuario']['rut_usuario'],
'estado'=>'0'
];
print_r($data);
}

}
$obj = new InsertarReceta();
$obj->insertarReceta();