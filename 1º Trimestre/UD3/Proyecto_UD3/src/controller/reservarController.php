<?php

namespace Proyecto_UD3;

require_once('../models/bicicleta.php');
require_once('../models/cliente.php');
use DateTime;
use Proyecto_UD3\cliente;
use Proyecto_UD3\bicicleta;
require_once('../utils/functions.php');

session_start();

class ReservarController
{
    public $reservas = array();

    public function __construct()
    {
        $this->reservas = $this->getReservas();

        // Comprobamos si se ha realizado un POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cliente = $this->postReserva();
            if (isset($cliente) && !in_array($cliente, $this->reservas)) {
                array_push($this->reservas, $cliente);
                $this->serializeReserva($cliente);
            }
        }

        // Inicializamos $_SESSION['reservas'] si no existe
        if (!isset($_SESSION['reservas'])) {
            $_SESSION['reservas'] = array();
        }
    }

    public function getReservas(): array
    {
        if (isset($_SESSION['reservas'])) {
            foreach ($_SESSION['reservas'] as $key => $value) {
                $this->reservas[$key] = unserialize($value);
            }
        }
        return $this->reservas;
    }

    /**
     * Extraemos los datos de la reserva del POST
     */
    public function postReserva(): cliente
    {
        $reserva = new DateTime($_POST['floating_date_reserva']);
        $vencimiento = new DateTime($_POST['floating_date_vencimiento']);

        $bicycle = new bicicleta($_POST['tipo_bicicleta'], $_POST['ciudad'], $reserva, $vencimiento);
        $cliente = new cliente($_POST['floating_email'], $_POST['floating_first_name'], $_POST['floating_last_name'], $_POST['floating_telephone'], $bicycle);
        $cliente->bicycle->setPrice(calculatePrice($cliente->bicycle));
        return $cliente;
    }

    public function serializeReserva($cliente)
    {
        if (!isset($_SESSION['reservas'])) {
            $_SESSION['reservas'] = array();
        }

        $this->reservas[] = $cliente;
        $serialized = array();

        foreach ($this->reservas as $key => $value) {
            $serialized[$key] = serialize($value);
        }

        $_SESSION['reservas'] = $serialized;
    }
}
