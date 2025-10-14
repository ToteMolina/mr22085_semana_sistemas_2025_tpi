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
}

?>