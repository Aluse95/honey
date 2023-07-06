<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : null;
    $background = $block->image_background != '' ? $block->image_background : null;
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  ?>

  <div id="form" class="section my-4 py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div
            class="row align-items-stretch align-items-center flex-row-reverse"
          >
            <div
              class="col-md-7 min-vh-50"
              style="
                background: url('<?php echo e($background); ?>')
                  center center no-repeat;
                background-size: cover;
                border-radius: 30px;
              "
            ></div>
            <div class="col-md-5">
              <div class="card border-0 py-2">
                <div class="card-body">
                  <h3 class="card-title mb-4 ls0">
                    <?php echo e($title); ?>

                  </h3>
                  <ul class="iconlist ms-3">
                    <?php if($block_childs): ?>
                      <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                          $title_child = $item->json_params->title->{$locale} ?? $item->title;
                        ?>

                        <li>
                          <i class="icon-circle-blank text-black-50"></i>
                          <?php echo e($title_child); ?>

                        </li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                  </ul>
                  <div class="form-result"></div>
                  <form
                    id="widget-subscribe-form"
                    action="<?php echo e(route('frontend.contact.store')); ?>"
                    method="post"
                    class="mt-1 mb-0 d-flex form_ajax"
                  >
                    <?php echo csrf_field(); ?>
                    <input
                      type="email"
                      id="widget-subscribe-form-email"
                      name="email"
                      class="form-control sm-form-control required email"
                      placeholder="Email"
                    />

                    <button
                      class="button nott fw-normal ms-1 my-0"
                      type="submit" id="submit" name="submit" value="submit"
                    >
                      Đăng kí
                    </button>
                    <input type="hidden" name="is_type" value="call_request">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\honey\resources\views/frontend/blocks/form/styles/booking.blade.php ENDPATH**/ ?>