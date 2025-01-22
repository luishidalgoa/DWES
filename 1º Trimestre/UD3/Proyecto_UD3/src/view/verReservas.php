<?php
require_once('../controller/reservarController.php');
use Proyecto_UD3\ReservarController;

$reservarController = new ReservarController();
$reservas = $reservarController->reservas;
?>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">Nombre</th>
                <th scope="col" class="px-6 py-3">Ciudad</th>
                <th scope="col" class="px-6 py-3">Tipo bicicleta</th>
                <th scope="col" class="px-6 py-3">Fecha reserva</th>
                <th scope="col" class="px-6 py-3">Fecha vencimiento</th>
                <th scope="col" class="px-6 py-3">Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($reservas !== null && count($reservas) > 0) {
                foreach ($reservas as $reserva) {
                    echo '<tr class="bg-white border-b">
                        <td class="px-6 py-4">' . htmlspecialchars($reserva->fullname) . '</td>
                        <td class="px-6 py-4">' . htmlspecialchars($reserva->bicycle->ciudad) . '</td>
                        <td class="px-6 py-4">' . htmlspecialchars($reserva->bicycle->type) . '</td>
                        <td class="px-6 py-4">' . $reserva->bicycle->reserva->format("Y-m-d") . '</td>
                        <td class="px-6 py-4">' . $reserva->bicycle->vencimiento->format("Y-m-d") . '</td>
                        <td class="px-6 py-4">' . htmlspecialchars($reserva->bicycle->price) . '</td>
                    </tr>';
                }
            } else {
                echo '<tr><td colspan="6" class="px-6 py-4 text-center">No hay reservas disponibles</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>
