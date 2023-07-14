

<?php $__env->startSection('title'); ?>
  <?php echo e($module_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo e($module_name); ?>

      <a class="btn btn-sm btn-warning pull-right" href="<?php echo e(route(Request::segment(2) . '.create')); ?>"><i
          class="fa fa-plus"></i> <?php echo app('translator')->get('add_new'); ?></a>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <?php if(session('errorMessage')): ?>
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo e(session('errorMessage')); ?>

      </div>
    <?php endif; ?>
    <?php if(session('successMessage')): ?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo e(session('successMessage')); ?>

      </div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <p><?php echo e($error); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div>
    <?php endif; ?>

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo app('translator')->get('update_form'); ?></h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" action="<?php echo e(route(Request::segment(2) . '.update', $detail->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="box-body">
          <div class="col-md-6">

            <div class="form-group">
              <label><?php echo app('translator')->get('option_name'); ?> <small class="text-red">*</small>: <small><i>Viết theo cấu trúc dạng tên
                    biến
                    (snake_case, SNAKE_CASE hoặc camelCase)</i></small></label>
              <input type="text" class="form-control" name="option_name" placeholder="<?php echo app('translator')->get('option_name'); ?>"
                value="<?php echo e($detail->option_name); ?>" required>
            </div>

            <div class="form-group">
              <label><?php echo app('translator')->get('option_value'); ?>: <small><i>Có thể là dạng dữ liệu có cấu trúc (json,
                    array,...)</i></small></label>
              <textarea name="option_value" id="option_value" class="form-control"
                rows="5"><?php echo e(($detail->option_value)); ?></textarea>
            </div>

          </div>

          <div class="col-md-6">

            <div class="form-group">
              <label><?php echo app('translator')->get('is_system_param'); ?></label>
              <div class="form-control">
                <label>
                  <input type="radio" name="is_system_param" value="1"
                    <?php echo e($detail->is_system_param == '1' ? 'checked' : ''); ?>>
                  <small><?php echo app('translator')->get('true'); ?></small>
                </label>
                <label>
                  <input type="radio" name="is_system_param" value="0" class="ml-15"
                    <?php echo e($detail->is_system_param == '0' ? 'checked' : ''); ?>>
                  <small><?php echo app('translator')->get('false'); ?></small>
                </label>
              </div>
            </div>

            <div class="form-group">
              <label><?php echo app('translator')->get('description'); ?></label>
              <textarea name="description" id="description" class="form-control" rows="5"><?php echo e($detail->description); ?></textarea>
            </div>

          </div>

        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <a class="btn btn-success btn-sm" href="<?php echo e(route(Request::segment(2) . '.index')); ?>">
            <i class="fa fa-bars"></i> <?php echo app('translator')->get('list'); ?>
          </a>
          <button type="submit" class="btn btn-primary pull-right btn-sm"><i class="fa fa-floppy-o"></i>
            <?php echo app('translator')->get('save'); ?></button>
        </div>
      </form>
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\honey\resources\views/admin/pages/options/edit.blade.php ENDPATH**/ ?>