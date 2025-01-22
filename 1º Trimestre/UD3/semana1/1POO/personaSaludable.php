<?php

/*
    En PHP, una clase puede implementar múltiples interfaces, lo que le permite definir varios comportamientos. 
    A continuación, un ejemplo de una clase que implementa dos interfaces: `Saludable` y `Identificable`.
    Cada interfaz define métodos que la clase debe implementar.

    ### Ejemplo: Clase `Persona` que implementa varias interfaces

    En este ejemplo, la clase `Persona` implementa dos interfaces:
    - `Saludable`: define métodos relacionados con la salud, como `hacerEjercicio`.
    - `Identificable`: define métodos relacionados con la identificación, como `getNombre` y `getEdad`.

*/


// Definimos la interfaz Saludable
interface Saludable {
    public function hacerEjercicio(): void;
    public function comerSano(): void;
}

// Definimos la interfaz Identificable
interface Identificable {
    public function getNombre(): string;
    public function getEdad(): int;
}

// La clase Persona implementa las interfaces Saludable e Identificable
class Persona implements Saludable, Identificable {
    private string $nombre;
    private int $edad;

    // Constructor de la clase Persona
    public function __construct(string $nombre, int $edad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    // Implementación del método hacerEjercicio() de la interfaz Saludable
    public function hacerEjercicio(): void{
        echo "{$this->nombre} está haciendo ejercicio.\n";
    }

    // Implementación del método comerSano() de la interfaz Saludable
    public function comerSano(): void {
        echo "{$this->nombre} está comiendo saludable.\n";
    }

    // Implementación del método getNombre() de la interfaz Identificable
    public function getNombre(): string {
        return $this->nombre;
    }

    // Implementación del método getEdad() de la interfaz Identificable
    public function getEdad(): int {
        return $this->edad;
    }
}

// Crear una instancia de la clase Persona
$persona = new Persona("Juan", 30);

// Usar los métodos de ambas interfaces
echo "Nombre: " . $persona->getNombre() . "\n";
echo "Edad: " . $persona->getEdad() . "\n";
$persona->hacerEjercicio();
$persona->comerSano();

/*

1. **Definición de Interfaces**:
   - **`Saludable`**: Esta interfaz define los métodos `hacerEjercicio` y `comerSano`.
   - **`Identificable`**: Esta interfaz define los métodos `getNombre` y `getEdad`.

2. **Implementación en la Clase `Persona`**:
   - La clase `Persona` implementa ambas interfaces (`Saludable` e `Identificable`). Esto obliga a la clase a definir todos los métodos especificados en ambas interfaces.
   - La clase contiene dos propiedades (`$nombre` y `$edad`) que son utilizadas para implementar los métodos de las interfaces.

3. **Uso de los Métodos**:
   - Se crea una instancia de `Persona` y se accede a los métodos definidos por las interfaces.
   - El código muestra cómo se pueden llamar a los métodos de ambas interfaces en el objeto `Persona`.

### Salida esperada

La salida del código será:

```
Nombre: Juan
Edad: 30
Juan está haciendo ejercicio.
Juan está comiendo saludable.
```

### Resumen
Este ejemplo muestra cómo una clase en PHP puede implementar múltiples interfaces para tener una estructura modular y cumplir con diferentes comportamientos, facilitando la organización del código y la reutilización de componentes.
 */
?>