<?php $__env->startSection('title', 'Company Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mb-4">Company Details</h1>

    <!-- Tarjeta para mostrar los detalles de la compañía -->
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3><?php echo e($company->name); ?></h3>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> <?php echo e($company->id); ?></p>
            <p><strong>Address:</strong> <?php echo e($company->address); ?></p>
            <p><strong>Telephone:</strong> <?php echo e($company->telephone); ?></p>
            <p><strong>Email:</strong> <?php echo e($company->email); ?></p>
            <p><strong>Date Creation:</strong> <?php echo e($company->date_creation); ?></p>
            <p><strong>Professor ID:</strong> <?php echo e($company->professor_id); ?></p>
        </div>
        <div class="card-footer text-end">
            <!-- Botones para volver a la lista, editar y eliminar la compañía -->
            <a href="<?php echo e(route('companys.index')); ?>" class="btn btn-secondary">Back to List</a>
            <a href="<?php echo e(route('companys.edit', $company->id)); ?>" class="btn btn-warning">Edit</a>
            <form action="<?php echo e(route('companys.destroy', $company->id)); ?>" method="POST" class="d-inline">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DWES\2º Trimestre\2_proyectoFpDual\empresas\resources\views/companys/show.blade.php ENDPATH**/ ?>