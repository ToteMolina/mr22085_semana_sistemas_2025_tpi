<?php

use app\controllers\HomeController;
use lib\Route;

Route::get("/", [HomeController::class, "index"]);

Route::get("/dia1", [HomeController::class, "mostrarDia1"]);
Route::get("/dia2", [HomeController::class, "mostrarDia2"]);
Route::get("/dia3", [HomeController::class, "mostrarDia3"]);
Route::get("/dia4", [HomeController::class, "mostrarDia4"]);
Route::get("/dia5", [HomeController::class, "mostrarDia5"]);

Route::get("/perfil", [HomeController::class, "mostrarPerfil"]);
Route::get("/registrar", [HomeController::class, "mostrarRegistrar"]);
Route::post("/registrar", [HomeController::class, "mostrarRegistrar"]);

Route::dispatch();

?>