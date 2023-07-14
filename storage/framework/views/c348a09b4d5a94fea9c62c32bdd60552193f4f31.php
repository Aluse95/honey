

<?php
  $page_title = $taxonomy->title ?? ($page->title ?? $page->name);
  $seo_title = $page_title . (isset($params['keyword']) && $params['keyword'] != '' ? ': ' . $params['keyword'] : '');
  
  $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
?>
<?php $__env->startPush('style'); ?>
  <style>

  </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
  
  <section id="page-title" class="page-title-parallax page-title-center page-title"
    style="background-image: url('<?php echo e(asset('images/background-img.jpg')); ?>'); background-size: cover;"
    data-bottom-top="background-position:0px 300px;" data-top-bottom="background-position:0px -300px;">
    <div id="particles-line"></div>

    <div class="container clearfix mt-4">
      
      <ol class="breadcrumb d-none">
        <li class="breadcrumb-item"><a href="<?php echo e(route('frontend.home')); ?>"><?php echo app('translator')->get('Home'); ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo e($page_title ?? ''); ?></li>
      </ol>
      <h1 class="">
        <?php echo e($page_title); ?>

        <?php if(isset($params['keyword']) && $params['keyword'] != ''): ?>
          <?php echo ': ' . $params['keyword']; ?>

        <?php endif; ?>
      </h1>
    </div>
  </section>

  <section id="content">
    <div class="content-wrap">
      <div class="container mb-3">
        <div class="row mb-5">
          <div class="postcontent col-lg-9 py-5">
            <div class="row">
              <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                  $id = $item->id;
                  $title = $item->json_params->title->{$locale} ?? $item->title;
                  $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                  $price = $item->json_params->price ?? $item->price;
                  $price_old = $item->json_params->price_old ?? $item->price_old;
                  $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
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
                        <div class="add-to-cart button-cart" data-id="<?php echo e($id); ?>">Thêm vào giỏ</div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php echo e($posts->withQueryString()->links('frontend.pagination.default')); ?>

            </div>
          </div>
          <?php echo $__env->make('frontend.components.sidebar.product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
      </div>
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\honey\resources\views/frontend/pages/search/index.blade.php ENDPATH**/ ?>