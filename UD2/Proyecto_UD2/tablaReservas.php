<?php
session_start();
require_once('models/objects.php');
include('functions.php');

// Inicializar el array de bicicletas para almacenar objetos deserializados
$bicicletasArray = array();

// Verificar si ya hay reservas en la sesión y recuperarlas
if (isset($_SESSION['reservas'])) {
    foreach ($_SESSION['reservas'] as $key => $value) {
        // Deserializar y agregar al array
        $bicicletasArray[$key] = unserialize($value);
    }
}

// Almacenar nueva reserva al enviar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bicicleta = $_POST['tipo_bicicleta'];
    $ciudad = $_POST['ciudad'];
    $email = $_POST['floating_email'];
    $firstName = $_POST['floating_first_name'];
    $lastName = $_POST['floating_last_name'];
    $telephone = $_POST['floating_telephone'];
    $reserva = new DateTime($_POST['floating_date_reserva']);
    $vencimiento = new DateTime($_POST['floating_date_vencimiento']);

    // Crear objeto Bicycle y Data
    $bicycle = new Bicycle($bicicleta, $ciudad, $reserva, $vencimiento);
    $Data = new Data($email, $firstName, $lastName, $telephone, $bicycle);

    // Calcular y asignar el precio
    $Data->bicycle->setPrice(calculatePrice($Data->bicycle));

    // Serializar el objeto y almacenarlo en la sesión
    if (!isset($_SESSION['reservas'])) {
        $_SESSION['reservas'] = array();
    }

    // Verificar si el objeto ya existe en la sesión para evitar duplicados
    $serializedData = serialize($Data);
    if (!in_array($serializedData, $_SESSION['reservas'])) {
        $_SESSION['reservas'][] = $serializedData;
        $bicicletasArray[] = $Data; // Agregar al array local
    }
}
?>



<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>


<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Ciudad
                </th>
                <th scope="col" class="px-6 py-3">
                    Tipo bicileta
                </th>
                <th scope="col" class="px-6 py-3">
                    Fecha reserva
                </th>
                <th scope="col" class="px-6 py-3">
                    Fecha vencimiento
                </th>
                <th scope="col" class="px-6 py-3">
                    Precio
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(count($bicicletasArray) > 0) {
                for ($i = 0; $i < count($bicicletasArray); $i++) {
                    echo '<tr class="bg-white border-b">
                        <td class="px-6 py-4">
                            ' . $bicicletasArray[$i]->fullname . '
                        </td>
                        <td class="px-6 py-4">
                            ' . $bicicletasArray[$i]->bicycle->ciudad . '
                        </td>
                        <td class="px-6 py-4">
                            ' . $bicicletasArray[$i]->bicycle->type . '
                        </td>
                        <td class="px-6 py-4">
                            ' . $bicicletasArray[$i]->bicycle->reserva->format('Y-m-d') . '
                        </td>
                        <td class="px-6 py-4">
                            ' . $bicicletasArray[$i]->bicycle->vencimiento->format('Y-m-d') . '
                        </td>
                        <td class="px-6 py-4">
                            ' . $bicicletasArray[$i]->bicycle->price . '
                        </td>
                    </tr>';
                }
            }
            ?>
            <!-- <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Apple MacBook Pro 17"
                </th>
                <td class="px-6 py-4">
                    Silver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
            </tr> -->
        </tbody>
    </table>
</div>