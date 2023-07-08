@extends('frontend.layouts.default')

@php
  $page_title = $taxonomy->title ?? ($page->title ?? $page->name);
  $image_background = $web_information->image->background_breadcrumbs ?? ($taxonomy->json_params->image_background ?? '');
  $title = $taxonomy->json_params->title->{$locale} ?? ($taxonomy->title ?? null);
  $image = $taxonomy->json_params->image ?? null;
@endphp

@section('content')
  {{-- Print all content by [module - route - page] without blocks content at here --}}
  <section id="page-title">
    <div class="container text-center">
      <h1>{{ $page_title }}</h1>
      <p class="mt-4 mb-0">@lang('Home') / {{ $page_title }}</p>
    </div>
  </section>

  <section id="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 py-5">
          <div id="shop" class="shop row grid-container gutter-20" data-layout="fitRows">
            @foreach ($posts as $item)
              @php
                $id = $item->id;
                $title = $item->json_params->title->{$locale} ?? $item->title;
                $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                $price = $item->json_params->price ?? null;
                $price_old = $item->json_params->price_old ?? null;
                $image = $item->image_thumb ?? $item->image;
                // $date = date('H:i d/m/Y', strtotime($item->created_at));
                $date = date('d', strtotime($item->created_at));
                $month = date('M', strtotime($item->created_at));
                $year = date('Y', strtotime($item->created_at));
                // Viet ham xu ly lay slug
                $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
                $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
              @endphp
  
              <div class="col-lg-4 col-sm-6 px-4">
                <div class="product-detail mb-4">
                  <a href="{{ $alias }}" class="product-image d-block p-2">
                    <img class="img-fluid w-100" src="{{ $image }}" alt="{{ $title }}">
                  </a>
                  <div class="product-desc p-2">
                    <div class="product-title">
                      <h3>
                        <a href="{{ $alias }}">{{ $title }}</a>
                      </h3>
                    </div>
                    <div class="product-price">
                      <ins>{{ number_format($price, 0,',','.') . ' đ'  }}</ins>
                      @if ($price_old)
                        <del>{{ number_format($price_old, 0,',','.') . ' đ' }}</del>
                      @endif
                    </div>
                    <div class="product-button d-flex justify-content-between mt-4 mb-2">
                      <a href="{{ $alias }}" class="button-detail">Chi tiết</a>
                      <div class="add-to-cart button-cart" data-id="{{ $id }}">Thêm vào giỏ</div>
                    </div>
                  </div>
                </div>
              </div>
              {{ $posts->withQueryString()->links('frontend.pagination.default') }}
            @endforeach
          </div>
        </div>
        @include('frontend.components.sidebar.product')
      </div>
    </div>
  </section>
@endsection

@push('script')
<script>
  
</script>
@endpush