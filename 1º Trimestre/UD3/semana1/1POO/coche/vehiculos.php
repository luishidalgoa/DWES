<?php
//Archivo donde se almacenan todas las clases para crear objetos como puede ser un coche.

      //Clase con la cual se crearan objetos. Disponiendo de tres variables para todos los objetos creados.
    class Coche{
        //En vez de utilizar var usaresmos (private, protected o public)
        protected $ruedas;
        protected $color;
        protected $motor;

        //Método constructor por defecto. El que se utiliza en el video es un método deprecated. En las nuevas versiones se indica con '__contruct'. 
        function  __construct(){  
            $this->ruedas=4;
            $this->color="";
            $this->motor=1600;

        }

        //Funciones para acceder a las variables del objeto.(getters y setters).
        function get_ruedas(){
            return $this->ruedas;
        }
        function get_color(){
            return $this->color;
        }
        function get_motor(){
            return $this->motor;
        }

        //Funciones la cual se ejecuta al llamarlas mediante un objeto creado.
        function arrancar(){
            echo "Estoy arrancando <br>";
        }

        function girar(){
            echo "Estoy girando <br>";
        }

        function frenar(){
            echo "Estoy frenando <br>";
        }

        //Nueva funcion la cual recive dos parametros con los cuales cambia el color independiente de cada objeto.
        function establece_color($color_coche, $modelo_coche){
            $this->$color_coche;
            echo "El color de " . $modelo_coche . " es: " . $this->color . "<br>";
        }
    }


    /* -------------------------   NUEVA CLASE CAMION  ------------------------- */

    //Todas las caracteristicas de coche las adquiere camion tan solo con extends.
    class Camion extends Coche{

        function __construct(){
            $this->ruedas=8;
            $this->color="Gris";
            $this->motor=2600;

        }

        //Nueva funcion la cual recive dos parametros con los cuales cambia el color independiente de cada objeto.
        function establece_color($color_camion, $modelo_camion){
            $this->$color_camion;
            echo "El color de " . $modelo_camion . " es: " . $this->color . "<br>";
        }

        function arrancar(){
            //Ejecuta el codigo de la funcion padre (coche) arrancar(); y las nuevas lineas de codigo solo para camiones.
            parent:: arrancar();
            echo "Camion arrancado <br>";
        }
    }


    /* -------------------------   NUEVA CLASE CAMION  ------------------------- */
?>