<?php

namespace App\Http\Resources;

use Illuminate\Http\Request; // Importamos la clase Request para gestionar los datos de la solicitud
use Illuminate\Http\Resources\Json\JsonResource; // Importamos la clase base JsonResource para formatear la respuesta

class CompanyResource extends JsonResource
{
    /**
     * Transformar el recurso en un array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Retornamos un array con los atributos de la compañía que queremos incluir en la respuesta
        return [
            'id' => $this->id,                        // ID de la compañía
            'name' => $this->name,                     // Nombre de la compañía
            'address' => $this->address,               // Dirección de la compañía
            'telephone' => $this->telephone,           // Teléfono de la compañía
            'email' => $this->email,                   // Correo electrónico de la compañía
            'date_creation' => $this->date_creation,   // Fecha de creación de la compañía
            // Incluimos la relación con el profesor si está cargada, usando un recurso ProfessorResource
            'professor' => new ProfessorResource($this->whenLoaded('professor')),
            'created_at' => $this->created_at->toDateTimeString(), // Fecha de creación formateada
            'updated_at' => $this->updated_at->toDateTimeString(), // Fecha de última actualización formateada
        ];
    }
}
