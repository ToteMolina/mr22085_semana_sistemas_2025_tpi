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
}

?>