

<?php
  $page_title = $taxonomy->title ?? ($page->title ?? $page->name);
  $image_background = $web_information->image->background_breadcrumbs ?? ($taxonomy->json_params->image_background ?? '');
  $title = $taxonomy->json_params->title->{$locale} ?? ($taxonomy->title ?? null);
  $image = $taxonomy->json_params->image ?? null;
?>

<?php $__env->startSection('content'); ?>
  
  <section id="page-title">
    <div class="container text-center">
      <h1><?php echo e($page_title); ?></h1>
      <p class="mt-4 mb-0"><?php echo app('translator')->get('Home'); ?> / <?php echo e($page_title); ?></p>
    </div>
  </section>

  <section id="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 py-5">
          <div id="shop" class="shop row grid-container gutter-20" data-layout="fitRows">
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $id = $item->id;
                $title = $item->json_params->title->{$locale} ?? $item->title;
                $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                $price = $item->json_params->price ?? null;
                $price_old = $item->json_params->price_old ?? null;
                $image = $item->image_thumb ?? $item->image;
                // $date = date('H:i d/m/Y', strtotime($item->created_at));
                $date = date('d', strtotime($item->created_at));
                $month = date('M', strtotime($item->created_at));
                $year = date('Y', strtotime($item->created_at));
                // Viet ham xu ly lay slug
                $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
                $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
              ?>
  
              <div class="col-lg-4 col-sm-6 px-4">
                <div class="product-detail mb-4">
                  <a href="<?php echo e($alias); ?>" class="product-image d-block p-2">
                    <img class="img-fluid w-100" src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>">
                  </a>
                  <div class="product-desc p-2">
                    <div class="product-title">
                      <h3>
                        <a href="<?php echo e($alias); ?>"><?php echo e($title); ?></a>
                      </h3>
                    </div>
                    <div class="product-price">
                      <ins><?php echo e(number_format($price, 0,',','.') . ' đ'); ?></ins>
                      <?php if($price_old): ?>
                        <del><?php echo e(number_format($price_old, 0,',','.') . ' đ'); ?></del>
                      <?php endif; ?>
                    </div>
                    <div class="product-button d-flex justify-content-between mt-4 mb-2">
                      <a href="<?php echo e($alias); ?>" class="button-detail">Chi tiết</a>
                      <div class="button-cart">Thêm vào giỏ</div>
                    </div>
                  </div>
                </div>
              </div>
              <?php echo e($posts->withQueryString()->links('frontend.pagination.default')); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
        <?php echo $__env->make('frontend.components.sidebar.product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script>
  
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\honey\resources\views/frontend/pages/product/category.blade.php ENDPATH**/ ?>