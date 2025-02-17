<?php

namespace App\Http\Resources;

use Illuminate\Http\Request; // Importamos la clase Request para gestionar los datos de la solicitud
use Illuminate\Http\Resources\Json\JsonResource; // Importamos la clase base JsonResource para formatear la respuesta

class ProfessorResource extends JsonResource
{
    /**
     * Transformar el recurso en un array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Retornamos un array con los atributos del profesor que queremos incluir en la respuesta
        return [
            'id' => $this->id,                        // ID del profesor
            'fullname' => $this->fullname,             // Nombre completo del profesor
            'age' => $this->age,                       // Edad del profesor
            'gender' => $this->gender,                 // Género del profesor
            'address' => $this->address,               // Dirección del profesor
            'telephone' => $this->telephone,           // Teléfono del profesor
            'email' => $this->email,                   // Correo electrónico del profesor
            'created_at' => $this->created_at->toDateTimeString(), // Fecha de creación formateada
            'updated_at' => $this->updated_at->toDateTimeString(), // Fecha de última actualización formateada
        ];
    }
}
