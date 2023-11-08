<?php

namespace App\Http\Controllers\Api;

use stdClass;
use App\Models\User;
use Aws\S3\S3Client;
use App\Models\Photo;
use App\Models\Persona;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Laravel\Sanctum\Sanctum;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Aws\Rekognition\RekognitionClient;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Validation\ValidationException;
use Aws\TranscribeService\TranscribeServiceClient;

class AuthController extends Controller
{
    use ApiResponder;

    /**
     * @throws ValidationException
     */
    public function obtenerPersonas(): JsonResponse {
       
        $personas = Persona::select(["id", "nombre", "apellido"])
            ->get();
        return $this->success(
            "Listado de personas",
            $personas
        );
    }

}
