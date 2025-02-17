<!-- resources/views/professor/_form.blade.php -->
<form action="<?php echo e(route('professors.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <!-- Aquí van los campos del formulario -->
    <input type="text" name="fullname" placeholder="Nombre Completo" required>
    <input type="number" name="age" placeholder="Edad" required>
    <button type="submit">Guardar</button>
</form><?php /**PATH C:\xampp\htdocs\DWES\2º Trimestre\2_proyectoFpDual\empresas\resources\views/professors/_form.blade.php ENDPATH**/ ?>