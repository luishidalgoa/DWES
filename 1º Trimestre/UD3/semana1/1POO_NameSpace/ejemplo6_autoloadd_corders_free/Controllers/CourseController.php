<?php

    //En vez de crear clases más largas/descriptivas, lo hacemos en el espacio de nombres
    //Convención: nombre es el de la carpeta
    namespace Controllers;
    
    class CourseController{

        public function saludar(){
            print "Hola desde la clase CourseControllers";
        }
    }

?>