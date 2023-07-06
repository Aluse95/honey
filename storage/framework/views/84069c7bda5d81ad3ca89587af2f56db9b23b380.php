<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  <title>Login | Authentication</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="robots" content="noindex">
  <link rel="icon" href="<?php echo e(asset('themes/admin/img/meta-logo-favicon.png')); ?>">

  
  <?php echo $__env->make('admin.panels/styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>

<body class="hold-transition login-page">

  <?php echo $__env->yieldContent('content'); ?>

  
  <?php echo $__env->make('admin.panels.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html>
<?php /**PATH D:\xampp\htdocs\office\resources\views/admin/layouts/auth.blade.php ENDPATH**/ ?>