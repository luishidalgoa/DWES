<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Gestión de Profesores'); ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
    <!-- Barra de Navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(route('professors.index')); ?>">Gestión de Profesores</a>
            <a class="navbar-brand" href="<?php echo e(route('companys.index')); ?>">Gestión de Empresas</a>
        </div>
    </nav>

    <!-- Mensaje de Bienvenida -->
    <div class="container my-4">
        <div class="alert alert-info text-center" role="alert">
            <h3>¡Bienvenido a la Aplicación de Gestión de Profesores y Empresas!</h3>
            <p>Aquí puedes gestionar a los profesores y las empresas asociadas.</p>
        </div>
    </div>

    <!-- Imagen de Cabecera centrada y más pequeña -->
    <div class="text-center">
        <img class="img-fluid" style="max-width: 25%;" src="<?php echo e(asset('images/instituto.jpg')); ?>" alt="Instituto Francisco de los Ríos">
    </div>

    <!-- Contenido Principal -->
    <div class="container my-4 flex-grow-1">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4 mt-auto">
        <p>&copy; 2025 Instituto Francisco de los Ríos. Todos los derechos reservados.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\DWES\2º Trimestre\proyectoFpDual\empresas\resources\views/layouts/index.blade.php ENDPATH**/ ?>