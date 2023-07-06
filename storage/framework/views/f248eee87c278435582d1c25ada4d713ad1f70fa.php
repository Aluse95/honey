
<?php $__env->startSection('title'); ?>
  <?php echo e($module_name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
  <style>
    .checkbox_list {
      min-height: 300px;
    }

    .checkbox_list li {
      border-bottom: 1px dashed;
    }
  </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo e($module_name); ?>

      <a class="btn btn-sm btn-warning pull-right" href="<?php echo e(route(Request::segment(2) . '.create')); ?>"><i
          class="fa fa-plus"></i> <?php echo app('translator')->get('Add'); ?></a>
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
        <h3 class="box-title"><?php echo app('translator')->get('Create form'); ?></h3>
      </div>
      <!-- form start -->
      <form role="form" action="<?php echo e(route(Request::segment(2) . '.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="box-body">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active">
                <a href="#tab_1" data-toggle="tab">
                  <h5>
                    <?php echo app('translator')->get('General information'); ?>
                    <span class="text-danger">*</span>
                  </h5>
                </a>
              </li>
              <button type="submit" class="btn btn-primary btn-sm pull-right">
                <i class="fa fa-floppy-o"></i>
                <?php echo app('translator')->get('Save'); ?>
              </button>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Name'); ?></label>
                      <small class="text-red">*</small>
                      <i class="fa fa-coffee text-red" aria-hidden="true"></i>
                      <input type="text" class="form-control" name="name" placeholder="<?php echo app('translator')->get('Name'); ?>"
                        value="<?php echo e(old('name')); ?>" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Url customize'); ?></label>
                      <i class="fa fa-coffee text-red" aria-hidden="true"></i>
                      <small class="form-text">
                        (
                        <i class="fa fa-info-circle"></i>
                        <?php echo app('translator')->get('Maximum 100 characters in the group: "A-Z", "a-z", "0-9" and "-_"'); ?>
                        )
                      </small>
                      <input type="text" class="form-control" name="alias" placeholder="<?php echo app('translator')->get('Url customize'); ?>"
                        value="<?php echo e(old('alias')); ?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Title'); ?></label>
                      <i class="fa fa-coffee text-red" aria-hidden="true"></i>
                      <input type="text" class="form-control" name="title" placeholder="<?php echo app('translator')->get('Title'); ?>"
                        value="<?php echo e(old('title')); ?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Keyword'); ?></label>
                      <i class="fa fa-coffee text-red" aria-hidden="true"></i>
                      <input type="text" class="form-control" name="keyword" placeholder="<?php echo app('translator')->get('Keyword'); ?>"
                        value="<?php echo e(old('keyword')); ?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Description'); ?></label>
                      <i class="fa fa-coffee text-red" aria-hidden="true"></i>
                      <textarea type="text" class="form-control" name="description" placeholder="<?php echo app('translator')->get('Description'); ?>"><?php echo e(old('description')); ?></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('SEO Open Graph image'); ?></label>
                      <i class="fa fa-coffee text-red" aria-hidden="true"></i>
                      <div class="input-group">
                        <span class="input-group-btn">
                          <a data-input="og_image" data-preview="og_image-holder" data-type="cms-image"
                            class="btn btn-primary lfm">
                            <i class="fa fa-picture-o"></i> <?php echo app('translator')->get('choose'); ?>
                          </a>
                        </span>
                        <input id="og_image" class="form-control" type="text" name="json_params[og_image]"
                          placeholder="<?php echo app('translator')->get('image_link'); ?>..." value="<?php echo e(old('json_params[og_image]')); ?>">
                      </div>
                      <div id="og_image-holder" style="margin-top:15px;max-height:100px;">
                        <?php if(old('json_params[og_image]') != ''): ?>
                          <img style="height: 5rem;" src="<?php echo e(old('json_params[og_image]')); ?>">
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Content Page'); ?></label>
                      <textarea type="text" class="form-control" name="content" id="content"><?php echo e(old('content')); ?></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Status'); ?></label>
                      <div class="form-control">
                        <?php $__currentLoopData = App\Consts::STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <label>
                            <input type="radio" name="status" value="<?php echo e($value); ?>"
                              <?php echo e($loop->index == 0 ? 'checked' : ''); ?>>
                            <small class="mr-15"><?php echo e(__($value)); ?></small>
                          </label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Order'); ?></label>
                      <input type="number" class="form-control" name="iorder" placeholder="<?php echo app('translator')->get('Order'); ?>"
                        value="<?php echo e(old('iorder')); ?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Route Name'); ?></label>
                      <small class="text-red">*</small>
                      <select name="route_name" id="route_name" class="form-control select2" style="width:100%" required
                        autocomplete="off">
                        <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                        <?php $__currentLoopData = App\Consts::ROUTE_NAME; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($item['name']); ?>">
                            <?php echo e(__($item['title'])); ?>

                          </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Template'); ?></label>
                      <small class="text-red">*</small>
                      <select name="json_params[template]" id="template" class="form-control select2" style="width:100%"
                        required>
                        <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <hr style="border-top: dashed 2px #a94442; margin: 10px 0px;">
                  </div>
                  <div class="col-md-12">
                    <h3>
                      <?php echo app('translator')->get('Setting Block Content'); ?>
                    </h3>
                  </div>
                  <div class="col-md-6">
                    <h4 class="mb-15">
                      <?php echo app('translator')->get('Selected Blocks'); ?>
                    </h4>
                    <ul class="checkbox_list" id="block_selected"></ul>
                  </div>
                  <div class="col-md-6">
                    <h4 class="mb-15">
                      <?php echo app('translator')->get('Available Blocks'); ?>
                    </h4>
                    <ul class="checkbox_list" id="block_available"></ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="box-footer">
          <a class="btn btn-sm btn-success" href="<?php echo e(route(Request::segment(2) . '.index')); ?>">
            <i class="fa fa-bars"></i>
            <?php echo app('translator')->get('List'); ?>
          </a>
          <button type="submit" class="btn btn-primary btn-sm pull-right">
            <i class="fa fa-floppy-o"></i>
            <?php echo app('translator')->get('Save'); ?>
          </button>
        </div>
      </form>
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script>
    CKEDITOR.replace('content', ck_options);
    // Change to filter
    $(document).ready(function() {

      // Routes get all
      var routes = <?php echo json_encode(App\Consts::ROUTE_NAME ?? [], 15, 512) ?>;
      $(document).on('change', '#route_name', function() {
        let _value = $(this).val();
        let _targetHTML = $('#template');
        let _list = filterArray(routes, 'name', _value);
        let _optionList = '<option value=""><?php echo app('translator')->get('Please select'); ?></option>';
        if (_list) {
          _list.forEach(element => {
            element.template.forEach(item => {
              _optionList += '<option value="' + item.name + '"> ' + item.title + ' </option>';
            });
          });
          _targetHTML.html(_optionList);
        }
        $(".select2").select2();
      });

      // Fill Available Blocks by template
      $(document).on('change', '#template', function() {
        let template = $(this).val();
        let _targetHTML = $('#block_available');
        _targetHTML.html('');
        let url = "<?php echo e(route('block_contents.get_by_template')); ?>/";
        $.ajax({
          type: "GET",
          url: url,
          data: {
            "template": template,
          },
          success: function(response) {
            if (response.message == 'success') {
              let list = response.data || null;
              let _item = '';
              if (list.length > 0) {
                list.forEach(item => {
                  _item += '<li class="cursor">';
                  _item += '<input name="json_params[block_content][]" type="checkbox" value="' +
                    item.id + '" class="mr-15 block_item cursor" id="block_content_' + item.id + '">';
                  _item += '<label for="block_content_' + item.id + '" class="cursor">';
                  _item += '<strong>' + item.title + ' (' + item.block_name + ')</strong>';
                  _item += '</label>';
                  _item += '</li>';
                });
                _targetHTML.html(_item);
              }
            } else {
              _targetHTML.html(response.message);
            }
          },
          error: function(response) {
            // Get errors
            let errors = response.responseJSON.message;
            _targetHTML.html(errors);
          }
        });
      });

      // Checked and unchecked block item event
      $(document).on('click', '.block_item', function() {
        let ischecked = $(this).is(':checked');
        let _root = $(this).closest('li');
        let _targetHTML;

        if (ischecked) {
          _targetHTML = $("#block_selected");
        } else {
          _targetHTML = $("#block_available");
        }
        _targetHTML.append(_root);
      });
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\office\resources\views/admin/pages/pages/create.blade.php ENDPATH**/ ?>