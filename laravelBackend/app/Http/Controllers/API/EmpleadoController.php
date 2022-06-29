<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empleado;
Use Log;

class EmpleadoController extends Controller
{
    // Consultar todos los empleados
    public function getAll(){
        $data = Empleado::get();
        return response()->json($data, 200);
    }

    // Create Empleado
    public function create(Request $request){
      
        $data['usuario'] = $request['usuario'];
        $data['nombre'] = $request['nombre'];
        $data['apellido'] = $request['apellido'];
        $data['Idtipo'] = $request['Idtipo'];
        $data['Idnumero'] = $request['Idnumero'];
        $data['fechaNacimiento'] = $request['fechaNacimiento'];
        $data['contraseña'] = $request['contraseña'];

        Empleado::create($data);

        return response()->json([
            'message'=> "succesfully created",
            'success' => true
        ], 200);

    }

    // borrar empleado
    public function delete($id){
        $res = Empleado::find($id)->delete();
        return response()->json([
            'message'=> "succesfully deleted",
            'success' => true
        ], 200);
    }

    // Consultar empleado
    public function get($id){
        $data = Empleado::find($id);
        return response()->json($data, 200);
    }

    // Actualizar usuario
    public function update(Request $request, $id){
        $data['usuario'] = $request['usuario'];
        $data['nombre'] = $request['nombre'];
        $data['apellido'] = $request['apellido'];
        $data['Idtipo'] = $request['Idtipo'];
        $data['Idnumero'] = $request['Idnumero'];
        $data['fechaNacimiento'] = $request['fechaNacimiento'];
        $data['contraseña'] = $request['contraseña'];

        Empleado::find($id)->update($data);

        return response()->json([
            'message'=> "succesfully updated",
            'success' => true
        ], 200);
    }
}
