<div id="header">
  <div class="header-top" style="background-image: url(<?php echo e(asset('images/header.jpg')); ?>)">
    <div class="wrap-icon">
      <img src="<?php echo e(asset('images/bee.png')); ?>" class="img-fluid w-100 h-100" alt="icon-bee">
    </div>
    <p class="m-0 bold">Cung cấp và phân phối mật ong thiên nhiên</p>
  </div>
  <div class="header-main">
    <div class="container d-flex justify-content-between align-items-center">
      <ul class="header-menu bold d-flex list-unstyled m-0">
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
                  $title = $item->json_params->name->{$locale} ?? $item->name;
                  $url = $item->url_link;

                  $content .= '<li class="menu-item me-5"><a class="menu-link" href="' . $url . '">' . $title . '</a>';
                    if($item->sub > 0) {
                      $content .= '<ul class="sub-container list-unstyled m-0">';
                      foreach ($menu as $item_sub) {
                        $url = $title = '';
                        if($item_sub->parent_id == $item->id) {
                          $title = $item_sub->json_params->name->{$locale} ?? $item_sub->name;
                          $url = $item_sub->url_link;
                          $content .= '<li class="menu-item"><a class="menu-link" href="' . $url . '">' . $title . '</a>';
                          if ($item_sub->sub > 0) {
                            $content .= '<ul class="sub-container sub-menu list-unstyled m-0">';
                            foreach ($menu as $item_sub_2) {
                                $url = $title = '';
                                if ($item_sub_2->parent_id == $item_sub->id) {
                                  $title = $item_sub_2->json_params->name->{$locale} ?? $item_sub_2->name;
                                  $url = $item_sub_2->url_link;

                                  $content .= '<li class="menu-item"><a class="menu-link" href="' . $url . '">' . $title . '</a></li>';
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
      <div class="icon-menu d-md-none">
        <i class="fa-solid fa-bars"></i>
      </div>
      <div id="logo">
        <a href="<?php echo e(route('frontend.home')); ?>" class="header-logo py-3" 
          data-dark-logo="<?php echo e($web_information->image->logo_header ?? ''); ?>"
          ><img
            src="<?php echo e($web_information->image->logo_header ?? ''); ?>"
            class="img-fluid w-100" alt="Header Logo"
        /></a>
      </div>
      <div class="header-info d-flex justify-content-between">
        <p class="hotline bold m-0">HOTLINE: <span><?php echo e($web_information->information->hotline ?? '0123456789'); ?></span></p>
        <?php if(Auth::check()): ?>
          <div>
            <span class="user-infor py-3"><?php echo e(Auth::user()->name); ?>

            </span>
            (<a href="<?php echo e(route('frontend.logout')); ?>"><span>Thoát</span></a>)
          </div>
        <?php else: ?>
          <a href="<?php echo e(route('frontend.login')); ?>">
            <i class="user fa-solid fa-user text-white"></i>
          </a>
        <?php endif; ?>
        <div class="search position-relative">
          <i class="fa-solid fa-magnifying-glass"></i>
          <form class="search-form" action="<?php echo e(route('frontend.search.index')); ?>" method="get">
            <input type="search" name="keyword" placeholder="<?php echo app('translator')->get('Type and hit enter...'); ?>" value="<?php echo e($params['keyword'] ?? ''); ?>"
              class="form-control" />
          </form>
        </div>
        <div class="position-relative">
          <i class=" fa-solid fa-cart-shopping position-relative shopping-cart">
            <div class="cart-number position-absolute"><?php echo e(count((array) session('cart') ?? 0)); ?></div>
          </i>
          <div class="cart-container p-4">
            <h4 class="bold text-uppercase m-0">Shopping Cart</h4>
            <hr>
            <?php $total = 0 ?>
            <?php if(session('cart')): ?>
              <ul class="list-unstyled m-0">
                <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                    $total += $details['price'] * $details['quantity'];
                    $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'],$details['title'], $id, 'detail', 'san-pham');
                  ?>
                  <li class="cart-item mb-3">
                    <div class="row">
                      <div class="col-lg-3 col-3">
                        <a href="<?php echo e($alias); ?>" class="cart-img">
                          <img class="img-fluid w-100 h-100" src="<?php echo e($details['image_thumb'] ?? $details['image']); ?>" alt="<?php echo e($details['title']); ?>">
                        </a>
                      </div>
                      <div class="col-lg-9 col-9 px-0">
                        <a href="<?php echo e($alias); ?>" class="cart-title mb-2"><?php echo e($details['title']); ?></a>
                        <div class="d-flex">
                          <div class="cart-price bold"><?php echo e(isset($details['price']) && $details['price'] > 0 ? number_format($details['price'], 0, ',','.') . ' đ' : __('Contact')); ?></div>
                          <div class="mx-3">x</div>
                          <div class="cart-quantity bold"><?php echo e($details['quantity']); ?></div>
                        </div>
                      </div>
                    </div>
                  </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            <?php endif; ?>
            <a href="<?php echo e(route('frontend.order.cart')); ?>" class="view-cart mt-3">
              <div class="button">Giỏ hàng</div>
              <div class="checkout-price"><?php echo e(number_format($total, 0, ',','.') . ' đ'); ?></div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="overlay">
    <div class="close">
      <i class="fa-solid fa-circle-xmark"></i>
    </div>
  </div>
  <div class="menu-mobile">
    <div class="text-center mb-4">
      <div id="logo">
        <a href="<?php echo e(route('frontend.home')); ?>" class="header-logo py-3" 
          data-dark-logo="<?php echo e($web_information->image->logo_header ?? ''); ?>"
          ><img
            src="<?php echo e($web_information->image->logo_header ?? ''); ?>"
            class="img-fluid w-100" alt="Header Logo"
        /></a>
      </div>
    </div>
    <form class="search-mobile" action="<?php echo e(route('frontend.search.index')); ?>" method="get">
      <input type="search" name="keyword" placeholder="<?php echo app('translator')->get('Type and hit enter...'); ?>" value="<?php echo e($params['keyword'] ?? ''); ?>"
        class="form-control"/>
    </form>
    <ul class=" list-unstyled bold m-0 mt-3">
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
                $title = $item->json_params->name->{$locale} ?? $item->name;
                $url = $item->url_link;

                $content .= '<li class="menu-item py-3"><a class="menu-link" href="' . $url . '">' . $title . '</a>';
                  if($item->sub > 0) {
                    $content .= '<ul class="sub-container list-unstyled m-0">';
                    foreach ($menu as $item_sub) {
                      $url = $title = '';
                      if($item_sub->parent_id == $item->id) {
                        $title = $item_sub->json_params->name->{$locale} ?? $item_sub->name;
                        $url = $item_sub->url_link;
                        $content .= '<li class="menu-item"><a class="menu-link" href="' . $url . '">' . $title . '</a>';
                        if ($item_sub->sub > 0) {
                          $content .= '<ul class="sub-container sub-menu list-unstyled m-0">';
                          foreach ($menu as $item_sub_2) {
                              $url = $title = '';
                              if ($item_sub_2->parent_id == $item_sub->id) {
                                $title = $item_sub_2->json_params->name->{$locale} ?? $item_sub_2->name;
                                $url = $item_sub_2->url_link;

                                $content .= '<li class="menu-item"><a class="menu-link" href="' . $url . '">' . $title . '</a></li>';
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
  </div>
</div>
         



<?php /**PATH D:\xampp\htdocs\honey\resources\views/frontend/blocks/header/styles/default.blade.php ENDPATH**/ ?>