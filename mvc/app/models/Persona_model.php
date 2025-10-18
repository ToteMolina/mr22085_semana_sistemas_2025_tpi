<?php

namespace app\models;

use lib\database;

class Persona_model extends database
{
    public function getPersona()
    {
        $conexion = $this->getConnection();
        $sql = $conexion->query("SELECT * FROM tbl_personas");
        return $sql->fetchAll();
    }

    public function guardarPerona($data)
    {
        $conexion = $this->getConnection();
        $stmt = $conexion->prepare("INSERT INTO tbl_personas(nombre, apellido, due, edad, direccion) 
                                VALUES(?, ?, ?, ?, ?)");

        $stmt->bindParam(1, $data["nombre"]);
        $stmt->bindParam(2, $data["apellido"]);
        $stmt->bindParam(3, $data["due"]);
        $stmt->bindParam(4, $data["edad"]);
        $stmt->bindParam(5, $data["direccion"]);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function existePersona($nombre, $apellido, $due) {
        $conexion = $this->getConnection();
        $stmt = $conexion->prepare("SELECT COUNT(*) FROM tbl_personas WHERE nombre=? AND apellido=? AND due=?");
        $stmt->execute([$nombre, $apellido, $due]);
        return $stmt->fetchColumn() > 0;
    }

}

?>