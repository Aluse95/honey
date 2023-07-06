<footer id="footer" class="bg-transparent border-1">
  <div class="container clearfix">
    <div class="footer-widgets-wrap pb-3 border-bottom clearfix">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-12">
          <div class="widget clearfix">
            <h4 class="ls0 mb-3 text-uppercase"><?php echo e($web_information->information->site_name ?? ''); ?></h4>
            <ul class="list-unstyled iconlist ms-0">
              <li>Địa chỉ: <?php echo e($web_information->information->address ?? ''); ?></li>
              <li>Email: <?php echo e($web_information->information->email ?? ''); ?></li>
              <li>Điện thoại: <?php echo e($web_information->information->phone ?? ''); ?></li>
            </ul>
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
                $content .= '<div class="col-lg-2 col-md-2 col-6"><div class="widget clearfix">';
                $content .= '<h4 class="ls0 mb-3 text-uppercase">' . $title . '</h4>';
                $content .= '<ul class="list-unstyled iconlist ms-0">';
                foreach ($menu as $item) {
                  if ($item->parent_id == $main_menu->id) {
                    $title = isset($item->json_params->title->{$locale}) && $item->json_params->title->{$locale} != '' ? $item->json_params->title->{$locale} : $item->name;
                    $url = $item->url_link;
        
                    $active = $url == url()->current() ? 'active' : '';
        
                    $content .= '<li><a href="' . $url . '">' . $title . '</a>';
                    $content .= '</li>';
                  }
                }
                $content .= '</ul>';
                $content .= '</div></div>';
            }
            echo $content;
          ?>
        <?php endif; ?>
        <div class="col-lg-4 col-md-4 col-12">
          <div class="widget clearfix">
            <h4 class="ls0 mb-3 text-uppercase">Hệ thống dịch vụ</h4>
            <?php if($web_information->source_code->map): ?>
              <?php echo $web_information->source_code->map; ?>

            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer><?php /**PATH D:\xampp\htdocs\office\resources\views/frontend/blocks/footer/styles/default.blade.php ENDPATH**/ ?>