@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $background = $block->image_background != '' ? $block->image_background : url('assets/img/banner.jpg');
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
    $params['status'] = App\Consts::POST_STATUS['active'];
    $params['is_featured'] = true;
    $params['is_type'] = App\Consts::POST_TYPE['post'];
    
    $rows = App\Http\Services\ContentService::getCmsPost($params)
        ->limit(4)
        ->get();
  @endphp

  <section id="post">
    <div class="container">
      <h2 class="text-uppercase bold text-center mb-5">{{ $title }}</h2>
      <div class="row">
        @foreach ($rows as $item)
          @php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $content = $item->json_params->content->{$locale} ?? $item->content;
            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
            // $date = date('H:i d/m/Y', strtotime($item->created_at));
            $date = date('d', strtotime($item->created_at));
            $month = date('M', strtotime($item->created_at));
            $year = date('Y', strtotime($item->created_at));
            // Viet ham xu ly lay slug
            $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
            $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
          @endphp

          <div class="col-lg-3 col-md-3 col-6 px-3 mb-3">
            <a href="{{ $alias }}" class="product-img">
              <img class="lazyload img-fluid"
                    src="{{ asset('images/lazyload.gif')}}"
                    data-src="{{ $image }}" alt="{{ $title }}"
                  />
            </a>
            <p class="my-3 date">Thứ 3 26/06/2023</p>
            <a href="{{ $alias }}" class="d-block bold my-3">{{ $title }}</a>
            <p class="desc">
              {{ Str::limit($brief, 120) }}
            </p>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endif
