

<?php $__env->startSection('title'); ?>
  <?php echo e($module_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-header'); ?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo e($module_name); ?>

      <a class="btn btn-sm btn-warning pull-right" href="<?php echo e(route(Request::segment(2) . '.create')); ?>">
        <i class="fa fa-plus"></i> <?php echo app('translator')->get('Add'); ?>
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

            <div class="col-md-4">
              <div class="form-group">
                <label><?php echo app('translator')->get('Keyword'); ?> </label>
                <input type="text" class="form-control" name="keyword" placeholder="<?php echo e(__('Title') . '...'); ?>"
                  value="<?php echo e($params['keyword'] ?? ''); ?>">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label><?php echo app('translator')->get('Taxonomy'); ?></label>
                <select name="taxonomy" id="taxonomy" class="form-control select2" style="width: 100%;">
                  <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                  <?php $__currentLoopData = App\Consts::TAXONOMY; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>"
                      <?php echo e(isset($params['taxonomy']) && $key == $params['taxonomy'] ? 'selected' : ''); ?>>
                      <?php echo e(__($value)); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label><?php echo app('translator')->get('Status'); ?></label>
                <select name="status" id="status" class="form-control select2" style="width: 100%;">
                  <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                  <?php $__currentLoopData = App\Consts::TAXONOMY_STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                  <?php $__currentLoopData = App\Consts::TITLE_BOOLEAN; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
        <h3 class="box-title"><?php echo app('translator')->get('List'); ?></h3>
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
                <th><?php echo app('translator')->get('Taxonomy'); ?></th>
                <th><?php echo app('translator')->get('Link'); ?></th>
                <th><?php echo app('translator')->get('Url Mapping'); ?></th>
                <th><?php echo app('translator')->get('Is featured'); ?></th>
                <th><?php echo app('translator')->get('Order'); ?></th>
                <th><?php echo app('translator')->get('Updated at'); ?></th>
                <th><?php echo app('translator')->get('Status'); ?></th>
                <th><?php echo app('translator')->get('Action'); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php if($rows): ?>
                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($row->parent_id == 0 || $row->parent_id == null): ?>
                    <form action="<?php echo e(route(Request::segment(2) . '.destroy', $row->id)); ?>" method="POST"
                      onsubmit="return confirm('<?php echo app('translator')->get('confirm_action'); ?>')">
                      <tr class="valign-middle">
                        <td>
                          <strong style="font-size: 14px;"><?php echo e($row->title); ?></strong>
                        </td>
                        <td>
                          <?php echo e(__(App\Consts::TAXONOMY[$row->taxonomy] ?? '')); ?>

                        </td>
                        <?php
                          $url_mapping = App\Helpers::generateRoute($row->taxonomy, $row->alias ?? $row->title, $row->id);
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
                          <?php echo app('translator')->get(App\Consts::TITLE_BOOLEAN[$row->is_featured]); ?>
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

                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($sub->parent_id == $row->id): ?>
                        <form action="<?php echo e(route(Request::segment(2) . '.destroy', $sub->id)); ?>" method="POST"
                          onsubmit="return confirm('<?php echo app('translator')->get('confirm_action'); ?>')">
                          <tr class="valign-middle bg-gray-light">

                            <td>
                              - - - - <?php echo e($sub->title); ?>

                            </td>
                            <td>
                              <?php echo e(__(App\Consts::TAXONOMY[$sub->taxonomy] ?? '')); ?>

                            </td>
                            <?php
                              $url_mapping = App\Helpers::generateRoute($sub->taxonomy, $sub->title, $sub->id);
                            ?>
                            <td>
                              <a target="_new" href="<?php echo e($url_mapping); ?>" data-toggle="tooltip"
                                title="<?php echo app('translator')->get('Link'); ?>" data-original-title="<?php echo app('translator')->get('Link'); ?>">
                                <span class="btn btn-flat btn-sm btn-info">
                                  <i class="fa fa-external-link"></i>
                                </span>
                              </a>
                            </td>
                            <td>
                              <?php echo e($url_mapping); ?>

                            </td>
                            <td>
                              <?php echo app('translator')->get(App\Consts::TITLE_BOOLEAN[$sub->is_featured]); ?>
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
                              <a class="btn btn-sm btn-warning" data-toggle="tooltip" title="<?php echo app('translator')->get('Update'); ?>"
                                data-original-title="<?php echo app('translator')->get('Update'); ?>"
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
                              onsubmit="return confirm('<?php echo app('translator')->get('confirm_action'); ?>')">
                              <tr class="valign-middle bg-gray-light">
                                <td>
                                  - - - - - - <?php echo e($sub_child->title); ?>

                                </td>
                                <td>
                                  <?php echo e(__(App\Consts::TAXONOMY[$sub_child->taxonomy] ?? '')); ?>

                                </td>
                                <?php
                                  $url_mapping = App\Helpers::generateRoute($sub_child->taxonomy, $sub_child->title, $sub_child->id);
                                ?>
                                <td>
                                  <a target="_new" href="<?php echo e($url_mapping); ?>" data-toggle="tooltip"
                                    title="<?php echo app('translator')->get('Link'); ?>" data-original-title="<?php echo app('translator')->get('Link'); ?>">
                                    <span class="btn btn-flat btn-sm btn-info">
                                      <i class="fa fa-external-link"></i>
                                    </span>
                                  </a>
                                </td>
                                <td>
                                  <?php echo e($url_mapping); ?>

                                </td>
                                <td>
                                  <?php echo app('translator')->get(App\Consts::TITLE_BOOLEAN[$sub_child->is_featured]); ?>
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
                                  <a class="btn btn-sm btn-warning" data-toggle="tooltip" title="<?php echo app('translator')->get('Update'); ?>"
                                    data-original-title="<?php echo app('translator')->get('Update'); ?>"
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
              <?php endif; ?>
            </tbody>
          </table>
        <?php endif; ?>
      </div>

    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\honey\resources\views/admin/pages/cms_taxonomys/index.blade.php ENDPATH**/ ?>