<?php if(session('errorMessage')): ?>
  <div class="alert alert-dismissible alert-danger alert-fixed">
    <?php echo e(session('errorMessage')); ?>

    <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-hidden="true"></button>
  </div>
<?php endif; ?>
<?php if(session('successMessage')): ?>
  <div class="alert alert-dismissible alert-success alert-fixed">
    <?php echo e(session('successMessage')); ?>

    <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-hidden="true"></button>
  </div>
<?php endif; ?>
<?php if($errors->any()): ?>
  <div class="alert alert-dismissible alert-danger alert-fixed">
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <p><?php echo e($error); ?></p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-hidden="true"></button>
  </div>
<?php endif; ?>
<style>
  .alert-fixed {
    position: fixed;
    top: 0px;
    right: 0px;
    margin: 1rem;
    z-index: 9999;
  }
</style><?php /**PATH D:\xampp\htdocs\honey\resources\views/frontend/components/sticky/alert.blade.php ENDPATH**/ ?>