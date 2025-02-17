<?php $__env->startSection('title', 'Professor Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mb-4">Professor Details</h1>

    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3><?php echo e($professor->fullname); ?></h3>
        </div>
        <div class="card-body">
            <p><strong>Age:</strong> <?php echo e($professor->age); ?></p>
            <p><strong>Gender:</strong> <?php echo e(ucfirst($professor->gender)); ?></p>
            <p><strong>Address:</strong> <?php echo e($professor->address); ?></p>
            <p><strong>Telephone:</strong> <?php echo e($professor->telephone); ?></p>
            <p><strong>Email:</strong> <?php echo e($professor->email); ?></p>
        </div>
        <div class="card-footer text-end">
            <a href="<?php echo e(route('professors.index')); ?>" class="btn btn-secondary">Back to List</a>
            <a href="<?php echo e(route('professors.edit', $professor->id)); ?>" class="btn btn-warning">Edit</a>
            <form action="<?php echo e(route('professors.destroy', $professor->id)); ?>" method="POST" class="d-inline">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DWES\2º Trimestre\2_proyectoFpDual\empresas\resources\views/professors/show.blade.php ENDPATH**/ ?>