<div class="sidebar col-lg-3">
  <div class="sidebar-widgets-wrap">
    <?php
      $params_taxonomy['status'] = App\Consts::TAXONOMY_STATUS['active'];
      $params_taxonomy['taxonomy'] = App\Consts::TAXONOMY['post'];
      
      $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params_taxonomy)->get();
    ?>
    <?php if(isset($taxonomys)): ?>
      <div class="widget widget_links clearfix">

        <h4><?php echo app('translator')->get('Post category'); ?></h4>
        <ul>
          <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($item->parent_id == 0 || $item->parent_id == null): ?>
              <?php
                $title = $item->json_params->title->{$locale} ?? $item->title;
                $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id);
                
                $url_current = url()->full();
                $current = $alias_category == $url_current ? 'current-nav-item' : '';
              ?>
              <li class="<?php echo e($current); ?>">
                <a href="<?php echo e($alias_category); ?>" title="<?php echo e($title); ?>">
                  <?php echo e(Str::limit($title, 100)); ?>

                </a>
              </li>
              <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($sub->parent_id == $item->id): ?>
                  <?php
                    $title_sub = $sub->json_params->title->{$locale} ?? $sub->title;

                    $alias_category_sub = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $sub->alias ?? $title_sub, $sub->id);
                    
                    $current = $alias_category_sub == $url_current ? 'current-nav-item' : '';
                  ?>
                  <li class="<?php echo e($current); ?>">
                    <a href="<?php echo e($alias_category_sub); ?>" title="<?php echo e($title_sub); ?>" class="pl-3">
                      - - <?php echo e(Str::limit($title_sub, 100)); ?>

                    </a>
                  </li>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>

    <?php endif; ?>

    <?php
      $params_product['status'] = App\Consts::POST_STATUS['active'];
      $params_product['is_type'] = App\Consts::POST_TYPE['post'];
      $params_product['order_by'] = 'id';
      
      $recents = App\Http\Services\ContentService::getCmsPost($params_product)
          ->limit(App\Consts::PAGINATE['sidebar'])
          ->get();
    ?>
    <?php if(isset($recents)): ?>
      <div class="widget clearfix">

        <h4><?php echo app('translator')->get('Latest post'); ?></h4>
        <div class="posts-sm row col-mb-30" id="recent-shop-list-sidebar">

          <?php $__currentLoopData = $recents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title = $item->json_params->title->{$locale} ?? $item->title;
              $brief = $item->json_params->brief->{$locale} ?? $item->brief;
              $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
              $date = date('H:i d/m/Y', strtotime($item->created_at));
              // Viet ham xu ly lay slug
              $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
            ?>
            <div class="entry col-12">
              <div class="grid-inner row g-0">
                <div class="col-auto">
                  <div class="entry-image">
                    <a href="<?php echo e($alias); ?>"><img src="<?php echo e($image); ?>" alt="<?php echo e(Str::limit($title, 500)); ?>"></a>
                  </div>
                </div>
                <div class="col ps-3">
                  <div class="entry-title">
                    <h4><a href="<?php echo e($alias); ?>"><?php echo e(Str::limit($title, 50)); ?></a></h4>
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
      $params_product['is_type'] = App\Consts::POST_TYPE['post'];
      $params_product['order_by'] = 'count_visited';
      
      $mostViews = App\Http\Services\ContentService::getCmsPost($params_product)
          ->limit(App\Consts::PAGINATE['sidebar'])
          ->get();
    ?>
    <?php if(isset($mostViews)): ?>
      <div class="widget clearfix">

        <h4><?php echo app('translator')->get('Most viewed post'); ?></h4>
        <div class="posts-sm row col-mb-30" id="recent-shop-list-sidebar">

          <?php $__currentLoopData = $mostViews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title = $item->json_params->title->{$locale} ?? $item->title;
              $brief = $item->json_params->brief->{$locale} ?? $item->brief;
              $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
              $date = date('H:i d/m/Y', strtotime($item->created_at));
              // Viet ham xu ly lay slug
              $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
            ?>
            <div class="entry col-12">
              <div class="grid-inner row g-0">
                <div class="col-auto">
                  <div class="entry-image">
                    <a href="<?php echo e($alias); ?>"><img src="<?php echo e($image); ?>"
                        alt="<?php echo e(Str::limit($title, 500)); ?>"></a>
                  </div>
                </div>
                <div class="col ps-3">
                  <div class="entry-title">
                    <h4><a href="<?php echo e($alias); ?>"><?php echo e(Str::limit($title, 50)); ?></a></h4>
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
<?php /**PATH D:\xampp\htdocs\office\resources\views/frontend/components/sidebar/post.blade.php ENDPATH**/ ?>