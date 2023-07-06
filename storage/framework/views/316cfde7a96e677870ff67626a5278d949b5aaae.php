<!DOCTYPE html>
<html lang="<?php echo e($locale ?? 'vi'); ?>">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?php echo e($seo_title ?? ($page->title ?? ($web_information->information->seo_title ?? ''))); ?>

  </title>
  <link rel="icon" href="<?php echo e($web_information->image->favicon ?? ''); ?>" type="image/x-icon">
  
  <?php
    $seo_title = $seo_title ?? ($page->title ?? ($web_information->information->seo_title ?? ''));
    $seo_keyword = $seo_keyword ?? ($page->keyword ?? ($web_information->information->seo_keyword ?? ''));
    $seo_description = $seo_description ?? ($page->description ?? ($web_information->information->seo_description ?? ''));
    $seo_image = $seo_image ?? ($page->json_params->og_image ?? ($web_information->image->seo_og_image ?? ''));
  ?>
  <meta name="description" content="<?php echo e($seo_description); ?>" />
  <meta name="keywords" content="<?php echo e($seo_keyword); ?>" />
  <meta name="news_keywords" content="<?php echo e($seo_keyword); ?>" />
  <meta property="og:image" content="<?php echo e($seo_image); ?>" />
  <meta property="og:title" content="<?php echo e($seo_title); ?>" />
  <meta property="og:description" content="<?php echo e($seo_description); ?>" />
  <meta property="og:url" content="<?php echo e(Request::fullUrl()); ?>" />

  <meta name="copyright" content="<?php echo e($web_information->information->site_name ?? ''); ?>" />
  <meta name="author" content="<?php echo e($web_information->information->site_name ?? ''); ?>" />
  <meta name="robots" content="index,follow" />
  
  
  
  <?php echo $__env->make('frontend.panels.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
  <?php echo $__env->yieldPushContent('style'); ?>

  <?php echo $__env->yieldPushContent('schema'); ?>
</head>

<body>
  <div class="app">

    <?php echo $__env->make('frontend.blocks.header.styles.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div id="content">
      
      <?php if(isset($blocks_selected)): ?>
        <?php $__currentLoopData = $blocks_selected; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
          <?php if(\View::exists('frontend.blocks.' . $block->block_code . '.index')): ?>
            <?php echo $__env->make('frontend.blocks.' . $block->block_code . '.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <?php else: ?>
            <?php echo e('View: frontend.blocks.' . $block->block_code . '.index do not exists!'); ?>

          <?php endif; ?>
    
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>

    </div>
  
    <?php echo $__env->make('frontend.blocks.footer.styles.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  </div>
  
  <?php echo $__env->make('frontend.components.sticky.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
  <?php echo $__env->make('frontend.panels.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
  <?php echo $__env->yieldPushContent('script'); ?>
  
  <?php echo $__env->yieldPushContent('js_filter'); ?>
  
  <?php echo $__env->make('frontend.components.sticky.contact', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  
  <?php echo $__env->make('frontend.components.popup.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html>
<?php /**PATH D:\xampp\htdocs\honey\resources\views/frontend/layouts/default.blade.php ENDPATH**/ ?>