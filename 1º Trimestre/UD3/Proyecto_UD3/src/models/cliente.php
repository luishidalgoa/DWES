<?php
namespace Proyecto_UD3;
use Proyecto_UD3\bicicleta;

class cliente {
    public string $email;
    public string $fullname;
    public string $telephone;
    public bicicleta $bicycle;

    public function __construct(string $email, string $firstName, string $lastName, string $telephone, bicicleta $bicycle) {
        $this->email = $email;
        $this->fullname = $firstName . ' ' . $lastName;
        $this->telephone = $telephone;
        $this->bicycle = $bicycle;
    }

    // Usando __serialize() en lugar de serialize()
    public function __serialize(): array {
        return [
            'email' => $this->email,
            'fullname' => $this->fullname,
            'telephone' => $this->telephone,
            'bicycle' => $this->bicycle,
        ];
    }

    // Usando __unserialize() en lugar de unserialize()
    public function __unserialize(array $data): void {
        $this->email = $data['email'];
        $this->fullname = $data['fullname'];
        $this->telephone = $data['telephone'];
        $this->bicycle = $data['bicycle'];
    }
}