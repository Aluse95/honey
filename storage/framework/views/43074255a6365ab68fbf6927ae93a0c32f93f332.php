

<?php
  $page_title = $taxonomy->title ?? ($page->title ?? ($page->name ?? ''));
  $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
?>

<?php $__env->startSection('content'); ?>
  
  <section id="page-title">
    <div class="container text-center">
      <h1><?php echo e($page_title); ?></h1>
      <p class="mt-4 mb-0"><?php echo app('translator')->get('Home'); ?> / <?php echo e($page_title); ?></p>
    </div>
  </section>

  

  <section id="contact">
    <div class="content-wrap">
      <div class="container">
        <div class="row">
          <div class="post-content col-lg-9">
            <h3 class="my-5">LIÊN HỆ TRỰC TUYẾN</h3>
            <div class="">
              <div class="form-result"></div>
              <form class="mb-0 form_ajax" method="post" action="<?php echo e(route('frontend.contact.store')); ?>">
                <?php echo csrf_field(); ?>
                <div class="row">
                  <div class="col-md-12 form-group mb-4">
                    <label for="name"><?php echo app('translator')->get('Fullname'); ?> <small class="text-danger">*</small></label><br>
                    <input type="text" id="name" name="name" value="" class="form-control required" required />
                  </div>
                  <div class="col-md-6 form-group">
                    <label for="email">Email <small class="text-danger">*</small></label>
                    <input type="email" id="email" name="email" value=""
                      class="required email form-control" required />
                  </div>
                  <div class="col-md-6 form-group">
                    <label for="phone"><?php echo app('translator')->get('phone'); ?> <small class="text-danger">*</small></label>
                    <input type="text" id="phone" name="phone" value="" class="form-control" required />
                  </div>

                  <div class="col-12 form-group mt-4">
                    <label for="content"><?php echo app('translator')->get('Content'); ?> <small class="text-danger">*</small></label><br>
                    <textarea class="required form-control" id="content" name="content" rows="5" cols="30" required></textarea>
                  </div>
                  <div class="col-12 form-group">
                    <button class="button text-uppercase my-4"
                      type="submit" name="submit" value="submit">
                      <span>Gửi liên hệ</span>
                    </button>
                  </div>
                </div>
                <input type="hidden" name="is_type" value="contact">
              </form>
            </div>
          </div>
          <div class="sidebar col-lg-3 mt-5">
            <address>
              <strong><?php echo app('translator')->get('address'); ?>:</strong><br>
              <?php echo $web_information->information->address ?? ''; ?>

            </address>
            <abbr title="Phone Number">
              <strong><?php echo app('translator')->get('phone'); ?>:</strong>
            </abbr>
            <?php echo $web_information->information->phone ?? ''; ?><br>
            <abbr title="Email Address"><strong>Email:</strong></abbr>
            <?php echo $web_information->information->email ?? ''; ?>

          </div>
        </div>
      </div>
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\honey\resources\views/frontend/pages/contact/index.blade.php ENDPATH**/ ?>