<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $icon = $block->icon ?? '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
    $params['status'] = App\Consts::TAXONOMY_STATUS['active'];
    $params['taxonomy'] = App\Consts::TAXONOMY['product'];
    
    $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params)
    ->limit(12)
    ->get();
  ?>

  <div id="category" class="section bg-transparent my-0 pt-0">
    <div class="container">
      <div class="fancy-title title-border title-center mb-4">
        <h2><?php echo e($title); ?></h2>
      </div>
      <div class="row">
        <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->json_params->image ?? '';
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            // Viet ham xu ly lay slug
            // $alias = route(App\Consts::ROUTE_POST['product'], ['alias_category' => $item->alias ?? Str::slug($item->title)]);
            $alias = $item->alias ?? '';
            $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $title, $item->id);
          ?>

          <div class="col-lg-2 col-md-3 col-sm-6">
            <a href="<?php echo e($alias_category); ?>">
              <div class="category-item">
                <div class="category-img">
                  <img class="lazyload"
                    src="<?php echo e(asset('images/lazyload.gif')); ?>"
                    data-src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>"
                  />
                </div>
                <h3><?php echo e($title); ?></h3>
              </div>
            </a>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\honey\resources\views/frontend/blocks/custom/styles/category.blade.php ENDPATH**/ ?>