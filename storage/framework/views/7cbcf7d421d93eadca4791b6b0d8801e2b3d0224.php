

<?php $__env->startSection('title'); ?>
  <?php echo e($module_name); ?>

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
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" action="<?php echo e(route(Request::segment(2) . '.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="box-body">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active">
                <a href="#tab_1" data-toggle="tab">
                  <h5>Thông tin chính <span class="text-danger">*</span></h5>
                </a>
              </li>
              <li>
                <a href="#tab_2" data-toggle="tab">
                  <h5><?php echo app('translator')->get('Gallery Image'); ?></h5>
                </a>
              </li>
              <li>
                <a href="#tab_3" data-toggle="tab">
                  <h5><?php echo app('translator')->get('Related Products'); ?></h5>
                </a>
              </li>
              <li>
                <a href="#tab_4" data-toggle="tab">
                  <h5><?php echo app('translator')->get('Attribute product'); ?></h5>
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
                      <label><?php echo app('translator')->get('Product category'); ?> <small class="text-red">*</small></label>
                      <select name="taxonomy_id" id="taxonomy_id" class="form-control select2" style="width: 100%">
                        <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                        <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($item->parent_id == 0 || $item->parent_id == null): ?>
                            <option value="<?php echo e($item->id); ?>" <?php echo e(old('taxonomy_id') == $item->id ? 'selected' : ''); ?>>
                              <?php echo e($item->title); ?></option>

                            <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if($item->id == $sub->parent_id): ?>
                                <option value="<?php echo e($sub->id); ?>"
                                  <?php echo e(old('taxonomy_id') == $sub->id ? 'selected' : ''); ?>>- - <?php echo e($sub->title); ?>

                                </option>

                                <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php if($sub->id == $sub_child->parent_id): ?>
                                    <option value="<?php echo e($sub_child->id); ?>"
                                      <?php echo e(old('taxonomy_id') == $sub_child->id ? 'selected' : ''); ?>>- - - -
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
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Title'); ?> <small class="text-red">*</small></label>
                      <input type="text" class="form-control" name="title" placeholder="<?php echo app('translator')->get('Title'); ?>"
                        value="<?php echo e(old('title')); ?>" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-xs-6">
                          <label><?php echo app('translator')->get('Price'); ?></label>
                          <input type="text" class="form-control" name="json_params[price]"
                            placeholder="<?php echo app('translator')->get('Price'); ?>" value="<?php echo e(old('json_params[price]')); ?>">
                        </div>
                        <div class="col-xs-6">
                          <label><?php echo app('translator')->get('Price Old'); ?></label>
                          <input type="text" class="form-control" name="json_params[price_old]"
                            placeholder="<?php echo app('translator')->get('Price Old'); ?>" value="<?php echo e(old('json_params[price_old]')); ?>">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>URL tùy chọn</label>
                      <i class="fa fa-coffee text-red" aria-hidden="true"></i>
                      <small class="form-text">
                        (
                        <i class="fa fa-info-circle"></i>
                        Maximum 100 characters in the group: "A-Z", "a-z", "0-9" and "-_" )
                      </small>
                      <input name="alias" class="form-control" value="<?php echo e($detail->alias ?? old('alias')); ?>" />
                    </div>
                  </div>
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Is featured'); ?></label>
                      <div class="form-control">
                        <label>
                          <input type="radio" name="is_featured" value="1">
                          <small><?php echo app('translator')->get('true'); ?></small>
                        </label>
                        <label>
                          <input type="radio" name="is_featured" value="0" class="ml-15" checked="">
                          <small><?php echo app('translator')->get('false'); ?></small>
                        </label>
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
                      <label><?php echo app('translator')->get('Status'); ?></label>
                      <div class="form-control">
                        <label>
                          <input type="radio" name="status" value="active" checked="">
                          <small><?php echo app('translator')->get('active'); ?></small>
                        </label>
                        <label>
                          <input type="radio" name="status" value="deactive" class="ml-15">
                          <small><?php echo app('translator')->get('deactive'); ?></small>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">

                    <div class="form-group">
                      <label><?php echo app('translator')->get('File catalog'); ?></label>
                      <div class="input-group">
                        <span class="input-group-btn">
                          <a data-input="catalog" data-preview="catalog-holder" class="btn btn-primary lfm" data-type="file">
                            <i class="fa fa-file-pdf-o"></i> <?php echo app('translator')->get('choose'); ?>
                          </a>
                        </span>
                        <input id="catalog" class="form-control" type="text" name="json_params[catalog]"
                          value="<?php echo e($detail->json_params->catalog ?? ''); ?>" placeholder="<?php echo app('translator')->get('Link file'); ?>...">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Image'); ?></label>
                      <div class="input-group">
                        <span class="input-group-btn">
                          <a data-input="image" data-preview="image-holder" class="btn btn-primary lfm"
                            data-type="product">
                            <i class="fa fa-picture-o"></i> <?php echo app('translator')->get('choose'); ?>
                          </a>
                        </span>
                        <input id="image" class="form-control" type="text" name="image"
                          placeholder="<?php echo app('translator')->get('image_link'); ?>...">
                      </div>
                      <div id="image-holder" style="margin-top:15px;max-height:100px;">
                        <?php if(old('image') != ''): ?>
                          <img style="height: 5rem;" src="<?php echo e(old('image')); ?>">
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Image thumb'); ?></label>
                      <div class="input-group">
                        <span class="input-group-btn">
                          <a data-input="image_thumb" data-preview="image_thumb-holder" class="btn btn-primary lfm"
                            data-type="product">
                            <i class="fa fa-picture-o"></i> <?php echo app('translator')->get('choose'); ?>
                          </a>
                        </span>
                        <input id="image_thumb" class="form-control" type="text" name="image_thumb"
                          placeholder="<?php echo app('translator')->get('image_link'); ?>...">
                      </div>
                      <div id="image_thumb-holder" style="margin-top:15px;max-height:100px;">
                        <?php if(old('image_thumb') != ''): ?>
                          <img style="height: 5rem;" src="<?php echo e(old('image_thumb')); ?>">
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <hr style="border-top: dashed 2px #a94442; margin: 10px 0px;">
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Description'); ?></label>
                      <textarea name="json_params[brief][vi]" class="form-control" rows="5"><?php echo e(old('json_params[brief][vi]')); ?></textarea>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="form-group">
                        <label><?php echo app('translator')->get('Content'); ?></label>
                        <textarea name="json_params[content][vi]" class="form-control" id="content_vi"><?php echo e(old('json_params[content][vi]')); ?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <hr style="border-top: dashed 2px #a94442; margin: 10px 0px;">
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('seo_title'); ?></label>
                      <input name="json_params[seo_title]" class="form-control"
                        value="<?php echo e(old('json_params[seo_title]')); ?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('seo_keyword'); ?></label>
                      <input name="json_params[seo_keyword]" class="form-control"
                        value="<?php echo e(old('json_params[seo_keyword]')); ?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('seo_description'); ?></label>
                      <input name="json_params[seo_description]" class="form-control"
                        value="<?php echo e(old('json_params[seo_description]')); ?>">
                    </div>
                  </div>
                </div>

              </div>
              <div class="tab-pane " id="tab_2">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input class="btn btn-warning btn-sm add-gallery-image" data-toggle="tooltip"
                        title="Nhấn để chọn thêm ảnh" type="button" value="Thêm ảnh" />
                    </div>
                    <div class="row list-gallery-image">
                      <?php if(isset($detail->json_params->gallery_image)): ?>
                        <?php $__currentLoopData = $detail->json_params->gallery_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($value != null): ?>
                            <div class="col-lg-2 col-md-3 col-sm-4 mb-1 gallery-image">
                              <img class="img-width" src="<?php echo e($value); ?>">
                              <input type="text" name="json_params[gallery_image][<?php echo e($key); ?>]"
                                class="hidden" id="gallery_image_<?php echo e($key); ?>" value="<?php echo e($value); ?>">
                              <div class="btn-action">
                                <span class="btn btn-sm btn-success btn-upload lfm mr-5"
                                  data-input="gallery_image_<?php echo e($key); ?>">
                                  <i class="fa fa-upload"></i>
                                </span>
                                <span class="btn btn-sm btn-danger btn-remove">
                                  <i class="fa fa-trash"></i>
                                </span>
                              </div>
                            </div>
                          <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane " id="tab_3">
                <div class="row">
                  <div class="col-xs-6">
                    <div class="box" style="border-top: 3px solid #d2d6de;">
                      <div class="box-header">
                        <h3 class="box-title">Danh sách liên quan</h3>
                      </div><!-- /.box-header -->
                      <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th class="col-md-1">ID</th>
                              <th class="col-md-5">Tên</th>
                              <th class="col-md-2">Danh mục</th>
                              <th class="col-md-2">Đăng lúc</th>
                              <th class="col-md-2">Bỏ chọn</th>
                            </tr>
                          </thead>
                          <tbody id="post_related">
                          </tbody>
                        </table>
                      </div><!-- /.box-body -->
                    </div><!-- /.box -->
                  </div>
                  <div class="col-xs-6">
                    <div class="box" style="border-top: 3px solid #d2d6de;">
                      <div class="box-header">
                        <h3 class="box-title"></h3>
                        <div class="box-tools col-md-12">
                          <div class="col-md-6">
                            <select class="form-control select2" id="search_taxonomy_id" style="width:100%">
                              <option value="">- Chọn danh mục -</option>
                              <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->parent_id == 0 || $item->parent_id == null): ?>
                                  <option value="<?php echo e($item->id); ?>"><?php echo e($item->title); ?></option>

                                  <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($item->id == $sub->parent_id): ?>
                                      <option value="<?php echo e($sub->id); ?>">
                                        - -
                                        <?php echo e($sub->title); ?>

                                      </option>

                                      <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($sub->id == $sub_child->parent_id): ?>
                                          <option value="<?php echo e($sub_child->id); ?>">
                                            - - - -
                                            <?php echo e($sub_child->title); ?>

                                          </option>
                                        <?php endif; ?>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>
                          <div class="input-group col-md-6">
                            <input type="text" id="search_title_post" class="form-control pull-right"
                              placeholder="Tiêu đề..." autocomplete="off">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-default btn_search">
                                <i class="fa fa-search"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div><!-- /.box-header -->
                      <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th class="col-md-1">ID</th>
                              <th class="col-md-5">Tên</th>
                              <th class="col-md-2">Danh mục</th>
                              <th class="col-md-2">Đăng lúc</th>
                              <th class="col-md-2">Chọn</th>
                            </tr>
                          </thead>
                          <tbody id="post_available">

                          </tbody>
                        </table>
                      </div><!-- /.box-body -->
                    </div><!-- /.box -->
                  </div>
                </div>

              </div>
              <div class="tab-pane " id="tab_4">
                <div class="row">
                  <div class="col-md-12">
                    <hr style="border-top: dashed 2px #a94442; margin: 10px 0px;">
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input class="btn btn-warning btn-sm add-gallery-video" data-toggle="tooltip"
                        title="Nhấn để chọn thêm màu sắc" type="button" value="Thêm màu sắc" />
                    </div>
                    <div class="list-gallery-video">
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- /.tab-content -->
          </div><!-- nav-tabs-custom -->

        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <a class="btn btn-success btn-sm" href="<?php echo e(route(Request::segment(2) . '.index')); ?>">
            <i class="fa fa-bars"></i> <?php echo app('translator')->get('List'); ?>
          </a>
          <button type="submit" class="btn btn-primary pull-right btn-sm"><i class="fa fa-floppy-o"></i>
            <?php echo app('translator')->get('Save'); ?></button>
        </div>
      </form>
    </div>
  </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script>
    CKEDITOR.replace('content_vi', ck_options);

    $(document).ready(function() {

      // Fill Available Blocks by template
      $(document).on('click', '.btn_search', function() {
        let keyword = $('#search_title_post').val();
        let taxonomy_id = $('#search_taxonomy_id').val();
        let _targetHTML = $('#post_available');
        _targetHTML.html('');
        let checked_post = [];
        $("input:checkbox:checked").each(function() {
          checked_post.push($(this).val());
        });

        let url = "<?php echo e(route('cms_posts.search')); ?>/";
        $.ajax({
          type: "GET",
          url: url,
          data: {
            keyword: keyword,
            taxonomy_id: taxonomy_id,
            other_list: checked_post,
            is_type: "<?php echo e(App\Consts::POST_TYPE['product']); ?>"
          },
          success: function(response) {
            if (response.message == 'success') {
              let list = response.data || null;
              let _item = '';
              if (list.length > 0) {
                list.forEach(item => {
                  _item += '<tr>';
                  _item += '<td>' + item.id + '</td>';
                  _item += '<td>' + item.title + '</td>';
                  _item += '<td>' + item.taxonomy_title + '</td>';
                  _item += '<td>' + formatDate(item.created_at) + '</td> ';
                  _item +=
                    '<td><input name="json_params[related_post][]" type="checkbox" value="' + item.id +
                    '" class="mr-15 related_post_item cursor" autocomplete="off"></td>';
                  _item += '</tr>';
                });
                _targetHTML.html(_item);
              }
            } else {
              _targetHTML.html('<tr><td colspan="5">' + response.message + '</td></tr>');
            }
          },
          error: function(response) {
            // Get errors
            let errors = response.responseJSON.message;
            _targetHTML.html('<tr><td colspan="5">' + errors + '</td></tr>');
          }
        });
      });

      // Checked and unchecked item event
      $(document).on('click', '.related_post_item', function() {
        let ischecked = $(this).is(':checked');
        let _root = $(this).closest('tr');
        let _targetHTML;

        if (ischecked) {
          _targetHTML = $("#post_related");
        } else {
          _targetHTML = $("#post_available");
        }
        _targetHTML.append(_root);
      });

      // Xử lý video input
      $('.add-gallery-video').click(function(event) {
        let keyRandom = new Date().getTime();
        let elementParent = $('.list-gallery-video');
        let elementAppend = '';
        elementAppend += '<div class="col-lg-2 col-md-3 col-sm-4 mb-1 gallery-video gallery-image my-15">';
        elementAppend += '<input type="text" style="margin-bottom: 20px" name="json_params[color][' + keyRandom +
        '][name]" class="form-control" id="gallery_video_title_' + keyRandom +'" placeholder="Tên màu sắc">';
        elementAppend += '<img class="img-width"';
        elementAppend += 'src="' + no_image_link + '">';
        elementAppend += '<input type="text" name="json_params[color][' + keyRandom +
          '][value]" class="hidden" id="gallery_image_' + keyRandom +'">';
        elementAppend += '<div class="btn-action">';
        elementAppend += '<span class="btn btn-sm btn-success btn-upload lfm mr-5" data-input="gallery_image_' +
          keyRandom +'" data-type="cms-image">';
        elementAppend += '<i class="fa fa-upload"></i>';
        elementAppend += '</span>';
        elementAppend += '<span class="btn btn-sm btn-danger btn-remove">';
        elementAppend += '<i class="fa fa-trash"></i>';
        elementAppend += '</span>';
        elementAppend += '</div>';
        elementAppend += '</div>';
        elementParent.append(elementAppend);

        $('.lfm').filemanager('image', {
          prefix: route_prefix
        });
      });
      
      $('.list-gallery-video').on('mouseover', '.gallery-image', function(e) {
        $(this).find('.btn-action').show();
      });
      $('.list-gallery-video').on('mouseout', '.gallery-image', function(e) {
        $(this).find('.btn-action').hide();
      });
      // Change image for img tag gallery-image
      $('.list-gallery-video').on('change', 'input', function() {
        let _root = $(this).closest('.gallery-image');
        var img_path = $(this).val();
        _root.find('img').attr('src', img_path);
      });
      // Remove
      $('.list-gallery-video').on('click', '.btn-remove', function() {
        let _root = $(this).closest('.gallery-image');
        _root.remove();
      });

      /** Add tags */
      $(".btn_add_tags").click(function() {
        var tags = $("#tags_title").val();
        if (tags.trim() == '') return;
        var _url = "<?php echo e(route('cms_posts.add_tag')); ?>";
        $.ajax({
          type: "POST",
          url: _url,
          data: {
            tags: tags,
            _token: "<?php echo e(csrf_token()); ?>"
          },
          cache: false,
          context: document.body,
          success: function(response) {
            var obj = response.data;
            var appendContent;
            if (obj.exist) {
              /** Tags is exist in DB */
              $("#post_tags option[value='" + obj.id + "']").prop('selected', true);
            } else if (!obj.exist) {
              /** Tags is created */
              appendContent = '<option value="' + obj.id + '" selected>' + obj.title + '</option>';
              $("#post_tags").append(appendContent);
            } else {
              console.log("Has error in progress update DB");
            }
            $("#post_tags").select2();
            $("#tags_title").val("");
          },
          error: function(response) {
            // Get errors
            let errors = response.responseJSON.message;
            alert(errors);
          }
        });
      });
      $("#tags_title").keypress(function(event) {
        // Number 13 is the "Enter" key on the keyboard
        if (event.keyCode === 13) {
          // Cancel the default action, if needed
          event.preventDefault();
          $(".btn_add_tags").click();
        }
      });

      var no_image_link = '<?php echo e(url('themes/admin/img/no_image.jpg')); ?>';

      $('.add-gallery-image').click(function(event) {
        let keyRandom = new Date().getTime();
        let elementParent = $('.list-gallery-image');
        let elementAppend =
          '<div class="col-lg-2 col-md-3 col-sm-4 mb-1 gallery-image my-15">';
        elementAppend += '<img class="img-width"';
        elementAppend += 'src="' + no_image_link + '">';
        elementAppend += '<input type="text" name="json_params[gallery_image][' + keyRandom +
          ']" class="hidden" id="gallery_image_' + keyRandom +'">';
        elementAppend += '<div class="btn-action">';
        elementAppend += '<span class="btn btn-sm btn-success btn-upload lfm mr-5" data-input="gallery_image_' +
          keyRandom +'" data-type="cms-image">';
        elementAppend += '<i class="fa fa-upload"></i>';
        elementAppend += '</span>';
        elementAppend += '<span class="btn btn-sm btn-danger btn-remove">';
        elementAppend += '<i class="fa fa-trash"></i>';
        elementAppend += '</span>';
        elementAppend += '</div>';
        elementParent.append(elementAppend);

        $('.lfm').filemanager('image', {
          prefix: route_prefix
        });
      });
      // Change image for img tag gallery-image
      $('.list-gallery-image').on('change', 'input', function() {
        let _root = $(this).closest('.gallery-image');
        var img_path = $(this).val();
        _root.find('img').attr('src', img_path);
      });

      // Delete image
      $('.list-gallery-image').on('click', '.btn-remove', function() {
        // if (confirm("<?php echo app('translator')->get('confirm_action'); ?>")) {
        let _root = $(this).closest('.gallery-image');
        _root.remove();
        // }
      });

      $('.list-gallery-image').on('mouseover', '.gallery-image', function(e) {
        $(this).find('.btn-action').show();
      });
      $('.list-gallery-image').on('mouseout', '.gallery-image', function(e) {
        $(this).find('.btn-action').hide();
      });

    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\honey\resources\views/admin/pages/cms_products/create.blade.php ENDPATH**/ ?>