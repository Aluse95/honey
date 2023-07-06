<div id="footer">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-6 mb-4">
        <div class="logo-footer">
          <img class="img-fluid w-100" src="<?php echo e($web_information->image->logo_footer ?? ''); ?>" alt="logo">
        </div>
        <div class="px-3">
          <div class="mt-4">Địa chỉ: <?php echo e($web_information->information->address ?? ''); ?></div>
          <div class="mt-3">Điện thoại: <?php echo e($web_information->information->phone ?? ''); ?></div>
          <div class="mt-3">Email: <?php echo e($web_information->information->email ?? ''); ?></div>
          <div class="mt-3">Hệ thống chi nhánh</div>
        </div>
      </div>
      <?php if(isset($menu)): ?>
        <?php
          $footer_menu = $menu->filter(function ($item, $key) {
              return $item->menu_type == 'footer' && ($item->parent_id == null || $item->parent_id == 0);
          });
          
          $content = '';
          foreach ($footer_menu as $main_menu) {
              $url = $title = '';
              $title = isset($main_menu->json_params->title->{$locale}) && $main_menu->json_params->title->{$locale} != '' ? $main_menu->json_params->title->{$locale} : $main_menu->name;
              $content .= '<div class="col-lg-3 col-md-3 col-6 mb-4"><div class="px-md-5 px-3">';
              $content .= '<h3 class="text-uppercase bold mb-5">' . $title . '</h3>';
              $content .= '<ul class="list-unstyled ms-0">';
              foreach ($menu as $item) {
                if ($item->parent_id == $main_menu->id) {
                  $title = isset($item->json_params->title->{$locale}) && $item->json_params->title->{$locale} != '' ? $item->json_params->title->{$locale} : $item->name;
                  $url = $item->url_link;
      
                  $active = $url == url()->current() ? 'active' : '';
      
                  $content .= '<li class="mb-3"><a href="' . $url . '">' . $title . '</a>';
                  $content .= '</li>';
                }
              }
              $content .= '</ul>';
              $content .= '</div></div>';
          }
          echo $content;
        ?>
      <?php endif; ?>

      <div class="col-lg-3 col-md-3 col-6">
        <div class="px-md-5 px-3">
          <h3 class="text-uppercase bold mb-5">Dịch vụ hỗ trợ</h3>
          <div class="mt-5">
            <img class="img-fluid w-100" src="<?php echo e(asset('images/payment.jpg')); ?>" alt="payment">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php /**PATH D:\xampp\htdocs\honey\resources\views/frontend/blocks/footer/styles/default.blade.php ENDPATH**/ ?>