<?php
namespace models;
require_once("Conexion.php");
class UsuarioModel
{
public function insertarUsuarioVendedor($data)
{
    $stm = Conexion::conector()->prepare("INSERT INTO usuario VALUES(:A,:B,:C,:D,:E)");
    $stm->bindParam(":A", $data['rut']);
    $stm->bindParam(":B", $data['nombre']);
    $stm->bindParam(":C", $data['rol']);
    $stm->bindParam(":D", md5($data['clave']));
    $stm->bindParam(":E", $data['estado']);
   
    return $stm->execute();
}

public function buscarVendedor($rut, $clave)
{
    $stm = Conexion::conector()->prepare("SELECT * FROM usuario WHERE rut=:A AND clave=:B");
    $stm->bindParam(":A", $rut);
    $stm->bindParam(":B",md5($clave));
   $stm->execute();
    return $stm->fetchAll(\PDO::FETCH_ASSOC);
}
public function listarUsuarios()
{
    $stm = Conexion::conector()->prepare("SELECT * FROM usuario");
    $stm->execute();
    return $stm->fetchAll(\PDO::FETCH_ASSOC);
}



}