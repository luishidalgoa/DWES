<!-- Laravel_Proyecto_FPDual/resources/views/professors/index.blade.php -->


<?php $__env->startSection('title', 'List of Professors'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mb-4">List of Professors</h1>

    <!-- Mostrar mensaje de éxito si existe -->
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <!-- Botón para agregar un nuevo profesor -->
    <a href="<?php echo e(route('professors.create')); ?>" class="btn btn-success mb-3">Add New Professor</a>

    <!-- Tabla para listar los profesores -->
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Companies</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Iterar sobre los profesores y mostrarlos en la tabla -->
            <?php $__empty_1 = true; $__currentLoopData = $professors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($professor->id); ?></td>
                    <td><?php echo e($professor->fullname); ?></td>
                    <td><?php echo e($professor->age); ?></td>
                    <td><?php echo e(ucfirst($professor->gender)); ?></td>
                    <td><?php echo e($professor->address); ?></td>
                    <td><?php echo e($professor->telephone); ?></td>
                    <td><?php echo e($professor->email); ?></td>
                    <td>
                        <?php $__currentLoopData = $professor->companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($company->name); ?><br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td>
                        <!-- Botones para ver, editar y eliminar un profesor -->
                        <a href="<?php echo e(route('professors.show', $professor->id)); ?>" class="btn btn-info btn-sm">View</a>
                        <a href="<?php echo e(route('professors.edit', $professor->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                        <form action="<?php echo e(route('professors.destroy', $professor->id)); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <!-- Mostrar mensaje si no se encuentran profesores -->
                <tr>
                    <td colspan="9" class="text-center">No professors found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DWES\2º Trimestre\2_proyectoFpDual\empresas\resources\views/professors/index.blade.php ENDPATH**/ ?>