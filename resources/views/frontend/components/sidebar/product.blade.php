<div class="sidebar col-lg-3 py-5">
  <div>
    @php
      $params_taxonomy['status'] = App\Consts::TAXONOMY_STATUS['active'];
      $params_taxonomy['taxonomy'] = App\Consts::TAXONOMY['product'];
      
      $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params_taxonomy)->get();
    @endphp
    @isset($taxonomys)
      <div class="product-category">
        <h4>@lang('Product category')</h4>
        <ul class="list-unstyled">
          @foreach ($taxonomys as $item)
            @if ($item->parent_id == 0 || $item->parent_id == null)
              @php
                $title = $item->json_params->title->{$locale} ?? $item->title;
                $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item->id);
                
                $url_current = url()->full();
                $current = $alias_category == $url_current ? 'current-nav-item' : '';
              @endphp
              <li class="{{ $current }}">
                <i class="fa-solid fa-chevron-right"></i>
                <a href="{{ $alias_category }}" title="{{ $title }}">
                  {{ Str::limit($title, 100) }}
                </a>
              </li>
              @foreach ($taxonomys as $sub)
                @if ($sub->parent_id == $item->id)
                  @php
                    $title_sub = $sub->json_params->title->{$locale} ?? $sub->title;
                    $alias_category_sub = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title_sub, $sub->id);
                    
                    $current = $alias_category_sub == $url_current ? 'current-nav-item' : '';
                  @endphp
                  <li class="{{ $current }}">
                    <a href="{{ $alias_category_sub }}" title="{{ $title_sub }}" class="ps-3">
                      {{ Str::limit($title_sub, 100) }}
                    </a>
                  </li>
                @endif
              @endforeach
            @endif
          @endforeach
        </ul>
      </div>

    @endisset
    {{-- <div class="product-filter">
      <h4 class="bold my-3">Lọc sản phẩm</h4>
      <ul class="shop-sorting list-unstyled ps-2">
        <li class="widget-filter-reset active-filter">
          <a href="#" data-sort-by="original-order">Clear</a>
        </li>
        <li>
          <i class="fa-solid fa-chevron-right"></i>
          <a href="#" data-sort-by="name">Tên</a>
        </li>
        <li>
          <i class="fa-solid fa-chevron-right"></i>
          <a href="#"data-sort-by="price_lh">Giá: Thấp đến cao</a>
        </li>
        <li>
          <i class="fa-solid fa-chevron-right"></i>
          <a href="#" data-sort-by="price_hl">Giá: Cao đến thấp</a>
        </li>
      </ul>
    </div> --}}
    @php
      $params_product['status'] = App\Consts::POST_STATUS['active'];
      $params_product['is_type'] = App\Consts::POST_TYPE['product'];
      $params_product['order_by'] = 'id';
      
      $recents = App\Http\Services\ContentService::getCmsPost($params_product)
          ->limit(App\Consts::PAGINATE['sidebar'])
          ->get();
    @endphp
    @isset($recents)
      <div class="lastest-product">
        <h4 class="my-4">@lang('Latest products')</h4>
        <div class="row">
          @foreach ($recents as $item)
            @php
              $title = $item->json_params->title->{$locale} ?? $item->title;
              $brief = $item->json_params->brief->{$locale} ?? $item->brief;
              $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
              $date = date('H:i d/m/Y', strtotime($item->created_at));
              // Viet ham xu ly lay slug
              $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->taxonomy_title, $item->taxonomy_id);
              $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
            @endphp

            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-3 col-3">
                  <div class="sidebar-image mb-3">
                    <a href="{{ $alias }}">
                      <img class="img-fluid w-100" src="{{ $image }}" alt="{{ Str::limit($title, 50) }}">
                    </a>
                  </div>
                </div>
                <div class="col-lg-9 col-9">
                  <div class="product_title">
                    <a href="{{ $alias }}">{{ Str::limit($title, 50) }}</a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    @endisset
    @php
      $params_product['status'] = App\Consts::POST_STATUS['active'];
      $params_product['is_type'] = App\Consts::POST_TYPE['product'];
      $params_product['order_by'] = 'count_visited';
      
      $mostViews = App\Http\Services\ContentService::getCmsPost($params_product)
          ->limit(App\Consts::PAGINATE['sidebar'])
          ->get();
    @endphp
    @isset($mostViews)
      <div class="most-view">
        <h4 class="bold my-4">@lang('Most viewed products')</h4>
        <div class="row">
          @foreach ($mostViews as $item)
            @php
              $title = $item->json_params->title->{$locale} ?? $item->title;
              $brief = $item->json_params->brief->{$locale} ?? $item->brief;
              $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
              $date = date('H:i d/m/Y', strtotime($item->created_at));
              // Viet ham xu ly lay slug
              $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->taxonomy_title, $item->taxonomy_id);
              $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
            @endphp

            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-3 col-3">
                  <div class="sidebar-image mb-3">
                    <a href="{{ $alias }}">
                      <img class="img-fluid w-100" src="{{ $image }}" alt="{{ Str::limit($title, 50) }}">
                    </a>
                  </div>
                </div>
                <div class="col-lg-9 col-9">
                  <div class="product_title">
                    <a href="{{ $alias }}">{{ Str::limit($title, 50) }}</a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    @endisset
  </div>
</div>
