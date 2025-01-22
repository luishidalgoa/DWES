# Guía para Documentar Proyectos PHP

En esta guía se abordan diferentes herramientas y enfoques para documentar código PHP, proporcionando ejemplos y pasos detallados para facilitar la creación de documentación efectiva.

## Índice

1. [Introducción](#introducción)
2. [Uso de Markdown en GitHub](#uso-de-markdown-en-github)
3. [Instalación y Uso de PHPDocumentor](#instalación-y-uso-de-phpdocumentor)
4. [Documentación con Extensiones de Visual Studio Code](#documentación-con-extensiones-de-visual-studio-code)
5. [Solución de Problemas](#solución-de-problemas)
6. [Referencias](#referencias)

## Introducción

En esta guía aprenderás a documentar proyectos PHP usando:

- Markdown para archivos `README.md`.
- PHPDocumentor para generar documentación de código.
- Extensiones de Visual Studio Code para facilitar la auto-documentación.

---

## Uso de Markdown en GitHub

### Estructura del Archivo `README.md`

Un archivo `README.md` debe incluir los siguientes elementos:

1. **Título del Proyecto**
2. **Descripción Breve**
3. **Instalación**
4. **Uso**
5. **Estructura del Proyecto**
6. **Contribuciones**
7. **Licencia**
8. **Contacto o Información Adicional**

# Sistema de Gestión de Tareas

Este es un proyecto PHP para gestionar tareas mediante una interfaz web.

## Características
- CRUD de tareas
- Arquitectura MVC
- Uso de MySQL

## Instalación
1. Clona el repositorio:
```bash
   git clone https://github.com/usuario/gestion-tareas.git
```
2. Instala las dependencias:
```bash
   composer install
```
3. Configura la base de datos .env

## Uso
```bash
   php -S localhost:8000
```
Accede a http://localhost:8000 para ver la interfaz web.

## Estructura del Proyecto

```
├── public/
├── src/
│   ├── Controllers/
│   ├── Models/
│   ├── Views/
├── .env.example
├── composer.json
├── README.md
```

## Instalación y Uso de PHPDocumentor
### Requisitos
- PHP 7.4 o superior
- Composer

### Instalación
1. Instalación global
```bash
composer require --dev phpdocumentor/phpdocumentor
```
### Generar Documentación
Ejecuta el siguiente comando en la raíz del proyecto:
```bash
phpdoc -d . -t docs
```
Abre `docs/index.html` en tu navegador para ver la documentación generada.

## Generar Documentación con PHPDocumentor
1. Crea un archivo PHP de prueba, por ejemplo `ejemplo.php`:
```php
<?php

/**
 * Calcula el área de un círculo.
 *
 * @param float $radio El radio del círculo.
 * @return float El área del círculo.
 */
function calcularArea(float $radio): float {
    return pi() * pow($radio, 2);
}

```
2. Genera la documentación:
```bash
phpdoc -d . -t docs
```
3. Revisa la documentación en el directorio docs/ y abre index.html en tu navegador.
## Documentación con Extensiones de Visual Studio Code

### Extensiones Recomendadas

1. **PHP DocBlocker**: Ayuda a crear bloques de comentarios PHPDoc.
2. **PHP Doc Extender**: Mejora la auto-completación de PHPDoc.
3. **Mintlify**: Genera documentación automáticamente.

### Ejemplo con Mintlify
Selecciona el bloque de código y haz clic en "Generate Docs". Mintlify generará comentarios como:

```php
/**
 * Calcula el perímetro de un círculo.
 *
 * @return float El perímetro calculado.
 */
public function calcularPerimetro(): float {
    return 2 * pi() * $this->radio;
}
```

---

## Solución de Problemas

- **Comando `phpdoc` no encontrado**: Asegúrate de que la ruta global de Composer esté en tu PATH.
- **Incompatibilidad de versión**: PHPDocumentor requiere PHP 7.4 o superior.
- **Errores al instalar Composer**: Sigue la guía oficial de instalación en **Composer**.
