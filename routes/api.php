<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\PhotoController;
use App\Http\Controllers\Api\MiembroController;
use App\Http\Controllers\Api\UsuarioController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('miembro')->group(function () {
    Route::get("/listar", [MiembroController::class, "listar"]);
    Route::post("/registrar", [MiembroController::class, "registrar"]);
    Route::get("/obtener/{id}", [MiembroController::class, "obtener"]);
    Route::put("/editar/{id}", [MiembroController::class, "editar"]);
    Route::delete("/eliminar/{id}", [MiembroController::class, "eliminar"]);
});

Route::post("/login", [UsuarioController::class, "login"]);
Route::post("/usuario/register", [UsuarioController::class, "register"]);