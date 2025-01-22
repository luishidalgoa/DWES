<?php
namespace Proyecto_UD3;
use DateTime;

class bicicleta {
    public string $type;
    public string $ciudad;
    public DateTime $reserva;
    public DateTime $vencimiento;
    public float $price;

    public function __construct(string $type, string $ciudad, DateTime $reserva, DateTime $vencimiento) {
        $this->type = $type;
        $this->reserva = $reserva;
        $this->vencimiento = $vencimiento;
        $this->ciudad = $ciudad;
    }

    public function setPrice(float $price) {
        $this->price = $price;
    }

    // Usando __serialize() en lugar de serialize()
    public function __serialize(): array {
        return [
            'type' => $this->type,
            'ciudad' => $this->ciudad,
            'reserva' => $this->reserva,
            'vencimiento' => $this->vencimiento,
            'price' => $this->price,
        ];
    }

    // Usando __unserialize() en lugar de unserialize()
    public function __unserialize(array $data): void {
        $this->type = $data['type'];
        $this->ciudad = $data['ciudad'];
        $this->reserva = $data['reserva'];
        $this->vencimiento = $data['vencimiento'];
        $this->price = $data['price'];
    }
}