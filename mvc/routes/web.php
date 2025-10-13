<?php

use app\controllers\HomeController;
use lib\Route;

Route::get("/", [HomeController::class, "index"]);

Route::get("/formulario", [HomeController::class, "mostrarFormulario"]);
Route::post("/save", [HomeController::class, "recibirFormulario"]);
Route::get("/buscarId/:id", [HomeController::class, "buscarId"]);

Route::dispatch();

?>