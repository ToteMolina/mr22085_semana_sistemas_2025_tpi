<?php

use app\controllers\HomeController;
use lib\Route;

Route::get("/", [HomeController::class, "index"]);

Route::get("/dia1", [HomeController::class, "index"]);
Route::get("/dia2", [HomeController::class, "index"]);
Route::get("/dia3", [HomeController::class, "index"]);
Route::get("/dia4", [HomeController::class, "index"]);
Route::get("/dia5", [HomeController::class, "index"]);

/* Route::get("/formulario", [HomeController::class, "mostrarFormulario"]);
Route::post("/save", [HomeController::class, "recibirFormulario"]);
Route::get("/buscarId/:id", [HomeController::class, "buscarId"]); */

Route::dispatch();

?>