<?php


namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;


class ProfessorController extends Controller
{
    /**
     * Método para mostrar la lista de profesores.
     * @return \Illuminate\View\View La vista con la lista de profesores.
     */
    public function index()
    {
        // Obtiene todos los profesores de la base de datos
        $professors = Professor::all();
        // Retorna la vista con la lista de profesores
        return view('professors.index', compact('professors'));
    }

    /**
     * Método para mostrar el formulario de creación de un nuevo profesor.
     * @return \Illuminate\View\View La vista del formulario de creación.
     * @return \Illuminate\Http\RedirectResponse La redirección a la lista de profesores.
     */
    public function create()
    {
        // Retorna la vista del formulario de creación
        return view('professors.create');
    }

    /**
     * Método para almacenar un nuevo profesor en la base de datos.
     * @param Request $request La solicitud HTTP con los datos del formulario.
     * @return \Illuminate\Http\RedirectResponse La redirección a la lista de profesores.
     */
    public function store(Request $request)
    {
        // Valida los datos del formulario
        $validated = $request->validate([
            'fullname' => 'required|string|max:100',
            'age' => 'required|integer|min:18|max:100',
            'gender' => 'required|in:male,female,other',
            'address' => 'required|string|max:150',
            'telephone' => 'required|string|max:9',
            'email' => 'required|email|unique:professors,email|max:50',
        ]);
    
        // Crea un nuevo profesor con los datos validados
        $professor = Professor::create($validated);
    
        // Redirige a la lista de profesores con un mensaje de éxito
        return redirect()->route('professors.index')->with('success', 'Profesor creado exitosamente.');
    }

    /**
     * Método para mostrar los detalles de un profesor específico.
     * @param string $id El ID del profesor a mostrar.
     * @return \Illuminate\View\View La vista con los detalles del profesor.
     */
    public function show(string $id)
    {
        // Busca el profesor por su ID
        $professor = Professor::find($id);

        // Si no se encuentra el profesor, redirige con un mensaje de error
        if (!$professor) {
            return redirect()->route('professors.index')->with('error', 'Profesor no encontrado.');
        }

        // Retorna la vista con los detalles del profesor
        return view('professors.show', compact('professor'));
    }

    /**
     * Método para mostrar el formulario de edición de un profesor específico.
     * @param string $id El ID del profesor a editar.
     * @return \Illuminate\View\View La vista del formulario de edición.
     */
    public function edit($id)
    {
        // Busca el profesor por su ID o falla si no lo encuentra
        $professor = Professor::findOrFail($id);
        // Retorna la vista del formulario de edición con los datos del profesor
        return view('professors.edit', compact('professor'));
    }

    /**
     * Método para actualizar un profesor específico en la base de datos.
     * @param Request $request La solicitud HTTP con los datos del formulario.
     * @param string $id El ID del profesor a actualizar.
     */
    public function update(Request $request, string $id)
    {
        // Valida los datos del formulario
        $validated = $request->validate([
            'fullname' => 'required|string|max:100',
            'age' => 'required|integer|min:18|max:100',
            'gender' => 'required|in:male,female,other',
            'address' => 'required|string|max:150',
            'telephone' => 'required|string|max:9',
            'email' => 'required|email|unique:professors,email,' . $id . '|max:50', // Excluir el email actual
        ]);

        // Busca el profesor por su ID
        $professor = Professor::find($id);

        // Si no se encuentra el profesor, redirige con un mensaje de error
        if (!$professor) {
            return redirect()->route('professors.index')->with('error', 'Profesor no encontrado.');
        }

        // Actualiza el profesor con los datos validados
        $professor->update($validated);

        // Redirige a la lista de profesores con un mensaje de éxito
        return redirect()->route('professors.index')
            ->with('success', 'Profesor actualizado exitosamente.');
    }

    /**
     * Método para eliminar un profesor específico de la base de datos.
     * @param string $id El ID del profesor a eliminar.
     * @return \Illuminate\Http\RedirectResponse La redirección a la lista de profesores.
     */
    public function destroy(string $id)
    {
        // Busca el profesor por su ID
        $professor = Professor::find($id);

        // Si no se encuentra el profesor, redirige con un mensaje de error
        if (!$professor) {
            return redirect()->route('professors.index')->with('error', 'Profesor no encontrado.');
        }

        // Elimina las relaciones del profesor con las compañías
        $professor->companies()->delete();

        // Elimina el profesor
        $professor->delete();

        // Redirige a la lista de profesores con un mensaje de éxito
        return redirect()->route('professors.index')
            ->with('success', 'Profesor eliminado exitosamente.');
    }
}