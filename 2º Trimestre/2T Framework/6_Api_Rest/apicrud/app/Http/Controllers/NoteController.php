<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE App\Models\Note;
use App\Http\Request\NoteRequest;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\NoteResource;
use Illuminate\Http\Resources\Json\JsonResource;

class NoteController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index(): JsonResource {
        $notes = Note::all();
        //ahora ya no devolvemos una vista (retun view) si no que directamente enviamos esos datos mediante un formato de API RESTFUL con JSON
        //return response()->json($notes, 200 ); V1
        /*  JSON Le devolvemos:
            //datos
            //mensaje de estado, 200 = todo OK
            //valor de cabecera (opcional)
        */
        return NoteResource::collection(Note::all());
    }

    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request): JsonResponse {
        Note::create($request->all()); 
        return response()->json([
            'success' => true  
        ],201); // El estado 201 corresponde a la creación correcta de u nuevo elemento
    }

    /**
    * Display the specified resource.
    */
    public function show(string $id): JsonResponse
    {
        //Busca un elemento con su ID y lo devuelve
        $note= Note::find($id);
        return response()->json($note, 200);
    }

    /**
    * Update the specified resource in storage.
    */
    public function update(\App\Http\Requests\NoteRequest $request, string $id): JsonResponse
    {
        $note= Note::find($id);
        //podemos usar el Note::update
        //O para ver la opción directa, lo hacemos:
        $note->title= $request->title;
        $note->content= $request->content;
        $note->save(); // Si lo hacemos así, necesitamos guardar
        return response()->json([
            'success' => true  
        ],204); // El estado 204 corresponde a la creación correcta de u nuevo elemento
    }

    /**
    * Remove the specified resource from storage.
    */
    public function destroy(string $id): JsonResponse {
        //Buscamos el elemento a borrar
        $note= Note::find($id);
        $note->delete();
        return response()->json([
            'success' => true  
        ],205); // El estado 205 corresponde a la  eliminación correcta de un nuevo elemento
    }
}
