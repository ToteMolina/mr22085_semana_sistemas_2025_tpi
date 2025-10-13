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
        $stmt->bindParam(3, $data["edad"]);
        $stmt->bindParam(3, $data["direccion"]);

        if ($stmt->execute()){
            return true;
        } else {
            return false;
        }
        
    }

   public function getPersonaID($idPersona)
    {
        $conexion = $this->getConnection();
        $sql = $conexion->query("SELECT * FROM tbl_personas WHERE id_persona=$idPersona");
        return $sql->fetchAll();
    }

    
}

?>