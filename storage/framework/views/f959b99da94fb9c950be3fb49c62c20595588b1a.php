

<?php
  $page_title = $taxonomy->title ?? ($page->title ?? $page->name);
  $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
  $title = $taxonomy->json_params->title->{$locale} ?? ($taxonomy->title ?? null);
  $image = $taxonomy->json_params->image ?? null;
  $seo_title = $taxonomy->json_params->seo_title ?? $title;
  $seo_keyword = $taxonomy->json_params->seo_keyword ?? null;
  $seo_description = $taxonomy->json_params->seo_description ?? null;
  $seo_image = $image ?? null;
?>

<?php $__env->startSection('content'); ?>
  
  <section id="page-title">
    <div class="container text-center">
      <h1><?php echo e($page_title); ?></h1>
      <p class="mt-4 mb-0"><?php echo app('translator')->get('Home'); ?> / <?php echo e($page_title); ?></p>
    </div>
  </section>

  <section id="content">
    <div class="content-wrap">
      <div class="container mb-3">
        <div class="row my-5">
          <div class="postcontent col-lg-9">
            <div class="row">
              <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                  $title = $item->json_params->title->{$locale} ?? $item->title;
                  $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                  $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                  // $date = date('H:i d/m/Y', strtotime($item->created_at));
                  $date = date('d', strtotime($item->created_at));
                  $month = date('M', strtotime($item->created_at));
                  $year = date('Y', strtotime($item->created_at));
                  // Viet ham xu ly lay slug
                  $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
                  $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
                ?>
                <div class="col-md-6">
                  <article class="mb-5">
                    <div class="article-image mb-4">
                      <a href="<?php echo e($alias); ?>">
                        <img class="img-fluid w-10" src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>">
                      </a>
                    </div>
                    <div class="article-title bold">
                      <h3>
                        <a href="<?php echo e($alias); ?>"><?php echo e($title); ?></a>
                      </h3>
                    </div>
                    <div class="article-infor">
                      <ul class="list-unstyled d-flex align-items-center mt-3">
                        <li class="me-3">
                          <i class="fa-solid fa-folder"></i>
                          <a href="<?php echo e($alias_category); ?>">
                            <?php echo e($item->taxonomy_title); ?>

                          </a>
                        </li>
                        <li>
                          <i class="fa-solid fa-calendar-xmark"></i> 
                          <?php echo e($date); ?> <?php echo e($month); ?> <?php echo e($year); ?>

                        </li>
                      </ul>
                    </div>
                    <div class="article-content">
                      <p><?php echo e(Str::limit($brief, 100)); ?></p>
                    </div>
                  </article>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php echo e($posts->withQueryString()->links('frontend.pagination.default')); ?>

            </div>
          </div>
          <?php echo $__env->make('frontend.components.sidebar.post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
      </div>
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\honey\resources\views/frontend/pages/post/category.blade.php ENDPATH**/ ?>