<?php if($block): ?>
  <?php
    $params['status'] = App\Consts::TAXONOMY_STATUS['active'];
    $params['taxonomy'] = App\Consts::TAXONOMY['product'];
    $params['is_featured'] = true;
    $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params)->get();
    $id_reverse = $taxonomys[1]->id ?? '';
  ?>

  <div id="product">
    <?php if($taxonomys): ?>
      <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
          $title = $tax->title ?? $tax->json_params->title->{$locale};
          $alias = $tax->json_params->alias->{$locale} ?? $tax->alias;
          $brief = $tax->json_params->brief->{$locale} ?? $tax->brief;
          $image_background = $tax->json_params->image_background ?? '';
          $products = App\Models\CmsPost::where('is_type', App\Consts::POST_TYPE['product'])
                      ->where('taxonomy_id', $tax->id)
                      ->take(8)->get();
          $row = '';
          if($id_reverse) {
            $row = $tax->id == $id_reverse ? 'row flex-row-reverse' : 'row';
          }
        ?>
        <div class="section bg-transparent my-0 pt-0">
          <div class="container">
            <div class="fancy-title title-border title-center mb-4">
              <h2>Các loại <span class="text-lowercase" style="color: #444"><?php echo e($title); ?></span></h2>
            </div>
            <div class="<?php echo e($row); ?>">
              <div class="col-lg-4 col-sm-12">
                <div class="product-banner">
                  <div class="product-banner-img">
                    <img class="lazyload"
                      src="<?php echo e(asset('images/lazyload.gif')); ?>"
                      data-src="<?php echo e($image_background); ?>" alt="<?php echo e($title); ?>"
                    />
                  </div>
                  <div class="product-banner-text">
                    <h3><?php echo e($brief); ?></h3>
                    <a href="<?php echo e($alias); ?>" class="button"
                      >Xem tất cả
                      <i class="icon-line-arrow-right"></i>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-8 col-sm-12">
                <div class="row grid-4">
                  <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                      $id = $item->id;
                      $title_child = $item->json_params->title->{$locale} ?? $item->title;
                      $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                      $content_child = $item->json_params->content->{$locale} ?? $item->content;
                      $image_child = $item->image ?? '';
                      $price= $item->json_params->price ?? '';
                      $price_old= $item->json_params->price_old ?? '';
                      $alias_child = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $title, $item->id, 'detail', $tax->title);
                    ?>

                    <div class="col-lg-3 col-md-3 col-6 px-2">
                      <div class="product">
                        <div class="product-image">
                          <a href="<?php echo e($alias_child); ?>">
                            <img class="lazyload"
                            src="<?php echo e(asset('images/lazyload.gif')); ?>"
                            data-src="<?php echo e($image_child); ?>" alt="<?php echo e($title_child); ?>"/>
                          </a>
                          <div
                            class="bg-overlay-content align-items-end justify-content-between"
                            data-hover-animate="fadeIn"
                            data-hover-speed="400"
                          >
                            <div class="add-to-cart btn btn-dark me-2" data-id="<?php echo e($id); ?>"
                              ><i class="icon-shopping-basket"></i
                            ></div>
                          </div>
                        </div>
                        <div class="product-desc">
                          <div class="product-title mb-1">
                            <h3><a href="<?php echo e($alias_child); ?>"><?php echo e($title_child); ?></a></h3>
                          </div>
                          <div class="product-price font-primary">
                            <ins><?php echo e(number_format($price, 0, ',','.') . ' đ'); ?></ins>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
  </div>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\office\resources\views/frontend/blocks/cms_product/styles/default.blade.php ENDPATH**/ ?>