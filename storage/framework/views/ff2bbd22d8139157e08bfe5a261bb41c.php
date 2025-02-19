<!Doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title></title>
    <style>
    .btn-primary-btn{
        background-color:blue;
        color:white;
        border-radius:1em;

    }
    </style>
</head>
<body>
 <h2>customer list
 <a href="/api/user" class="btn btn-primary-btn">previous</a>
 </h2>
    <table border="1">
        <tr>
            <th>Email</th>
            <th>Password</th>
        </tr>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($datas->email); ?></td>
            <td><?php echo e($datas->password); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\project\megamart\resources\views/userview.blade.php ENDPATH**/ ?>