<header id="header" class="full-header header-size-md">
  <div id="header-wrap">
    <div class="container">
      <div class="header-row justify-content-lg-between">
        <div id="logo" class="me-lg-4">
          <a href="<?php echo e(route('frontend.home')); ?>" data-dark-logo="<?php echo e($web_information->image->logo_header ?? ''); ?>"
            class="standard-logo"><img src="<?php echo e($web_information->image->logo_header ?? ''); ?>" alt="Header Logo" /></a>
          <a href="<?php echo e(route('frontend.home')); ?>" data-dark-logo="<?php echo e($web_information->image->logo_header ?? ''); ?>"
            class="retina-logo"><img src="<?php echo e($web_information->image->logo_header ?? ''); ?>" alt="Header Logo" /></a>
        </div>

        <div class="header-misc">
          <?php if(Auth::check()): ?>
            <i class="icon-line2-user me-1 position-relative"
              style="top: 1px"
            ></i>
            <span class="d-none d-sm-inline-block font-primary fw-medium">
              <span class="user-infor py-3"><?php echo e(Auth::user()->name); ?>

                <ul class="user-detail p-2">
                  <li>
                    <a href="<?php echo e(route('frontend.user')); ?>">Tài khoản của tôi</a>
                  </li>
                  <li>
                    <a href="<?php echo e(route('frontend.user.password')); ?>">Đổi mật khẩu</a>
                  </li>
                </ul>
              </span>
              (<a href="<?php echo e(route('frontend.logout')); ?>"><span>Thoát</span></a>)
            </span>
          <?php else: ?>
            <div id="top-account">
              <a href="#modal-sign-up" data-lightbox="inline"
                ><i
                  class="icon-line2-user me-1 position-relative"
                  style="top: 1px"
                ></i
                ><span class="d-none d-sm-inline-block font-primary fw-medium"
                  ><?php echo app('translator')->get('Login'); ?>
                </span>
              </a>
            </div>
          <?php endif; ?>
          <div id="top-cart" class="header-misc-icon d-none d-sm-block">
            <a href="#" id="top-cart-trigger"
              ><i class="icon-line-bag"></i
              ><span class="top-cart-number"><?php echo e(count((array) session('cart') ?? 0)); ?></span>
            </a>
            <div class="top-cart-content">
              <div class="top-cart-title">
                <h4><?php echo app('translator')->get('Shopping Cart'); ?></h4>
              </div>
              <?php $total = 0 ?>
              <?php if(session('cart')): ?>
                <div class="top-cart-items" style="max-height:400px; overflow:auto">
                  <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                      $total += $details['price'] * $details['quantity'];
                      $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'],$details['title'], $id, 'detail', 'san-pham');
                    ?>
                    <div class="top-cart-item">
                      <div class="top-cart-item-image">
                        <a href="<?php echo e($alias); ?>"
                          ><img src="<?php echo e($details['image_thumb'] ?? $details['image']); ?>"
                          alt="<?php echo e($details['title']); ?>"/>
                        </a>
                      </div>
                      <div class="top-cart-item-desc">
                        <div class="top-cart-item-desc-title">
                          <a href="<?php echo e($alias); ?>"><?php echo e($details['title']); ?></a>
                          <span class="top-cart-item-price d-block"
                            ><del><?php echo e(isset($details['price_old']) && $details['price_old'] > 0 ? number_format($details['price_old'], 0, ',','.') . ' đ' : ""); ?></del> <?php echo e(isset($details['price']) && $details['price'] > 0 ? number_format($details['price'], 0, ',','.') . ' đ' : __('Contact')); ?></span
                          >
                        </div>
                        <div class="top-cart-item-quantity">x <?php echo e($details['quantity']); ?></div>
                      </div>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              <?php endif; ?>
              <div class="top-cart-action">
                <span class="top-checkout-price"><?php echo e(number_format($total, 0, ',','.') . ' đ'); ?></span>
                <a href="<?php echo e(route('frontend.order.cart')); ?>" class="button button-3d button-small m-0"
                  ><?php echo app('translator')->get('View Cart'); ?>
                </a>
              </div>
            </div>
          </div>

          <div id="top-search" class="header-misc-icon">
            <a href="#" id="top-search-trigger"
              ><i class="icon-line-search"></i
              ><i class="icon-line-cross"></i
            ></a>
          </div>
        </div>

        <div id="primary-menu-trigger">
          <svg class="svg-trigger" viewBox="0 0 100 100">
            <path
              d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"
            ></path>
            <path d="m 30,50 h 40"></path>
            <path
              d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"
            ></path>
          </svg>
        </div>
        <!-- Primary Navigation
      ============================================= -->
        <nav class="primary-menu with-arrows me-lg-auto">
          <ul class="menu-container">
            <?php if(isset($menu)): ?>
            <?php
            $main_menu = $menu->first(function ($item, $key) {
                return $item->menu_type == 'header' && ($item->parent_id == null || $item->parent_id == 0);
            });
            if ($main_menu) {
                $content = '';
                foreach ($menu as $item) {
                    $url = $title = '';
                    if ($item->parent_id == $main_menu->id) {
                        $title = isset($item->json_params->title->{$locale}) && $item->json_params->title->{$locale} != '' ? $item->json_params->title->{$locale} : $item->name;
                        $url = $item->url_link;
                        $active = $url == url()->full() ? 'current' : '';

                        $content .= '<li class="menu-item ' . $active . '"><a class="menu-link" href="' . $url . '"><div>' . $title . '</div></a>';
                          if($item->sub > 0) {
                            $content .= '<ul class="sub-menu-container">';
                            foreach ($menu as $item_sub) {
                              $url = $title = '';
                              if($item_sub->parent_id == $item->id) {
                                $title = isset($item_sub->json_params->title->{$locale}) && $item_sub->json_params->title->{$locale} != '' ? $item_sub->json_params->title->{$locale} : $item_sub->name;
                                $url = $item_sub->url_link;
                                $content .= '<li class="menu-item"><a class="menu-link" href="' . $url . '"><div>' . $title . '</div></a>';
                                if ($item_sub->sub > 0) {
                                  $content .= '<ul class="sub-menu-container">';
                                  foreach ($menu as $item_sub_2) {
                                      $url = $title = '';
                                      if ($item_sub_2->parent_id == $item_sub->id) {
                                          $title = isset($item_sub_2->json_params->title->{$locale}) && $item_sub_2->json_params->title->{$locale} != '' ? $item_sub_2->json_params->title->{$locale} : $item_sub_2->name;
                                          $url = $item_sub_2->url_link;
      
                                          $content .= '<li class="menu-item"><a class="menu-link" href="' . $url . '"><div>' . $title . '</div></a></li>';
                                      }
                                  }
                                  $content .= '</ul>';
                                }
                                $content .= '</li>';
                              }
                            }
                            $content .= '</ul>';
                          }
                        $content .= '</li>';
                    }
                }
                echo $content;
            }
          ?>
            <?php endif; ?>
          </ul>
        </nav>
        <form class="top-search-form" action="<?php echo e(route('frontend.search.index')); ?>" method="get">
          <input type="search" name="keyword" placeholder="<?php echo app('translator')->get('Type and hit enter...'); ?>" value="<?php echo e($params['keyword'] ?? ''); ?>"
            class="form-control" />
        </form>
      </div>
    </div>
  </div>
  <div class="header-wrap-clone"></div>
</header>
<?php if(!Auth::guard('web')->check()): ?>
  <?php echo $__env->make('frontend.components.popup.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>


<?php /**PATH D:\xampp\htdocs\office\resources\views/frontend/blocks/header/styles/default.blade.php ENDPATH**/ ?>