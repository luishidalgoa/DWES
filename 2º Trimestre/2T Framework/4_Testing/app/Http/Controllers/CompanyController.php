<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Este metodo es llamado justo al cargar el componente de compañias. Devolvera un array compuesto por todas las compañias.
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Obtiene todas las compañías de la base de datos
        $companys = Company::all(); // O usar paginación ->paginate(10)
        // Retorna la vista con la lista de compañías
        return view('companys.index', compact('companys'));
    }

    /**
     * Este metodo es llamado justo al cargar el componente de creacion de compañias. Devuelve la vista de con el formulario para crear la compañia
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        // Retorna la vista del formulario de creación
        return view('companys.create');
    }

    /**
     * Este metodo es usado para persistir en la bbdd la compañia que el usuario relleno en el formulario
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Valida los datos del formulario
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'address' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'date_creation' => 'nullable|date',
            'professor_id' => 'nullable|integer|exists:professors,id', // Cambiado a nullable
        ]);
    
        // Crea una nueva compañía con los datos validados
        $company = Company::create($validated);
    
        // Redirige a la lista de compañías con un mensaje de éxito
        return redirect()->route('companys.index')->with('success', 'Compañía creada exitosamente.');
    }
    // Método para mostrar una compañía específica
    public function show(Company $company)
    {
        // Retorna la vista con los detalles de la compañía
        return view('companys.show', compact('company'));
    }
    // Método para mostrar el formulario de edición de una compañía
    public function edit(Company $company)
    {
        // Retorna la vista del formulario de edición con los datos de la compañía
        return view('companys.edit', compact('company'));
    }

    /**
     * 
     * Este metodo es usado para actualizar la compañia que el usuario relleno en el formulario
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Company $company)
    {
        // Valida los datos del formulario
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'address' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'date_creation' => 'nullable|date',
            'professor_id' => 'nullable|integer|exists:professors,id', // Permitir null para professor_id
        ]);
        // Si professor_id es null, establecerlo explícitamente en null
        if ($request->input('professor_id') === null) {
            $company->professor_id = null;
        }
        // Actualiza la compañía con los datos validados
        $company->update($validated);
        // Redirige a la lista de compañías con un mensaje de éxito
        return redirect()->route('companys.index')->with('success', 'Compañía actualizada exitosamente.');
    }

    // Método para eliminar una compañía específica
    public function destroy(Company $company)
    {
        // Elimina la compañía
        $company->delete();
        // Redirige a la lista de compañías con un mensaje de éxito
        return redirect()->route('companys.index')->with('success', 'Compañía eliminada exitosamente.');
    }
}