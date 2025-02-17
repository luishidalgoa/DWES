<?php $__env->startSection('title', 'Edit Professor'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mb-4">Edit Professor</h1>

    <form action="<?php echo e(route('professors.update', $professor->id)); ?>" method="POST" class="card p-4">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <!-- Campos similares al formulario de creación con valores existentes -->
        <input type="text" name="fullname" placeholder="Nombre Completo" required>
        <input type="number" name="age" placeholder="Edad" required>
        <input type="text" name="address" placeholder="Dirección" required>
        <input type="text" name="telephone" placeholder="Teléfono" required>
        <input type="email" name="email" placeholder="Correo Electrónico" required>
        <select name="gender" id="gender" required>
            <option value="male">Masculino</option>
            <option value="female">Femenino</option>
        </select>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?php echo e(route('professors.index')); ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DWES\2º Trimestre\2_proyectoFpDual\empresas\resources\views/professors/edit.blade.php ENDPATH**/ ?>