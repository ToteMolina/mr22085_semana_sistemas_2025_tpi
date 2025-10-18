<?php

namespace app\controllers;
use app\models\Persona_model;
use lib\controller;

class HomeController extends controller {
    public function index(){
        $persona = new Persona_model();
        $data = $persona->getPersona();
        return $this->view("HomeView", [
            'title'=>'Ejemplo de vista',
            'mensaje'=>'Hola mundo desde el parametro',
            'dataPersona'=> $data
        ]);
    }

    public function mostrarDia1(){
        return $this->view("Dia1View");
    }
    public function mostrarDia2(){
        return $this->view("Dia2View");
    }
    public function mostrarDia3(){
        return $this->view("Dia3View");
    }
    public function mostrarDia4(){
        return $this->view("Dia4View");
    }
    public function mostrarDia5(){
        return $this->view("Dia5View");
    }
    public function mostrarPerfil(){
        return $this->view("PerfilView");
    }
    public function mostrarRegistrar(){
        $mensaje = '';
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $personaModel = new Persona_model();
            $data = [
                "nombre" => $_POST['nombre'] ?? '',
                "apellido" => $_POST['apellido'] ?? '',
                "due" => $_POST['due'] ?? '',
                "edad" => $_POST['edad'] ?? '',
                "direccion" => $_POST['direccion'] ?? '',
            ];

            // Validar si ya existe
            if ($personaModel->existePersona($data['nombre'], $data['apellido'], $data['due'])) {
                $mensaje = "¡La persona ya está registrada!";
            } else {
                if ($personaModel->guardarPerona($data)) {
                    $mensaje = "¡Persona registrada correctamente!";
                } else {
                    $mensaje = "Error al registrar la persona";
                }
            }
        }

        return $this->view("RegistrarView", ['mensaje' => $mensaje]);
    }
}

?>