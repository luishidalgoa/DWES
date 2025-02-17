<!-- resources/views/companys/edit.blade.php -->


<?php $__env->startSection('content'); ?>
<h1>Edit Company</h1>

<form action="<?php echo e(route('companys.update', $company->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="<?php echo e($company->name); ?>" required>
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" id="address" class="form-control" value="<?php echo e($company->address); ?>">
    </div>
    <div class="form-group">
        <label for="telephone">Telephone</label>
        <input type="text" name="telephone" id="telephone" class="form-control" value="<?php echo e($company->telephone); ?>">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="<?php echo e($company->email); ?>">
    </div>
    <div class="form-group">
        <label for="date_creation">Date Creation</label>
        <input type="date" name="date_creation" id="date_creation" class="form-control" value="<?php echo e($company->date_creation); ?>">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\DWES\2º Trimestre\2_proyectoFpDual\empresas\resources\views/companys/edit.blade.php ENDPATH**/ ?>