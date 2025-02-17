<?php $__env->startSection('title', 'Lista de empresas'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mb-4">Lista de empresas</h1>

    <!-- Mostrar mensaje de éxito si existe -->
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <!-- Botón para agregar una nueva empresa -->
    <a href="<?php echo e(route('companys.create')); ?>" class="btn btn-success mb-3">Añadir una empresa</a>

    <!-- Botón para volver al index.blade.php dentro de layouts, centrado -->
    <div class="text-center mb-3">
        <a href="<?php echo e(route('layouts.index')); ?>" class="btn btn-primary">Volver al inicio</a>
    </div>

    <!-- Tabla para listar las empresas -->
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Date Creation</th>
                <th>Professor ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Iterar sobre las empresas y mostrarlas en la tabla -->
            <?php $__empty_1 = true; $__currentLoopData = $companys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($company->id); ?></td>
                    <td><?php echo e($company->name); ?></td>
                    <td><?php echo e($company->address); ?></td>
                    <td><?php echo e($company->telephone); ?></td>
                    <td><?php echo e($company->email); ?></td>
                    <td><?php echo e($company->date_creation); ?></td>
                    <td><?php echo e($company->professor_id); ?></td>
                    <td>
                        <!-- Botones para ver, editar y eliminar una empresa -->
                        <a href="<?php echo e(route('companys.show', $company->id)); ?>" class="btn btn-info btn-sm">Ver</a>
                        <a href="<?php echo e(route('companys.edit', $company->id)); ?>" class="btn btn-warning btn-sm">Editar</a>
                        <form action="<?php echo e(route('companys.destroy', $company->id)); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Borrar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <!-- Mostrar mensaje si no se encuentran empresas -->
                <tr>
                    <td colspan="8" class="text-center">No se han encontrado empresas</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DWES\2º Trimestre\proyectoFpDual\empresas\resources\views/companys/index.blade.php ENDPATH**/ ?>