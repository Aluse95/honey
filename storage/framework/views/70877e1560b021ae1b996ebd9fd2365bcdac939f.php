

<?php $__env->startSection('title'); ?>
  <?php echo e($module_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-header'); ?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo e($module_name); ?>

      <a class="btn btn-sm btn-warning pull-right" href="<?php echo e(route(Request::segment(2) . '.create')); ?>">
        <i class="fa fa-plus"></i>
        <?php echo app('translator')->get('Add'); ?>
      </a>
    </h1>
  </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <!-- Main content -->
  <section class="content">
    
    <div class="box box-default">

      <div class="box-header with-border">
        <h3 class="box-title"><?php echo app('translator')->get('Filter'); ?></h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <form action="<?php echo e(route(Request::segment(2) . '.index')); ?>" method="GET">
        <div class="box-body">
          <div class="row">

            <div class="col-md-3">
              <div class="form-group">
                <label><?php echo app('translator')->get('Keyword'); ?> </label>
                <input type="text" class="form-control" name="keyword" placeholder="<?php echo app('translator')->get('Enter keyword to search'); ?>"
                  value="<?php echo e(isset($params['keyword']) ? $params['keyword'] : ''); ?>">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label><?php echo app('translator')->get('Block type'); ?></label>
                <select name="block_code" id="block_code" class="form-control select2" style="width: 100%;">
                  <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                  <?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item->block_code); ?>"
                      <?php echo e(isset($params['block_code']) && $item->block_code == $params['block_code'] ? 'selected' : ''); ?>>
                      <?php echo e(__($item->name)); ?>

                    </option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label><?php echo app('translator')->get('Status'); ?></label>
                <select name="status" id="status" class="form-control select2" style="width: 100%;">
                  <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                  <?php $__currentLoopData = App\Consts::STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>"
                      <?php echo e(isset($params['status']) && $key == $params['status'] ? 'selected' : ''); ?>>
                      <?php echo e(__($value)); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label><?php echo app('translator')->get('Filter'); ?></label>
                <div>
                  <button type="submit" class="btn btn-primary btn-sm mr-10"><?php echo app('translator')->get('Submit'); ?></button>
                  <a class="btn btn-default btn-sm" href="<?php echo e(route(Request::segment(2) . '.index')); ?>">
                    <?php echo app('translator')->get('Reset'); ?>
                  </a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </form>
    </div>
    

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">
          <i class="fa fa-list"></i>
          <?php echo app('translator')->get('Block list'); ?>
        </h3>
      </div>

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
        <?php if(count($rows) == 0): ?>
          <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo app('translator')->get('No record found'); ?>
          </div>
        <?php else: ?>
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th><?php echo app('translator')->get('Title'); ?></th>
                <th><?php echo app('translator')->get('Block type'); ?></th>
                <th><?php echo app('translator')->get('Order'); ?></th>
                <th><?php echo app('translator')->get('Updated at'); ?></th>
                <th><?php echo app('translator')->get('Status'); ?></th>
                <th><?php echo app('translator')->get('Action'); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($row->parent_id == 0 || $row->parent_id == null): ?>
                  <form action="<?php echo e(route(Request::segment(2) . '.destroy', $row->id)); ?>" method="POST"
                    onsubmit="return confirm('<?php echo app('translator')->get('confirm_action'); ?>')">
                    <tr class="valign-middle">
                      <td>
                        <strong style="font-size: 14px;"><?php echo e($row->title); ?></strong>
                      </td>
                      <td>
                        <?php echo e($row->block_name); ?> (<?php echo e($row->block_code); ?>)
                      </td>

                      <td>
                        <?php echo e($row->iorder); ?>

                      </td>
                      <td>
                        <?php echo e($row->updated_at); ?>

                      </td>
                      <td>
                        <?php echo app('translator')->get($row->status); ?>
                      </td>
                      <td>
                        <a class="btn btn-sm btn-warning" data-toggle="tooltip" title="<?php echo app('translator')->get('Edit'); ?>"
                          data-original-title="<?php echo app('translator')->get('Edit'); ?>"
                          href="<?php echo e(route(Request::segment(2) . '.edit', $row->id)); ?>">
                          <i class="fa fa-pencil-square-o"></i>
                        </a>
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-sm btn-danger" type="submit" data-toggle="tooltip" title="<?php echo app('translator')->get('Delete'); ?>"
                          data-original-title="<?php echo app('translator')->get('Delete'); ?>">
                          <i class="fa fa-trash"></i>
                        </button>
                      </td>
                    </tr>
                  </form>
                  <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($sub->parent_id == $row->id): ?>
                      <form action="<?php echo e(route(Request::segment(2) . '.destroy', $sub->id)); ?>" method="POST"
                        onsubmit="return confirm('<?php echo app('translator')->get('Confirm action'); ?>')">
                        <tr class="valign-middle bg-gray-light">
                          <td>
                            - - - - <?php echo e($sub->title); ?>

                          </td>
                          <td>
                            - - - -
                          </td>

                          <td>
                            <?php echo e($sub->iorder != '' ? '- - - - ' . $sub->iorder : ''); ?>

                          </td>
                          <td>
                            <?php echo e($sub->updated_at); ?>

                          </td>
                          <td>
                            <?php echo app('translator')->get($sub->status); ?>
                          </td>
                          <td>
                            <a class="btn btn-sm btn-warning" data-toggle="tooltip" title="<?php echo app('translator')->get('Edit'); ?>"
                              data-original-title="<?php echo app('translator')->get('Edit'); ?>"
                              href="<?php echo e(route(Request::segment(2) . '.edit', $sub->id)); ?>">
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
                      <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($sub_child->parent_id == $sub->id): ?>
                          <form action="<?php echo e(route(Request::segment(2) . '.destroy', $sub_child->id)); ?>" method="POST"
                            onsubmit="return confirm('<?php echo app('translator')->get('Confirm action'); ?>')">
                            <tr class="valign-middle bg-gray-light">
                              <td>
                                - - - - - - <?php echo e($sub_child->title); ?>

                              </td>
                              <td>
                                - - - - - -
                              </td>
                              <td>
                                <?php echo e($sub_child->iorder != '' ? '- - - - - - ' . $sub_child->iorder : ''); ?>

                              </td>
                              <td>
                                <?php echo e($sub_child->updated_at); ?>

                              </td>
                              <td>
                                <?php echo app('translator')->get($sub_child->status); ?>
                              </td>
                              <td>
                                <a class="btn btn-sm btn-warning" data-toggle="tooltip" title="<?php echo app('translator')->get('Edit'); ?>"
                                  data-original-title="<?php echo app('translator')->get('Edit'); ?>"
                                  href="<?php echo e(route(Request::segment(2) . '.edit', $sub_child->id)); ?>">
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
                        <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        <?php endif; ?>
      </div>
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\honey\resources\views/admin/pages/block_contents/index.blade.php ENDPATH**/ ?>