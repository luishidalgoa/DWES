<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seeder</title>
    <link rel="stylesheet" href="<?php echo e(asset('style.css')); ?>">
</head>
<body>
    <div class="container">
        <?php
    $counter = 0;
?>

<div class="row">
    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php if($counter % 3 == 0 && $counter != 0): ?>
            </div>
            <div class="row">
        <?php endif; ?>

        <div class="card">
            <h3><?php echo e($product->name); ?></h3>
            <p><?php echo e($product->short_description); ?></p>
            <p><?php echo e($product->price); ?> USD</p>
        </div>

        <?php
            $counter++;
        ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <h5>No data.</h5>
    <?php endif; ?>
</div>
     </div>
</body>

</html><?php /**PATH C:\xampp\htdocs\DWES\2T\UD6_Laravel\1_GOGODEV\7_Factory\seeder_factory_faker\resources\views/product/index.blade.php ENDPATH**/ ?>