<?php

namespace models;


class Conexion
{
    public static $user = "uvhmgltrwlae54qy";
    public static $pass = "NzhJVHndpsNVjIv1H1qw";
    public static $URL = "mysql:host=b0a2qswlhunlsmmyinig-mysql.services.clever-cloud.com;dbname=b0a2qswlhunlsmmyinig";

    public static function conector()
    {
        try {
            return new \PDO(Conexion::$URL, Conexion::$user, Conexion::$pass);
        } catch (\PDOException $e) {
            return null;
        }
    }
}
