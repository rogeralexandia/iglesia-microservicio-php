<?php

namespace App\Http\Controllers\Api;

use Throwable;
use App\Models\Miembro;
use App\Models\Persona;
use App\Models\Usuario;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    use ApiResponder;

    public function login(Request $request): JsonResponse {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->error(
                "Rellena el email y password",
                false
            );
        }
        $usuario = Usuario::where('email', $request->email)->first();
        if (!$usuario || !Hash::check($request->password, $usuario->password)) {
            return $this->error(
                "Credenciales incorrectas",
                false
            );
        }
        return $this->success(
            "Inicio de sesion correcto",
            $usuario
        );
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
    
        if ($validator->fails()) {
            return $this->error(
                "El formato del registro no es correcto",
                false
            );
        }
    
        $user = new Usuario;
        $user->email = $request->email; 
        $user->name = $request->name; 
        $user->password = Hash::make($request->password); 
        $user->save();
        return $this->success(
            "Inicio de sesion correcto",
            $user
        );
    }
}
