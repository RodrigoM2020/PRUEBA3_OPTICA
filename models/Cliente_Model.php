<?php
namespace models;
require_once("Conexion.php");
class Cliente_Model
{
public function insertarCliente($data)
{
    $stm = Conexion::conector()->prepare("INSERT INTO cliente VALUES(:A,:B,:C,:D,:E,:F)");
    $stm->bindParam(":A", $data['rut']);
    $stm->bindParam(":B", $data['nombre']);
    $stm->bindParam(":C", $data['direccion']);
    $stm->bindParam(":D", $data['fono']);
    $stm->bindParam(":E", $data['fecha']);
    $stm->bindParam(":F", $data['email']);
    return $stm->execute();
}



}