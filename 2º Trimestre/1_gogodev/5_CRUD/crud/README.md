En esta leccion hemos creado un crud modificando clases como web.php, note_controller.php y creado vvarias vistas en funcion de algunas acciones:

- create.blade.php
- edit.blade.php
- show.blade.php


Hemos agregado validaciones y notificacion de estado al crud. es decir que cuando creemos una nota nueva, se verifique que cumple una serie de condiciones. Una vez validado la vista retornara a la vista index y devolvera un mensaje que sera impreso en el componente _partials/messages.blade.php


Por ultimo hemos abreviado el siguiente fragmente en una sola linea:

Antes:
```php
Route::get('/note', [NoteController::class, 'index'])->name('note.index');
Route::get('/note/create', [NoteController::class, 'create'])->name('note.create');
Route::post('/note/store', [NoteController::class, 'store'])->name('note.store');

Route::get('/note/edit/{note}', [NoteController::class, 'edit'])->name('note.edit');
Route::put('/note/update/{note}', [NoteController::class, 'update'])->name('note.update');
Route::get('/note/show/{note}', [NoteController::class, 'show'])->name('note.show');

Route::delete('/note/destroy/{note}', [NoteController::class, 'destroy'])->name('note.destroy');
```

Ahora:
```php
Route::resource('/note',NoteController::class);
```
Desde el terminal probamos a ver todas las rutas
`php artisan route:list`


Resultado
```sh

  GET|HEAD        note ............................................................................................... note.index › NoteController@index
  POST            note ............................................................................................... note.store › NoteController@store  
  GET|HEAD        note/create ...................................................................................... note.create › NoteController@create  
  GET|HEAD        note/{note} .......................................................................................... note.show › NoteController@show  
  PUT|PATCH       note/{note} ...................................................................................... note.update › NoteController@update  
  DELETE          note/{note} .................................................................................... note.destroy › NoteController@destroy  
  GET|HEAD        note/{note}/edit ..................................................................................... note.edit › NoteController@edit  
  GET|HEAD        storage/{path} ......................................................................................................... storage.local  
  GET|HEAD        up ...................................................................................................................................  
```


Otro tip para agilizar el desarrollo es introducir el siguiente comando, el cual nos generara una clase con estructura de un Crud

``php artisan make:controller PostController --resource``