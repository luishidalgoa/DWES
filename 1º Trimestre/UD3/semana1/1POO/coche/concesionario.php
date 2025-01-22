<?php
//Archivo donde se almacenan todas las clases para crear objetos.

    class Compra_vehiculo{

        private $precio_base;
        //Se trata de un atributo que comparten todos los objetos
        private static $ayuda=0;

        //Método constructor por defecto.
        function __construct($gama){
            if ($gama=="urbano") {
                $this->precio_base=10000;
            } else if ($gama=="compacto") {
                $this->precio_base=20000;
            } else if ($gama=="berlina") {
                $this->precio_base=30000;
            }

        }

        //Funcion la cual se aplica en caso de que la fecha actual sea mayor que "12-02-22".
        static function descuento_gobierno(){
            //if(true){
            if(date("Y-m-d") > "2022-01-01" ){
                self::$ayuda=4500;
                echo "<br/> Se ha creado una ayuda de " . self::$ayuda;
            }
            else
            echo "<br/> No se ha creado ninguna ayuda , ayuda =" . self::$ayuda;
        }

        //Funciones la cual se ejecuta al llamarlas mediante un objeto creado.
        function climatizador(){
            $this->precio_base+=2000;
        }

        function navegador_gps(){
            $this->precio_base+=2500;
        }

        function tapiceria_cuero($color){
            if ($color == "blanco") {
                $this->precio_base+=3000;
            } else if ($color == "beige"){
                $this->precio_base+=3500;
            } else {
                $this->precio_base+=5000;
            }

        }

        //Funcion para imprimir el precio final ya aplicado el descuento.
        function precio_final(){
            $valor_final=$this->precio_base-self::$ayuda;
            return "<br/>". $valor_final;
        }


    }
//

?>