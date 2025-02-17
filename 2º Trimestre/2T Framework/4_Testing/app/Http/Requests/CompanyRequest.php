<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest; // Importamos la clase base FormRequest para manejar solicitudes de formulario

class CompanyRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para hacer esta solicitud.
     */
    public function authorize(): bool
    {
        // Permitimos que todos los usuarios puedan hacer la solicitud (se podría personalizar según el caso)
        return true;
    }

    /**
     * Obtiene las reglas de validación que se aplican a la solicitud.
     *
     * @return array<string, string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100', // El nombre de la compañía es obligatorio, debe ser una cadena y tener un máximo de 100 caracteres
            'address' => 'nullable|string|max:255', // La dirección de la compañía es opcional, debe ser una cadena con un máximo de 255 caracteres
            'telephone' => 'nullable|string|max:20', // El teléfono es opcional, debe ser una cadena con un máximo de 20 caracteres
            'email' => 'nullable|string|max:100|email|unique:companies,email,' . $this->route('company'), // El correo electrónico es opcional, debe ser válido y único en la tabla 'companies'. Si existe una compañía con el mismo correo, se excluye la compañía actual usando el ID de la ruta.
            'date_creation' => 'nullable|date', // La fecha de creación es opcional y debe ser una fecha válida
            'professor_id' => 'nullable|exists:professors,id', // El ID del profesor es opcional, pero si se proporciona, debe existir en la tabla 'professors'
        ];
    }
}
