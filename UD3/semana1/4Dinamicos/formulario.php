<?php
session_start();

$formConfig = [
    [
        'type' => 'text',
        'name' => 'first_name',
        'label' => 'Nombre',
        'placeholder' => 'Ingresa tu nombre',
        'required' => true,
    ],
    [
        'type' => 'email',
        'name' => 'email',
        'label' => 'Correo Electrónico',
        'placeholder' => 'Ingresa tu correo',
        'required' => true,
    ],
    [
        'type' => 'select',
        'name' => 'country',
        'label' => 'País',
        'options' => ['Mexico', 'Colombia', 'Argentina', 'España'],
        'required' => true,
    ],
    [
        'type' => 'radio',
        'name' => 'gender',
        'label' => 'Género',
        'options' => ['Masculino', 'Femenino', 'Otro'],
        'required' => true,
    ],
    [
        'type' => 'checkbox',
        'name' => 'accept_terms',
        'label' => 'Acepto los términos y condiciones',
        'required' => true,
    ],
    [
        'type' => 'submit',
        'name' => 'submit',
        'value' => 'Enviar',
    ],
];

function generateForm($config) {
    $formHTML = '<form method="POST" action="">';

    foreach ($config as $field) {
        if (isset($field['label']) && $field['type'] !== 'submit') {
            $formHTML .= "<label for='{$field['name']}'>{$field['label']}</label>";
        }

        switch ($field['type']) {
            case 'text':
            case 'email':
                $placeholder = $field['placeholder'] ?? '';
                $required = isset($field['required']) && $field['required'] ? 'required' : '';
                $formHTML .= "<input type='{$field['type']}' name='{$field['name']}' placeholder='$placeholder' $required>";
                break;

            case 'select':
                $required = isset($field['required']) && $field['required'] ? 'required' : '';
                $formHTML .= "<select name='{$field['name']}' $required>";
                foreach ($field['options'] as $option) {
                    $formHTML .= "<option value='$option'>$option</option>";
                }
                $formHTML .= "</select>";
                break;

            case 'radio':
                foreach ($field['options'] as $option) {
                    $required = isset($field['required']) && $field['required'] ? 'required' : '';
                    $formHTML .= "<input type='radio' name='{$field['name']}' value='$option' $required> $option ";
                }
                break;

            case 'checkbox':
                $required = isset($field['required']) && $field['required'] ? 'required' : '';
                $formHTML .= "<input type='checkbox' name='{$field['name']}' $required> {$field['label']}";
                break;

            case 'submit':
                $value = $field['value'] ?? 'Enviar';
                $formHTML .= "<button type='submit' name='{$field['name']}'>$value</button>";
                break;
        }
        $formHTML .= "<br>";
    }

    $formHTML .= '</form>';
    return $formHTML;
}

echo generateForm($formConfig);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<h2>Datos Recibidos:</h2>";
    foreach ($_POST as $key => $value) {
        echo "<p>$key: $value</p>";
    }
}