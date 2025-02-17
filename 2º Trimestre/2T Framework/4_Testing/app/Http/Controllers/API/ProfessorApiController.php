<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\ProfessorRequest; // Importamos la clase para validar los datos de la solicitud
use App\Http\Controllers\Controller;  // Importamos la clase base del controlador
use App\Http\Resources\ProfessorResource; // Importamos el recurso para formatear las respuestas
use App\Models\Professor; // Importamos el modelo Professor
use Illuminate\Http\Response; // Importamos la clase para manejar respuestas HTTP

class ProfessorApiController extends Controller
{
    // Método para obtener la lista de todos los profesores
    public function index()
    {
        // Retornamos una colección de recursos ProfessorResource con todos los profesores
        return ProfessorResource::collection(Professor::all());
    }
    
    // Método para mostrar un profesor específico por su ID
    public function show($id)
    {
        // Buscamos el profesor por su ID, o lanzamos un error si no lo encontramos
        $professor = Professor::findOrFail($id);
        
        // Retornamos el recurso ProfessorResource con el profesor encontrado
        return new ProfessorResource($professor);
    }

    // Método para actualizar los datos de un profesor
    public function update(ProfessorRequest $request, $id)
    {
        // Buscamos el profesor por su ID o lanzamos un error si no lo encontramos
        $professor = Professor::findOrFail($id);
        
        // Actualizamos los datos del profesor con los datos validados del request
        $professor->update($request->validated());
        
        // Retornamos el recurso ProfessorResource con los datos del profesor actualizado
        return new ProfessorResource($professor);
    }

    // Método para eliminar un profesor
    public function destroy($id)
    {
        // Buscamos el profesor por su ID o lanzamos un error si no lo encontramos
        $professor = Professor::findOrFail($id);
        
        // Eliminamos el profesor
        $professor->delete();
        
        // Retornamos una respuesta JSON vacía con el código HTTP 204 (sin contenido)
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
