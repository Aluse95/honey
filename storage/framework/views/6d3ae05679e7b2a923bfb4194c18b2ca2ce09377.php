

<?php $__env->startSection('title'); ?>
  <?php echo e($module_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-header'); ?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo e($module_name); ?>

      <a class="btn btn-sm btn-warning pull-right" href="<?php echo e(route(Request::segment(2) . '.create')); ?>"><i
          class="fa fa-plus"></i>
        <?php echo app('translator')->get('Add'); ?></a>
    </h1>
  </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="box">
      <form action="<?php echo e(route(Request::segment(2) . '.index')); ?>" method="GET">
        <div class="box-header">
          <h3 class="box-title"><?php echo app('translator')->get('List'); ?></h3>

          <div class="box-tools">
            <div class="input-group input-group-sm">
              <input type="text" name="keyword" class="form-control pull-right"
                placeholder="Tìm theo tên hoặc email..." value="<?php echo e($keyword); ?>">

              <div class="input-group-btn">
                <button type="submit" class="btn btn-default" data-toggle="tooltip" title="<?php echo app('translator')->get('search'); ?>">
                  <i class="fa fa-search"></i>
                </button>
                <a class="btn btn-primary" href="<?php echo e(route(Request::segment(2) . '.index')); ?>" data-toggle="tooltip"
                  title="<?php echo app('translator')->get('refresh'); ?>">
                  <i class="fa fa-refresh"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </form>

      <div class="box-body table-responsive">
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

        <?php if(!$admins->total()): ?>
          <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo app('translator')->get('not_found'); ?>
          </div>
        <?php else: ?>
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th><?php echo app('translator')->get('Email'); ?></th>
                <th><?php echo app('translator')->get('Fullname'); ?></th>
                <th><?php echo app('translator')->get('Role'); ?></th>
                <th><?php echo app('translator')->get('Updated at'); ?></th>
                <th><?php echo app('translator')->get('Status'); ?></th>
                <th><?php echo app('translator')->get('Action'); ?></th>
              </tr>
            </thead>
            <tbody>

              <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <form action="<?php echo e(route(Request::segment(2) . '.destroy', $admin->id)); ?>" method="POST"
                  onsubmit="return confirm('<?php echo app('translator')->get('confirm_action'); ?>')">
                  <tr class="valign-middle">
                    <td>
                      <?php echo e($admin->id); ?>

                    </td>
                    <td>
                      <?php echo e($admin->email); ?>

                    </td>
                    <td>
                      <?php echo e($admin->name); ?>

                    </td>
                    <td>
                      <?php echo e($admin->role_name); ?>

                    </td>
                    <td>
                      <?php echo e($admin->updated_at); ?>

                    </td>
                    <td>
                      <?php echo app('translator')->get($admin->status); ?>
                    </td>
                    <td>
                      <a class="btn btn-sm btn-warning" data-toggle="tooltip" title="<?php echo app('translator')->get('Update'); ?>"
                        data-original-title="<?php echo app('translator')->get('Update'); ?>"
                        href="<?php echo e(route(Request::segment(2) . '.edit', $admin->id)); ?>">
                        <i class="fa fa-pencil-square-o"></i>
                      </a>
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('DELETE'); ?>
                      <button class="btn btn-sm btn-danger" type="submit" data-toggle="tooltip"
                        title="<?php echo app('translator')->get('Delete'); ?>" data-original-title="<?php echo app('translator')->get('Delete'); ?>">
                        <i class="fa fa-trash"></i>
                      </button>
                    </td>
                  </tr>
                </form>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
          </table>
        <?php endif; ?>
      </div>

      <div class="box-footer clearfix">
        <div class="row">
          <div class="col-sm-5">
            Tìm thấy <?php echo e($admins->total()); ?> kết quả
          </div>
          <div class="col-sm-7">
            <?php echo e($admins->withQueryString()->links('admin.pagination.default')); ?>

          </div>
        </div>
      </div>

    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\honey\resources\views/admin/pages/admins/index.blade.php ENDPATH**/ ?>