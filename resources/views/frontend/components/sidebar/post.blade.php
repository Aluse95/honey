<div class="sidebar col-lg-3">
  <div>
    @php
      $params_taxonomy['status'] = App\Consts::TAXONOMY_STATUS['active'];
      $params_taxonomy['taxonomy'] = App\Consts::TAXONOMY['post'];
      
      $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params_taxonomy)->get();
    @endphp
    @isset($taxonomys)
      <div class="post-category">
        <h4>@lang('Post category')</h4>
        <ul class="list-unstyled">
          @foreach ($taxonomys as $item)
            @if ($item->parent_id == 0 || $item->parent_id == null)
              @php
                $title = $item->json_params->title->{$locale} ?? $item->title;
                $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id);
                
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

                    $alias_category_sub = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $sub->alias ?? $title_sub, $sub->id);
                    
                    $current = $alias_category_sub == $url_current ? 'current-nav-item' : '';
                  @endphp
                  <li class="{{ $current }}">
                    <i class="fa-solid fa-chevron-right"></i>
                    <a href="{{ $alias_category_sub }}" title="{{ $title_sub }}" class="pl-3">
                      - - {{ Str::limit($title, 100) }}
                    </a>
                  </li>
                @endif
              @endforeach
            @endif
          @endforeach
        </ul>
      </div>
    @endisset

    @php
      $params_product['status'] = App\Consts::POST_STATUS['active'];
      $params_product['is_type'] = App\Consts::POST_TYPE['post'];
      $params_product['order_by'] = 'id';
      
      $recents = App\Http\Services\ContentService::getCmsPost($params_product)
          ->limit(App\Consts::PAGINATE['sidebar'])
          ->get();
    @endphp
    @isset($recents)
      <div class="lastest-post">
        <h4 class="my-4">@lang('Latest post')</h4>
        <div class="posts-sm row">

          @foreach ($recents as $item)
            @php
              $title = $item->json_params->title->{$locale} ?? $item->title;
              $brief = $item->json_params->brief->{$locale} ?? $item->brief;
              $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
              $date = date('H:i d/m/Y', strtotime($item->created_at));
              // Viet ham xu ly lay slug
              $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
            @endphp
            <div class="entry col-12">
              <div class="row">
                <div class="col-lg-3 col-3">
                  <div class="sidebar-image mb-3">
                    <a href="{{ $alias }}">
                      <img class="img-fluid w-100" src="{{ $image }}" alt="{{ Str::limit($title, 50) }}">
                    </a>
                  </div>
                </div>
                <div class="col-lg-9 col-9">
                  <div class="post-title">
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
      $params_product['is_type'] = App\Consts::POST_TYPE['post'];
      $params_product['order_by'] = 'count_visited';
      
      $mostViews = App\Http\Services\ContentService::getCmsPost($params_product)
          ->limit(App\Consts::PAGINATE['sidebar'])
          ->get();
    @endphp
    @isset($mostViews)
      <div class="most-view">
        <h4 class="my-4">@lang('Most viewed post')</h4>
        <div class="row">
          @foreach ($mostViews as $item)
            @php
              $title = $item->json_params->title->{$locale} ?? $item->title;
              $brief = $item->json_params->brief->{$locale} ?? $item->brief;
              $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
              $date = date('H:i d/m/Y', strtotime($item->created_at));
              // Viet ham xu ly lay slug
              $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
            @endphp
            <div class="col-12">
              <div class="row">
                <div class="col-lg-3 col-3">
                  <div class="sidebar-image mb-3">
                    <a href="{{ $alias }}">
                      <img class="img-fluid w-100" src="{{ $image }}" alt="{{ Str::limit($title, 50) }}"></a>
                  </div>
                </div>
                <div class="col-lg-9 col-9">
                  <div class="post-title">
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
