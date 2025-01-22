<?php
session_start();

$bicicletasArray = ["Carrera", "Touring", "Ciclo", "Montaña", "Electrica", "Urbana"];
$ciudadesArray = ["Córdoba", "Sevilla", "Malaga", "Granada", "Almeria"];

// Configuración del formulario
$formConfig = [
    [
        'type' => 'select',
        'name' => 'tipo_bicicleta',
        'label' => '¿Qué bicicleta buscas?',
        'options' => $bicicletasArray,
        'required' => true,
    ],
    [
        'type' => 'select',
        'name' => 'ciudad',
        'label' => '¿Dónde la quieres?',
        'options' => $ciudadesArray,
        'required' => true,
    ],
    [
        'type' => 'email',
        'name' => 'floating_email',
        'label' => 'Correo Electrónico',
        'placeholder' => 'Ingresa tu correo',
        'required' => true,
    ],
    [
        'type' => 'text',
        'name' => 'floating_first_name',
        'label' => 'Nombre',
        'placeholder' => 'Ingresa tu nombre',
        'required' => true,
    ],
    [
        'type' => 'text',
        'name' => 'floating_last_name',
        'label' => 'Apellido',
        'placeholder' => 'Ingresa tu apellido',
        'required' => true,
    ],
    [
        'type' => 'tel',
        'name' => 'floating_telephone',
        'label' => 'Teléfono',
        'placeholder' => '123-456-7890',
        'pattern' => '[0-9]{3}-[0-9]{3}-[0-9]{4}',
        'required' => true,
    ],
    [
        'type' => 'date',
        'name' => 'floating_date_reserva',
        'label' => 'Fecha de Reserva',
        'required' => true,
    ],
    [
        'type' => 'date',
        'name' => 'floating_date_vencimiento',
        'label' => 'Fecha de Vencimiento',
        'required' => true,
    ],
    [
        'type' => 'submit',
        'name' => 'submit',
        'value' => '¡A RODAR!',
    ],
];
?>

<?php
function generateForm($config) {
    $formHTML = '<form method="POST" action="tablaReservas.php" class="grid justify-center gap-3" onsubmit="return validarFormulario()">';

    foreach ($config as $field) {
        // Etiqueta del campo
        if (isset($field['label']) && $field['type'] !== 'submit') {
            $formHTML .= "<label for='{$field['name']}' class='text-white font-medium'>{$field['label']}</label>";
        }

        // Generación del campo según el tipo
        switch ($field['type']) {
            case 'text':
            case 'email':
            case 'tel':
            case 'date':
                $required = isset($field['required']) ? 'required' : '';
                $placeholder = $field['placeholder'] ?? '';
                $pattern = $field['pattern'] ?? '';
                $formHTML .= "<input type='{$field['type']}' name='{$field['name']}' id='{$field['name']}' placeholder='{$placeholder}' pattern='{$pattern}' class='block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-white focus:outline-none focus:ring-0 focus:border-blue-600 peer' {$required} />";
                break;

            case 'select':
                $required = isset($field['required']) ? 'required' : '';
                $formHTML .= "<select name='{$field['name']}' id='{$field['name']}' class='rounded-md' {$required}>";
                $formHTML .= "<option disabled selected value=''>Selecciona una opción</option>";
                foreach ($field['options'] as $option) {
                    $formHTML .= "<option value='{$option}'>{$option}</option>";
                }
                $formHTML .= "</select>";
                break;

            case 'submit':
                $formHTML .= "<button type='submit' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'>{$field['value']}</button>";
                break;
        }
    }

    $formHTML .= '</form>';
    return $formHTML;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Formulario Dinámico</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    img {
      animation: zoom 5s infinite alternate ease-in-out;
      height: 100%!important;
      filter: sepia(50%);
      filter: brightness(50%);
    }

    @keyframes zoom {
      from {
        scale: 1.2;
      }

      to {
        scale: 1;
      }
    }

    select {
      width: 250px;
      color: rgb(0, 0, 0, .6) !important;
      font-size: 20px !important;
      padding: 10px 20px !important;
      border: 1px solid rgb(0, 0, 0, .6) !important;
    }
  </style>
</head>

<body>
  <header class="relative flex justify-center h-screen items-center">
    <div class="-z-10 top-0 absolute w-full h-screen max-h-screen overflow-hidden">
      <img class="object-cover w-full h-full" src="https://wallpapercrafter.com/desktop/211654-bike-bicycle-basket-and-street-hd.jpg" />
    </div>
    <div class="grid gap-5">
      <h1 class="text-6xl font-bold font-serif text-white">Alquila la bici que quieras</h1>
      <h3 class="text-4xl font-bold font-serif text-white">Con seguro a todo riesgo incluido</h3>
      <?php echo generateForm($formConfig); ?>
    </div>
  </header>
</body>

</html>
