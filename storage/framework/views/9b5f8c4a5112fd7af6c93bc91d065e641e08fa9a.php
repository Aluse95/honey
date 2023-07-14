

<?php
$page_title = $taxonomy->title ?? ($page->title ?? ($page->name ?? ''));
$image_background = $web_information->image->background_breadcrumbs ?? ($taxonomy->json_params->image_background ?? '');
?>

<?php $__env->startSection('content'); ?>
  

  <section id="page-title" style="background-image: url('<?php echo e($image_background); ?>'); background-size: cover;"
    data-bottom-top="background-position:0px 300px;" data-top-bottom="background-position:0px -300px;">
    <div id="particles-line"></div>
    <div class="container clearfix">
      <h1 class="text-center"><?php echo e($page_title); ?></h1>
    </div>
  </section>

  <section id="content">
    <div class="content-wrap">
      <div class="container py-5">
        <?php if(session('cart')): ?>
          <table class="table cart mb-5">
            <thead>
              <tr>
                <th class="cart-product-remove">&nbsp;</th>
                <th class="cart-product-thumbnail">&nbsp;</th>
                <th class="cart-product-name"><?php echo app('translator')->get('Product'); ?></th>
                <th class="cart-product-name"><?php echo app('translator')->get('Size'); ?></th>
                <th class="cart-product-price"><?php echo app('translator')->get('Price'); ?> </th>
                <th class="cart-product-quantity"><?php echo app('translator')->get('Quantity'); ?></th>
                <th class="cart-product-subtotal"><?php echo app('translator')->get('Total'); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php $total = 0;?>
              <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                  $total += $details['price'] * $details['quantity'];
                  $alias_detail = Str::slug($details['title']);
                  $url_link = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $alias_detail, $id, 'detail', 'san-pham');
                ?>
                <tr class="cart_item" data-id="<?php echo e($id); ?>">
                  <td class="cart-product-remove">
                    <a href="javascript:void(0)" class="remove remove-from-cart" title="<?php echo app('translator')->get('Remove this item'); ?>">
                      <i class="fa-solid fa-trash-can"></i>
                    </a>
                  </td>
                  <td class="cart-product-thumbnail">
                    <a href="<?php echo e($url_link); ?>">
                      <img width="64" height="64" src="<?php echo e($details['image_thumb'] ?? $details['image']); ?>"
                        alt="<?php echo e($details['title']); ?>">
                    </a>
                  </td>
                  <td class="cart-product-name">
                    <a href="<?php echo e($url_link); ?>"><?php echo e($details['title']); ?></a>
                  </td>
                  <td class="cart-product-size">
                    <span class="amount">
                      <?php echo e($details['size'] ?? ''); ?> g
                    </span>
                  </td>
                  <td class="cart-product-price">
                    <span class="amount">
                      <?php echo e(isset($details['price']) && $details['price'] > 0 ? number_format($details['price']) : __('Contact')); ?>

                    </span>
                  </td>
                  <td class="cart-product-quantity">
                    <div class="quantity d-flex">
                      <input type="button" value="-" class="minus">
                      <input type="text" name="quantity" value="<?php echo e($details['quantity']); ?>" autocomplete="off"
                        class="qty update-cart" />
                      <input type="button" value="+" class="plus">
                    </div>
                  </td>
                  <td class="cart-product-subtotal">
                    <span class="amount"><?php echo e(number_format($details['price'] * $details['quantity'])); ?></span>
                  </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <tr class="cart_item">
                <td colspan="5">
                  <div class="row justify-content-between my-4">
                    <div class="col-lg-12">
                      <a href="<?php echo e(url()->current()); ?>" class="button btn-update m-0"><?php echo app('translator')->get('Update Cart'); ?></a>
                    </div>
                  </div>
                </td>
                <td class="cart-product-subtotal">
                  <span class="amount text-danger">
                    <strong>
                      <?php echo e(number_format($total)); ?>

                    </strong>
                  </span>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="row col-mb-30">
            <div class="col-lg-12">
              <h4 class="text-uppercase mb-4"><?php echo app('translator')->get('Submit Order Cart'); ?></h4>
              <form class="row" method="POST" action="<?php echo e(route('frontend.order.store.product')); ?>">
                <?php echo csrf_field(); ?>
                <div class="col-md-4 form-group">
                  <label for="name"><?php echo app('translator')->get('Fullname'); ?> <small class="text-danger">*</small></label>
                  <input type="text" class="sm-form-control" placeholder="<?php echo app('translator')->get('Fullname'); ?> *" id="name"
                    name="name" required value="<?php echo e($user_auth->name ?? old('name')); ?>" />
                </div>
                <div class="col-md-4 form-group">
                  <label for="email"><?php echo app('translator')->get('Email'); ?></label>
                  <input type="email" class="sm-form-control" placeholder="<?php echo app('translator')->get('Email'); ?>" id="email"
                    name="email" value="<?php echo e($user_auth->email ?? old('email')); ?>" />
                </div>
                <div class="col-md-4 form-group">
                  <label for="phone"><?php echo app('translator')->get('Phone'); ?> <small class="text-danger">*</small></label>
                  <input type="text" class="sm-form-control" placeholder="<?php echo app('translator')->get('Phone'); ?> *" id="phone"
                    name="phone" required value="<?php echo e($user_auth->phone ?? old('phone')); ?>" />
                </div>
                <div class="col-md-4 form-group mt-4">
                  <label for="affiliate_code"><?php echo app('translator')->get('Affiliate code'); ?></label>
                  <input type="text" id="affiliate_code" name="affiliate_code"
                    value="<?php echo e($user_auth->affiliate_code ?? old('affiliate_code')); ?>" class="sm-form-control"
                    placeholder="<?php echo app('translator')->get('Affiliate code'); ?>" />
                </div>
                <div class="col-md-8 form-group mt-4">
                  <label for="address"><?php echo app('translator')->get('Address'); ?></label>
                  <input type="text" class="sm-form-control" placeholder="<?php echo app('translator')->get('Address'); ?>" id="address"
                    name="address" value="<?php echo e(old('address')); ?>" />
                </div>

                <div class="col-md-12 form-group mt-4">
                  <label for="customer_note"><?php echo app('translator')->get('Content note'); ?></label>
                  <textarea id="customer_note" name="customer_note" rows="5" cols="30"
                    placeholder="<?php echo app('translator')->get('Content note'); ?>" autocomplete="off"><?php echo e(old('customer_note')); ?></textarea>
                </div>
                <div class="col-12 form-group">
                  <button type="submit" class="button btn-update mt-5"><?php echo app('translator')->get('Submit Order'); ?></button>
                </div>
              </form>
            </div>
          </div>
        <?php else: ?>
          <div class="row">
            <div class="col-lg-12">
              <div class="style-msg alertmsg">
                <div class="sb-msg">
                  <i class="icon-warning-sign"></i>
                  <strong><?php echo app('translator')->get('Warning!'); ?></strong>
                  <?php echo app('translator')->get('Cart is empty!'); ?>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\honey\resources\views/frontend/pages/cart/index.blade.php ENDPATH**/ ?>