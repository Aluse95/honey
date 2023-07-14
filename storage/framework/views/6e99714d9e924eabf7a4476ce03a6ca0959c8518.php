

<?php $__env->startSection('title'); ?>
  <?php echo e($module_name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
  <style>
    .form-group {
      margin-bottom: 5px;
    }
  </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo e($module_name); ?>

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
    <div class="row">
      <div class="col-md-5">
        <?php if(isset($customer)): ?>
          <div class="box box-primary">
            <div class="box-body box-profile">
              <h3 class="profile-username text-center">
                <?php echo e($customer->name); ?>

              </h3>
              <p class="text-muted text-center">Tài khoản đặt hàng</p>
              <ul class="list-group list-group-unbordered">
                
                <li class="list-group-item">
                  <?php echo app('translator')->get('Total point available'); ?>:
                  <strong class="pull-right text-success"><?php echo e(number_format($customer->total_score)); ?></strong>
                </li>
                <li class="list-group-item">
                  <?php echo app('translator')->get('Total money available'); ?>:
                  <strong class="pull-right text-success"><?php echo e(number_format($customer->total_money)); ?></strong>
                </li>
              </ul>
            </div>
          </div>
        <?php endif; ?>

        <form role="form" action="<?php echo e(route(Request::segment(2) . '.update', $detail->id)); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <?php echo method_field('PUT'); ?>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="profile-username">
                <?php echo app('translator')->get('Detail information'); ?>:
                <?php echo app('translator')->get('Order number'); ?> #<?php echo e($detail->id); ?>

              </h3>
              <p class="text-muted"><?php echo e(__('Created at')); ?>: <?php echo e($detail->created_at); ?></p>
            </div>
            <div class="box-body">
              <div class="form-horizontal">
                <div class="form-group">
                  <label class="col-sm-3 text-right text-bold"><?php echo app('translator')->get('Fullname'); ?>:</label>
                  <label class="col-sm-9 col-xs-12"><?php echo e($detail->name ?? ''); ?></label>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 text-right text-bold"><?php echo app('translator')->get('Email'); ?>:</label>
                  <label class="col-sm-9 col-xs-12">
                    <?php echo e($detail->email ?? ''); ?>

                  </label>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 text-right text-bold"><?php echo app('translator')->get('Phone'); ?>:</label>
                  <label class="col-sm-9 col-xs-12">
                    <?php echo e($detail->phone ?? ''); ?>

                  </label>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 text-right text-bold"><?php echo app('translator')->get('Address'); ?>:</label>
                  <label class="col-sm-9 col-xs-12"><?php echo e($detail->address ?? ''); ?></label>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 text-right text-bold"><?php echo app('translator')->get('Content note'); ?>:</label>
                  <label class="col-sm-9 col-xs-12"><?php echo e($detail->customer_note ?? ''); ?></label>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 text-right text-bold"><?php echo app('translator')->get('Status'); ?>:</label>
                  <div class="col-sm-9 col-xs-12 ">
                    <?php $__currentLoopData = App\Consts::ORDER_STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <label>
                        <input type="radio" name="status" value="<?php echo e($key); ?>"
                          <?php echo e($detail->status == $key ? 'checked' : ''); ?>>
                        <small class="mr-15"><?php echo e(__($value)); ?></small>
                      </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <p class="text-warning">
                      Đơn này sẽ được đóng sau khi chuyển sang trạng thái <?php echo app('translator')->get(App\Consts::ORDER_STATUS['processed']); ?>
                    </p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 text-right text-bold"><?php echo app('translator')->get('Admin note'); ?>:</label>
                  <div class="col-md-9 col-xs-12">
                    <textarea name="admin_note" class="form-control" rows="5"><?php echo e($detail->admin_note ?? old('admin_note')); ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 text-right text-bold">
                    <?php echo app('translator')->get('Total money'); ?>:
                  </label>
                  <label class="col-sm-9 col-xs-12"><?php echo e(number_format($detail->total_money)); ?></label>
                </div>
                <?php if(isset($customer->total_money) && $detail->total_money <= $customer->total_money): ?>
                  <div class="form-group">
                    <label class="col-sm-3 text-right text-bold">
                      <?php echo app('translator')->get('Payment method'); ?>:
                    </label>
                    <div class="col-sm-9 col-xs-12">
                      <?php $__currentLoopData = App\Consts::PAYMENT_METHOD; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label>
                          <input type="radio" name="json_params[payment_method]" value="<?php echo e($key); ?>"
                            <?php echo e(isset($detail->json_params->payment_method) && $detail->json_params->payment_method == $key ? 'checked' : ''); ?>>
                          <small class="mr-15"><?php echo e(__($value)); ?></small>
                        </label>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                  </div>
                <?php endif; ?>

              </div>
            </div>
            <div class="box-footer">
              <a class="btn btn-success btn-sm" href="<?php echo e(route(Request::segment(2) . '.index')); ?>">
                <i class="fa fa-bars"></i> <?php echo app('translator')->get('List'); ?>
              </a>
              <button type="submit" class="btn btn-primary pull-right btn-sm">
                <i class="fa fa-floppy-o"></i>
                <?php echo app('translator')->get('Save'); ?>
              </button>
            </div>
          </div>
        </form>
      </div>

      <div class="col-md-7">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo app('translator')->get('Order product detail'); ?></h3>
          </div>

          <div class="box-body">
            <table class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th><?php echo app('translator')->get('No.'); ?></th>
                  <th><?php echo app('translator')->get('Product'); ?></th>
                  <th><?php echo app('translator')->get('Size'); ?></th>
                  <th><?php echo app('translator')->get('Price'); ?></th>
                  <th><?php echo app('translator')->get('Quantity'); ?></th>
                  <th><?php echo app('translator')->get('Total'); ?></th>
                  <th><?php echo app('translator')->get('Action'); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                    $url_mapping = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $row->post_title, $row->item_id, 'detail', $row->taxonomy_title);
                  ?>

                  <form action="<?php echo e(route('order_details.update', $row->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <tr class="valign-middle">
                      <td>
                        <?php echo e($loop->index + 1); ?>

                      </td>
                      <td>
                        <a href="<?php echo e($url_mapping); ?>" target="_blank">
                          <img src="<?php echo e($row->image_thumb ?? $row->image); ?>" style="height:100px">
                          <?php echo e($row->post_title); ?>

                        </a>
                      </td>
                      <td>
                        <input class="form-control" name="size" type="text" value="<?php echo e($row->size); ?>"
                          min="0" onchange="this.form.submit();">
                      </td>
                      <td>
                        <input class="form-control" name="price" type="number" value="<?php echo e($row->price); ?>"
                          min="0" onchange="this.form.submit();">
                      </td>
                      <td>
                        <input class="form-control" type="number" name="quantity" value="<?php echo e($row->quantity); ?>"
                          min="1" onchange="this.form.submit();">
                      </td>
                      <td>
                        <?php echo e(number_format($row->price * $row->quantity)); ?>

                      </td>
                      <td>
                        <button class="btn btn-sm btn-danger remove-order-detail" type="button" data-toggle="tooltip"
                          title="<?php echo app('translator')->get('Delete'); ?>" data-original-title="<?php echo app('translator')->get('Delete'); ?>"
                          data-id="<?php echo e($row->id); ?>">
                          <i class="fa fa-trash"></i>
                        </button>
                        <input class="hidden" type="submit">
                      </td>
                    </tr>
                  </form>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
  <script>
    $(function() {
      $(".remove-order-detail").click(function(e) {
        e.preventDefault();
        var ele = $(this);
        var id = ele.attr("data-id");
        if (confirm("<?php echo e(__('Are you sure want to remove?')); ?>")) {
          $.ajax({
            url: '<?php echo e(route('order_details.destroy')); ?>',
            method: "DELETE",
            data: {
              _token: '<?php echo e(csrf_token()); ?>',
              id: ele.attr("data-id")
            },
            success: function(response) {
              window.location.reload();
            }
          });
        }
      });

    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\honey\resources\views/admin/pages/orders/order_product_show.blade.php ENDPATH**/ ?>