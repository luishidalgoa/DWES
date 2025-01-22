<?php
function calculatePrice($bicycle) {
    $price = 0;
    $reserva = $bicycle->reserva->format('Y-m-d');
    $vencimiento = $bicycle->vencimiento->format('Y-m-d');
    $date1 = new DateTime($reserva);
    $date2 = new DateTime($vencimiento);
    $interval = $date1->diff($date2);
    $days = $interval->days;
    if ($days > 0) {
        $price = $days * priceBaseByType($bicycle->type);
    }
    return $price;
}

function priceBaseByType($type) {
    switch ($type) {
        case "Carrera":
            return 8;
        case "Touring":
            return 7;
        case "Ciclo":
            return 5;
        case "Montaña":
            return 6;
        case "Electrica":
            return 15;
        case "Urbana":
            return 3;
    }
}