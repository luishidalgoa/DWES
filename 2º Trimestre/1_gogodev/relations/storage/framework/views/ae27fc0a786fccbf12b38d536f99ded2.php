<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relaciones</title>
</head>
<body>
    <h1><?php echo e($user->name); ?></h1>
    <h1><?php echo e($user->email); ?></h1>
    <h2>Datos relacionados a través de foreign key</h2>
    <h3><?php echo e($user->phone->prefix); ?> / <?php echo e($user->phone->phone_number); ?></h3>
</body>
</html><?php /**PATH C:\xampp\htdocs\DWES\2º Trimestre\1_gogodev\relations\resources\views/index.blade.php ENDPATH**/ ?>