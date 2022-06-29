<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Empleado;
use Illuminate\Support\Facades\Hash;

use \stdClass;

class AuthController extends Controller
{
    //
    public function instert(Request $request){
        $validator = Validator::make($request->all(), [
            'usuario' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'Idtipo' => 'required|string|max:255',
            'Idnumero' => 'required|string|max:255|unique:empleados',
            'fechaNacimiento' => 'required|string|max:255',
            'contraseña' => 'required|string|max:255'
        ]);

        if($validator -> fails()){
            return response()->json($validator->error());
        }

        $empleado = Empleado::create([
            'usuario' => $request->usuario,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'Idtipo' => $request->Idtipo,
            'Idnumero' => $request->Idnumero,
            'fechaNacimiento' => $request->fechaNacimiento,
            'contraseña' => Hash::make($request->password)
        ]);

        $token = $empleado->createToken('auth_token')->plainTextToken;

        return response()->json(['data' => $user, 'access_token' =>$token, 'token_type'=> 'Bearer',]);
    }


}
