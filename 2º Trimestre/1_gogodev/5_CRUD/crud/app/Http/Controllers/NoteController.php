<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Http\Requests\NoteRequest;

class NoteController extends Controller
{
    //crea index, donde se muestran todas las notas
    public function index()
    {
        //obtenemos todas las notas
        $notes = Note::all();

        //retornamos la vista con las notas, la función compact nos permite pasar variables a la vista en un array asociativo  
        return view('note.index', compact('notes'));
    }

    public function create()
    {
        return view('note.create');
    }

    public function store(NoteRequest $request)
    {
        /*
        1.
        $note = new Note();
        $note->title = $request->title;
        $note->description = $request->description;
        $note->save();

        2.
        $note = Note::create(
            [
                'title' => $request->title,
                'description' => $request->description
            ]
        );
        */
        $request->validate(
            [
                'title' => 'required|max:255|min:3',  // https://laravel.com/docs/10.x/validation
                'description' => 'required|max:255|min:3'
            ]
        );

        Note::create($request->all());

        return redirect()->route('note.index')->with('success', 'Note created');
    }

    public function edit(Note $note)
    {
        //$note = Note::find($id);  NO NECESARIO. Lo hace de forma implícita gracias ORM
        return view('note.edit', compact('note')); //con compact le pasamos el objeto note a la vista
    }

    public function update(Request $request, Note $note)
    {
        $request->validate(
            [
                'title' => 'required|max:255|min:3',  // https://laravel.com/docs/10.x/validation
                'description' => 'required|max:255|min:3'
            ]
        );
        
        $note->update($request->all());
        return redirect()->route('note.index')->with('success', 'Note updated');
    }

    public function show(Note $note)
    {
        return view('note.show', compact('note'));
    }

    public function destroy(Note $note)
    {

        $note->delete();
        return redirect()->route('note.index')->with('danger', 'Note deleted');
    }
}