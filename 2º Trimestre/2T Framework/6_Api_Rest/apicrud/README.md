en esta seccion estamos creando una API con Laravel. El proyecto tiene sus rutas GET,POST , PUT Y DELETE.

Para poder probarlo podemos usar {{url}}:8000/api/note


tenemos algunos endpoints como:

````
GET /api/note : para obtener todas las notas

GET /api/note/{id} : para obtener una nota por su id

POST /api/note : para crear una nota

PUT /api/note/{id} : para actualizar una nota

DELETE /api/note/{id} : para eliminar una nota
````


En lo mas relevante que hemos creado es :

el fichero NoteController.php que es el controlador de la API el cual tiene los metodos para cada uno de los endpoints.

el fichero Note.php que es el modelo de la nota.

NoteRequest.php que es el request para validar los datos de la nota.

NoteResource.php que es el recurso de la nota. eso quiere decir que es la estructura de la respuesta de la API.