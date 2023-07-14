@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $url_link = $block->json_params->url_link->{$locale} ?? $block->url_link;
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $background = $block->image_background ?? '';
    $rows = App\Models\CmsPost::where('is_type', App\Consts::POST_TYPE['product'])
                      ->where('is_featured', true)
                      ->where('status', 'active')
                      ->limit(4)
                      ->get();
  @endphp

  <style>
    #list-product {
      padding: 60px 0;
      background-size: cover;
      background-image: url('{{ $background }}');
    }
  </style>

  <section id="list-product">
    <div class="container">
      <h2 class="text-uppercase bold text-center mb-5">{{ $brief }}</h2>
      <div class="row pt-4">
        @foreach ($rows as $item)
          @php
            $title_child = $item->json_params->title->{$locale} ?? $item->title;
            $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
            $content_child = $item->json_params->content->{$locale} ?? $item->content;
            $image_child = $item->image ?? '';
            $price= $item->json_params->price ?? '';
            $price_old= $item->json_params->price_old ?? '';
            // $alias_child = $item->alias ?? '';
            $category = App\Models\CmsTaxonomy::where('id', $item->taxonomy_id)->first();
            $alias_child = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $title, $item->id, 'detail', $category->title);
          @endphp

          <div class="col-lg-3 col-md-3 col-6 px-3 mb-3">
            <a href="{{ $alias_child }}" class="product-img">
              <img class="lazyload img-fluid"
                    src="{{ asset('images/lazyload.gif')}}"
                    data-src="{{ $image_child }}" alt="{{ $title_child }}"
                  />
            </a>
            <a href="{{ $alias_child }}" class="d-block bold mt-4 text-center">{{ $title_child }}</a>
            <div class="d-flex align-items-center justify-content-center bold">
              <div class="percent-sale me-3">- {{ round(100 * ($price_old - $price)/$price_old) }}%</div>
              <div class="price">{{ number_format($price) }} đ</div>
              <div class="old-price ms-3">{{ number_format($price_old) }} đ</div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="view-more text-center bold mt-5">
        <a href="{{ $url_link }}">{{ $url_link_title }} <i class="fa-sharp fa-solid fa-chevron-up ms-2"></i></a>
      </div>
    </div>
  </section>
@endif
