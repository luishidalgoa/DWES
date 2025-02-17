<?php

// app/Http/Resources/AuthResource.php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource; // Importamos la clase base JsonResource para formatear la respuesta

class AuthResource extends JsonResource
{
    /**
     * Transformar el recurso en un array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // Retornamos un array con los atributos del modelo 'Professor' que queremos incluir en la respuesta
        return [
            'id' => $this->id,                      // ID del profesor
            'fullname' => $this->fullname,           // Nombre completo del profesor
            'age' => $this->age,                     // Edad del profesor
            'gender' => $this->gender,               // Género del profesor
            'address' => $this->address,             // Dirección del profesor
            'telephone' => $this->telephone,         // Teléfono del profesor
            'email' => $this->email,                 // Correo electrónico del profesor
            'created_at' => $this->created_at,       // Fecha de creación del registro
            'updated_at' => $this->updated_at,       // Fecha de la última actualización del registro
        ];
    }
}
