@extends('frontend.layouts.default')

@php
  $page_title = $taxonomy->title ?? ($page->title ?? $page->name);
  $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
  
  $title = $taxonomy->json_params->title->{$locale} ?? ($taxonomy->title ?? null);
  $image = $taxonomy->json_params->image ?? null;
  $seo_title = $taxonomy->json_params->seo_title ?? $title;
  $seo_keyword = $taxonomy->json_params->seo_keyword ?? null;
  $seo_description = $taxonomy->json_params->seo_description ?? null;
  $seo_image = $image ?? null;
@endphp
@push('style')
  <style>
    .page-title-area {
      background-image: url('{{ $image_background }}');
      background-position: center center;
      background-repeat: no-repeat;
      background-size: cover;
    }

    .elementor-656 .elementor-element.elementor-element-11ee35d0 {
      padding: 80px 0px 30px 0px;
    }
  </style>
@endpush
@section('content')
  {{-- Print all content by [module - route - page] without blocks content at here --}}
  <div class="page-title-area">
    <div class="container">
      <span class="page-tag">{{ $page->name ?? '' }}</span>
      <h2 class="page-title">{{ $page_title }}</h2>

      <ul class="breadcrumb-nav">
        <li><a href="{{ route('frontend.home') }}">@lang('Home')</a></li>
        <li class="active">{{ $page->name ?? '' }}</li>
      </ul>
    </div>
  </div>

  <div class="entry-page">
    <div class="site-container fullwidth-container">
      <div class="site-content-wrapper no-sidebar">
        <div class="content-area" style="margin-bottom: 50px">

          <div id="post-656" class="page-inner clearfix post-656 page type-page status-publish hentry">
            <div data-elementor-type="wp-page" data-elementor-id="656" class="elementor elementor-656">
              <section
                class="elementor-section elementor-top-section elementor-element elementor-element-11ee35d0 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                data-id="11ee35d0" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                  <div
                    class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5dbd99a"
                    data-id="5dbd99a" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                      <div
                        class="elementor-element elementor-element-6cee3c1c elementor-widget elementor-widget-yankee-fancy-boxes"
                        data-id="6cee3c1c" data-element_type="widget" data-widget_type="yankee-fancy-boxes.default">
                        <div class="elementor-widget-container">
                          <div class="yankee-service-boxes column-d-4 column-t-2 column-s-2 column-xs-1">

                            @foreach ($posts as $item)
                              @php
                                $title = $item->json_params->title->{$locale} ?? $item->title;
                                $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                                $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                                $date = date('H:i d/m/Y', strtotime($item->created_at));
                                // Viet ham xu ly lay alias bai viet
                                $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['service'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
                                $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['service'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
                                
                              @endphp
                              <div class="service-box">
                                <div class="icon">
                                  <a href="{{ $alias }}">
                                    <img src="{{ $image }}" alt="{{ $title }}">
                                  </a>
                                </div>
                                <h4 class="title"><a href="{{ $alias }}">{{ $title }}</a>
                                </h4><a href="{{ $alias }}" class="service-link"><i
                                    class="fal fa-arrow-right"></i></a>
                              </div>
                            @endforeach

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            </div>
          </div>
          {{ $posts->withQueryString()->links('frontend.pagination.default') }}
        </div>
      </div>
    </div>
  </div>
  {{-- End content --}}
@endsection
