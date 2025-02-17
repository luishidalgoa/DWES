<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\CompanyRequest; // Importamos la clase para validar los datos de la solicitud
use App\Http\Controllers\Controller;  // Importamos la clase base del controlador
use App\Http\Resources\CompanyResource; // Importamos el recurso para formatear las respuestas
use App\Models\Company; // Importamos el modelo Company
use Illuminate\Http\Response; // Importamos la clase para manejar respuestas HTTP

class CompanyApiController extends Controller
{
    // Método para obtener la lista de todas las compañías
    public function index()
    {
        // Retornamos una colección de recursos CompanyResource con las compañías y sus profesores relacionados
        return CompanyResource::collection(Company::with('professor')->get());
    }

    // Método para crear una nueva compañía
    public function store(CompanyRequest $request)
    {
        // Creamos una nueva compañía con los datos validados del request
        $company = Company::create($request->validated());
        
        // Retornamos el recurso CompanyResource para la nueva compañía creada
        return new CompanyResource($company);
    }

    // Método para mostrar una compañía específica por su ID
    public function show($id)
    {
        // Buscamos la compañía por su ID, incluyendo la relación con el profesor, o lanzamos un error si no la encontramos
        $company = Company::with('professor')->findOrFail($id);
        
        // Retornamos el recurso CompanyResource con la compañía encontrada
        return new CompanyResource($company);
    }

    // Método para actualizar los datos de una compañía
    public function update(CompanyRequest $request, $id)
    {
        // Buscamos la compañía por su ID o lanzamos un error si no la encontramos
        $company = Company::findOrFail($id);
        
        // Actualizamos la compañía con los datos validados del request
        $company->update($request->validated());
        
        // Retornamos el recurso CompanyResource con los datos de la compañía actualizada
        return new CompanyResource($company);
    }

    // Método para eliminar una compañía
    public function destroy($id)
    {
        // Buscamos la compañía por su ID o lanzamos un error si no la encontramos
        $company = Company::findOrFail($id);
        
        // Eliminamos la compañía
        $company->delete();
        
        // Retornamos una respuesta JSON vacía con el código HTTP 204 (sin contenido)
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
