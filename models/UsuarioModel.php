<?php
namespace models;
require_once("Conexion.php");
class UsuarioModel
{
public function insertarUsuario($data)
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

public function buscarUsuarioLogin($rut)
{
    $stm = Conexion::conector()->prepare("SELECT * FROM cliente WHERE rut=:A");
    $stm->bindParam(":A", $rut);
    $stm->execute();
    return $stm->fetchAll(\PDO::FETCH_ASSOC);
}

}