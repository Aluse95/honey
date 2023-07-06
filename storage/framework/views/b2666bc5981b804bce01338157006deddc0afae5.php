

<?php $__env->startSection('title'); ?>
  <?php echo e($module_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-header'); ?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo e($module_name); ?>

      <a class="btn btn-sm btn-warning pull-right" href="<?php echo e(route(Request::segment(2) . '.create')); ?>"><i
          class="fa fa-plus"></i> <?php echo app('translator')->get('Add'); ?></a>
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
                <input type="text" class="form-control" name="keyword" placeholder="<?php echo app('translator')->get('keyword_note'); ?>"
                  value="<?php echo e(isset($params['keyword']) ? $params['keyword'] : ''); ?>">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label><?php echo app('translator')->get('Product category'); ?></label>
                <select name="taxonomy_id" id="taxonomy_id" class="form-control select2" style="width: 100%;">
                  <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                  <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($item->parent_id == 0 || $item->parent_id == null): ?>
                      <option value="<?php echo e($item->id); ?>"
                        <?php echo e(isset($params['taxonomy_id']) && $params['taxonomy_id'] == $item->id ? 'selected' : ''); ?>>
                        <?php echo e($item->title); ?></option>
                      <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item->id == $sub->parent_id): ?>
                          <option value="<?php echo e($sub->id); ?>"
                            <?php echo e(isset($params['taxonomy_id']) && $params['taxonomy_id'] == $sub->id ? 'selected' : ''); ?>>
                            - -
                            <?php echo e($sub->title); ?>

                          </option>
                          <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($sub->id == $sub_child->parent_id): ?>
                              <option value="<?php echo e($sub_child->id); ?>"
                                <?php echo e(isset($params['taxonomy_id']) && $params['taxonomy_id'] == $sub_child->id ? 'selected' : ''); ?>>
                                - - - -
                                <?php echo e($sub_child->title); ?></option>
                            <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label><?php echo app('translator')->get('Status'); ?></label>
                <select name="status" id="status" class="form-control select2" style="width: 100%;">
                  <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                  <?php $__currentLoopData = $postStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>"
                      <?php echo e(isset($params['status']) && $key == $params['status'] ? 'selected' : ''); ?>>
                      <?php echo e(__($value)); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label><?php echo app('translator')->get('Is featured'); ?></label>
                <select name="is_featured" id="is_featured" class="form-control select2" style="width: 100%;">
                  <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                  <?php $__currentLoopData = $booleans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>"
                      <?php echo e(isset($params['is_featured']) && $key == $params['is_featured'] ? 'selected' : ''); ?>>
                      <?php echo app('translator')->get($value); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>

            <div class="col-md-2">
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
        <h3 class="box-title"><?php echo app('translator')->get('Product list'); ?></h3>
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
            <?php echo app('translator')->get('not_found'); ?>
          </div>
        <?php else: ?>
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th><?php echo app('translator')->get('Title'); ?></th>
                <th><?php echo app('translator')->get('Link'); ?></th>
                <th><?php echo app('translator')->get('Url Mapping'); ?></th>
                <th><?php echo app('translator')->get('Product category'); ?></th>
                <th><?php echo app('translator')->get('Price'); ?></th>
                <th><?php echo app('translator')->get('Is featured'); ?></th>
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
                      <?php
                        $url_mapping = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $row->alias ?? $row->title, $row->id, 'detail', $row->taxonomy_title);
                      ?>
                      <td>
                        <a target="_new" href="<?php echo e($url_mapping); ?>" data-toggle="tooltip" title="<?php echo app('translator')->get('Link'); ?>"
                          data-original-title="<?php echo app('translator')->get('Link'); ?>">
                          <span class="btn btn-flat btn-sm btn-info">
                            <i class="fa fa-external-link"></i>
                          </span>
                        </a>
                      </td>
                      <td>
                        <?php echo e($url_mapping); ?>

                      </td>
                      <td>
                        <?php echo e($row->taxonomy_title); ?>

                      </td>
                      <td>
                        <?php echo e(number_format($row->json_params->price ?? 0)); ?>

                        <?php echo e($row->json_params->price_currency ?? ''); ?>

                      </td>
                      <td>
                        <?php echo app('translator')->get($booleans[$row->is_featured]); ?>
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
                        <a class="btn btn-sm btn-warning" data-toggle="tooltip" title="<?php echo app('translator')->get('Update'); ?>"
                          data-original-title="<?php echo app('translator')->get('Update'); ?>"
                          href="<?php echo e(route(Request::segment(2) . '.edit', $row->id)); ?>">
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
            </tbody>
          </table>
        <?php endif; ?>
      </div>

      <div class="box-footer clearfix">
        <div class="row">
          <div class="col-sm-5">
            Tìm thấy <?php echo e($rows->total()); ?> kết quả
          </div>
          <div class="col-sm-7">
            <?php echo e($rows->withQueryString()->links('admin.pagination.default')); ?>

          </div>
        </div>
      </div>

    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\honey\resources\views/admin/pages/cms_products/index.blade.php ENDPATH**/ ?>