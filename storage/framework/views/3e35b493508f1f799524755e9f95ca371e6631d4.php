<div class="sidebar col-lg-3 py-5">
  <div>
    <?php
      $params_taxonomy['status'] = App\Consts::TAXONOMY_STATUS['active'];
      $params_taxonomy['taxonomy'] = App\Consts::TAXONOMY['product'];
      
      $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params_taxonomy)->get();
    ?>
    <?php if(isset($taxonomys)): ?>
      <div class="product-category">
        <h4><?php echo app('translator')->get('Product category'); ?></h4>
        <ul class="list-unstyled">
          <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($item->parent_id == 0 || $item->parent_id == null): ?>
              <?php
                $title = $item->json_params->title->{$locale} ?? $item->title;
                $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item->id);
                
                $url_current = url()->full();
                $current = $alias_category == $url_current ? 'current-nav-item' : '';
              ?>
              <li class="<?php echo e($current); ?>">
                <i class="fa-solid fa-chevron-right"></i>
                <a href="<?php echo e($alias_category); ?>" title="<?php echo e($title); ?>">
                  <?php echo e(Str::limit($title, 100)); ?>

                </a>
              </li>
              <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($sub->parent_id == $item->id): ?>
                  <?php
                    $title_sub = $sub->json_params->title->{$locale} ?? $sub->title;
                    $alias_category_sub = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title_sub, $sub->id);
                    
                    $current = $alias_category_sub == $url_current ? 'current-nav-item' : '';
                  ?>
                  <li class="<?php echo e($current); ?>">
                    <a href="<?php echo e($alias_category_sub); ?>" title="<?php echo e($title_sub); ?>" class="ps-3">
                      <?php echo e(Str::limit($title_sub, 100)); ?>

                    </a>
                  </li>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>

    <?php endif; ?>
    <div class="product-filter">
      <h4 class="bold my-3">Lọc sản phẩm</h4>
      <ul class="shop-sorting list-unstyled ps-2">
        <li class="widget-filter-reset active-filter">
          <a href="#" data-sort-by="original-order">Clear</a>
        </li>
        <li>
          <i class="fa-solid fa-chevron-right"></i>
          <a href="#" data-sort-by="name">Tên</a>
        </li>
        <li>
          <i class="fa-solid fa-chevron-right"></i>
          <a href="#"data-sort-by="price_lh">Giá: Thấp đến cao</a>
        </li>
        <li>
          <i class="fa-solid fa-chevron-right"></i>
          <a href="#" data-sort-by="price_hl">Giá: Cao đến thấp</a>
        </li>
      </ul>
    </div>
    <?php
      $params_product['status'] = App\Consts::POST_STATUS['active'];
      $params_product['is_type'] = App\Consts::POST_TYPE['product'];
      $params_product['order_by'] = 'id';
      
      $recents = App\Http\Services\ContentService::getCmsPost($params_product)
          ->limit(App\Consts::PAGINATE['sidebar'])
          ->get();
    ?>
    <?php if(isset($recents)): ?>
      <div class="lastest-product">
        <h4 class="my-4"><?php echo app('translator')->get('Latest products'); ?></h4>
        <div class="row">
          <?php $__currentLoopData = $recents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title = $item->json_params->title->{$locale} ?? $item->title;
              $brief = $item->json_params->brief->{$locale} ?? $item->brief;
              $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
              $date = date('H:i d/m/Y', strtotime($item->created_at));
              // Viet ham xu ly lay slug
              $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->taxonomy_title, $item->taxonomy_id);
              $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
            ?>

            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-3 col-3">
                  <div class="sidebar-image mb-3">
                    <a href="<?php echo e($alias); ?>">
                      <img class="img-fluid w-100" src="<?php echo e($image); ?>" alt="<?php echo e(Str::limit($title, 50)); ?>">
                    </a>
                  </div>
                </div>
                <div class="col-lg-9 col-9">
                  <div class="product_title">
                    <a href="<?php echo e($alias); ?>"><?php echo e(Str::limit($title, 50)); ?></a>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    <?php endif; ?>
    <?php
      $params_product['status'] = App\Consts::POST_STATUS['active'];
      $params_product['is_type'] = App\Consts::POST_TYPE['product'];
      $params_product['order_by'] = 'count_visited';
      
      $mostViews = App\Http\Services\ContentService::getCmsPost($params_product)
          ->limit(App\Consts::PAGINATE['sidebar'])
          ->get();
    ?>
    <?php if(isset($mostViews)): ?>
      <div class="most-view">
        <h4 class="bold my-4"><?php echo app('translator')->get('Most viewed products'); ?></h4>
        <div class="row">
          <?php $__currentLoopData = $mostViews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title = $item->json_params->title->{$locale} ?? $item->title;
              $brief = $item->json_params->brief->{$locale} ?? $item->brief;
              $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
              $date = date('H:i d/m/Y', strtotime($item->created_at));
              // Viet ham xu ly lay slug
              $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->taxonomy_title, $item->taxonomy_id);
              $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
            ?>

            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-3 col-3">
                  <div class="sidebar-image mb-3">
                    <a href="<?php echo e($alias); ?>">
                      <img class="img-fluid w-100" src="<?php echo e($image); ?>" alt="<?php echo e(Str::limit($title, 50)); ?>">
                    </a>
                  </div>
                </div>
                <div class="col-lg-9 col-9">
                  <div class="product_title">
                    <a href="<?php echo e($alias); ?>"><?php echo e(Str::limit($title, 50)); ?></a>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>
<?php /**PATH D:\xampp\htdocs\honey\resources\views/frontend/components/sidebar/product.blade.php ENDPATH**/ ?>