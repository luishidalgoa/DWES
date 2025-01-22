<?php
    //Tutorial: https://www.youtube.com/watch?v=lP1hbkNA2uc 

    //error_reporting(0);
    use Controllers\CourseController;
    use Models\Course; //Si tengo 50 clases, 50 líneas
 

    
    echo "index del tutorial coders free<br/><br/>";

    spl_autoload_register(function($clase){

      $archivo=str_replace('\\', '/', $clase. ".php"); 
      if(file_exists($archivo)){
      
        require_once $archivo; 
        // El primer parámetro, "//" repetimos el caracter para que lo pueda tratar ya que es especial
        //Esta es la razón por la cual el archivo y las clases siempre han de llevar el mismo nombre.
        }
    });

  $course=new Course; //Cada vez que creo un objeto, se imprime en pantalla el namespace de la clase
  //$invent=new Invent;
  echo "<br/> Controller: <br/>";
  $course_controller = new CourseController();
  $course_controller->saludar();
?>