@extends('frontend.layouts.default')

@php
  $title = $detail->json_params->title->{$locale} ?? $detail->title;
  $brief = $detail->json_params->brief->{$locale} ?? null;
  $content = $detail->json_params->content->{$locale} ?? null;
  $image = $detail->image != '' ? $detail->image : null;
  $image_thumb = $detail->image_thumb != '' ? $detail->image_thumb : null;
  $date = date('H:i d/m/Y', strtotime($detail->created_at));
  
  // For taxonomy
  $taxonomy_json_params = json_decode($detail->taxonomy_json_params);
  $taxonomy_title = $taxonomy_json_params->title->{$locale} ?? $detail->taxonomy_title;
  $image_background = $taxonomy_json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? null);
  $taxonomy_alias = Str::slug($taxonomy_title);
  $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['resource'], $taxonomy_alias, $detail->taxonomy_id);
  
  $seo_title = $detail->json_params->seo_title ?? $title;
  $seo_keyword = $detail->json_params->seo_keyword ?? null;
  $seo_description = $detail->json_params->seo_description ?? $brief;
  $seo_image = $image ?? ($image_thumb ?? null);
  
  // schema information
  $datePublished = date('Y-m-d', strtotime($detail->created_at));
  $dateModified = date('Y-m-d', strtotime($detail->updated_at));
  
@endphp

@push('style')
  <style>
    #content-detail h2 {
      font-size: 30px;
    }

    #content-detail h3 {
      font-size: 24px;
    }

    #content-detail h4 {
      font-size: 18px;
    }

    #content-detail h5,
    #content-detail h6 {
      font-size: 16px;
    }

    #content-detail p {
      margin-top: 0;
      margin-bottom: 0;
    }

    #content-detail h1,
    #content-detail h2,
    #content-detail h3,
    #content-detail h4,
    #content-detail h5,
    #content-detail h6 {
      margin-top: 0;
      margin-bottom: .5rem;
    }

    #content-detail p+h2,
    #content-detail p+.h2 {
      margin-top: 1rem;
    }

    #content-detail h2+p,
    #content-detail .h2+p {
      margin-top: 1rem;
    }

    #content-detail p+h3,
    #content-detail p+.h3 {
      margin-top: 0.5rem;
    }

    #content-detail h3+p,
    #content-detail .h3+p {
      margin-top: 0.5rem;
    }

    #content-detail ul,
    #content-detail ol {
      list-style: inherit;
      padding: 0 0 0 50px;

    }

    #content-detail ul li,
    #content-detail ol li {
      display: list-item;
      list-style: inherit;
    }

    .posts-sm .entry-image {
      width: 75px;
    }

    .button.button-border.button-fill:hover {
      color: #fff !important;
    }

    .product .entry-image {
      position: relative !important;
    }

    .product .entry-title {
      position: absolute;
      bottom: 0;
      background-color: #FFF;
      opacity: 0.75;
      left: 50%;
      width: 100%;
      transform: translateX(-50%);
      padding: 10px 0px;
    }

    .entry-image a.img-link {
      height: 400px;
      overflow: hidden;
    }

    .link-hover:hover {
      background-color: green !important;
    }

    .entry-image img {
      height: 100%;
    }

    .img-hover:hover {
      opacity: 0.75;
    }

    .img-main:hover {
      transform: scale(1.05);
      transition: all .3s ease-in-out;
    }
  </style>
@endpush

@section('content')
  {{-- Print all content by [module - route - page] without blocks content at here --}}

  <section id="page-title" class="page-title-parallax page-title-center page-title"
    style="background-image: url('{{ $image_background }}'); background-size: cover;"
    data-bottom-top="background-position:0px 300px;" data-top-bottom="background-position:0px -300px;">
    <div id="particles-line"></div>

    <div class="container clearfix mt-4">
      {{-- <div class="badge rounded-pill border border-light text-light">{{ $page_title }}</div> --}}
      <ol class="breadcrumb d-none">
        <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">@lang('Home')</a></li>
        <li class="breadcrumb-item"><a href="{{ $alias_category }}">{{ $taxonomy_title ?? '' }}</a></li>
      </ol>
      <h1>{{ $title }}</h1>
    </div>
  </section>

  <section id="content">

    <div class="content-wrap">
      <div class="container mb-3">

        <div class="row mb-5">
          <div class="col-sm-6 col-lg-4 mb-3">
            <div class="feature-box fbox-lg fbox-effect">
              <div class="fbox-icon">
                <i class="icon-line-map-pin"></i>
              </div>
              <div class="fbox-content d-flex flex-column justify-content-center">
                <h3 class="text-uppercase">@lang('Place')</h3>
                <p>{{ $detail->json_params->place ?? '' }}</p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 mb-3">
            <div class="feature-box fbox-lg fbox-effect">
              <div class="fbox-icon">
                <i class="icon-line2-size-fullscreen"></i>
              </div>
              <div class="fbox-content d-flex flex-column justify-content-center">
                <h3 class="text-uppercase">@lang('Total area')</h3>
                <p>{{ $detail->json_params->area ?? '' }}</p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 mb-3">
            <div class="feature-box fbox-lg fbox-effect">
              <div class="fbox-icon">
                <i class="icon-certificate1"></i>
              </div>
              <div class="fbox-content d-flex flex-column justify-content-center">
                <h3 class="text-uppercase">@lang('Project scale')</h3>
                <p>{{ $detail->json_params->scale ?? '' }}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div style="overflow: hidden">
              <img src="{{ $image }}" alt="{{ $title }}" class="mb-3 img-main" />
            </div>
          </div>
          <div class="col-md-6">
            <div id="content-detail" class="pb-3 mb-3">
              {!! $content !!}
            </div>
            @isset($detail->json_params->catalog)
              <a href="{{ $detail->json_params->catalog }}" target="_blank"
                class="button button-border button-rounded button-fill button-green button-large ls0 mt-0 mb-3 mx-0">
                <span>CATALOG FILE <i class="icon-files"></i></span>
              </a>
            @endisset
            @isset($detail->json_params->shop_online)
              <a href="{{ $detail->json_params->shop_online }}" target="_blank"
                class="button button-border button-rounded button-fill button-green button-large ls0 mt-0 mb-3 mx-0">
                <span>SHOP ONLINE <i class="icon-line-shopping-cart"></i></span>
              </a>
            @endisset

            <div class="si-share border-0 d-flex align-items-center">
              Chia sẻ:
              <div>
                <a href="http://www.facebook.com/sharer/sharer.php?u={{ Request::fullUrl() }}"
                  class="social-icon si-borderless si-facebook">
                  <i class="icon-facebook"></i>
                  <i class="icon-facebook"></i>
                </a>
                <a href="https://twitter.com/intent/tweet?url={{ Request::fullUrl() }}"
                  class="social-icon si-borderless si-twitter">
                  <i class="icon-twitter"></i>
                  <i class="icon-twitter"></i>
                </a>
                <a href="https://www.instagram.com/cws/share?url={{ Request::fullUrl() }}"
                  class="social-icon si-borderless si-instagram">
                  <i class="icon-instagram"></i>
                  <i class="icon-instagram"></i>
                </a>
              </div>
            </div>
          </div>



          <div class="col-md-12">
            @isset($detail->json_params->gallery_image)
              <h3 class="title-widget text-uppercase mt-4">@lang('Gallery Image')</h3>
              <div class="masonry-thumbs grid-container grid-3" data-lightbox="gallery">
                @foreach ($detail->json_params->gallery_image as $key => $value)
                  <a class="grid-item img-hover" href="{{ $value }}" data-lightbox="gallery-item">
                    <img src="{{ $value }}" alt="{{ $key }}">
                  </a>
                @endforeach
              </div>
            @endisset

            @if (isset($relatedPosts) && count($relatedPosts) > 0)
              <h3 class="title-widget text-uppercase mt-4">@lang('Other Resource')</h3>
              <div class="related-posts row posts-md col-mb-30">
                @foreach ($relatedPosts as $item)
                  @php
                    $title_item = $item->json_params->title->{$locale} ?? $item->title;
                    $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                    $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                    $date = date('d/m/Y', strtotime($item->created_at));
                    // Viet ham xu ly lay slug
                    $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['resource'], $item->alias ?? $title_item, $item->id, 'detail', $item->taxonomy_title);
                  @endphp
                  <div class="col-md-6 col-lg-4 product">
                    <article class="entry">
                      <div class="entry-image mb-3">
                        <a href="{{ $alias }}" class="img-link"><img src="{{ $image }}"
                            alt="{{ $title_item }}"></a>

                        <div class="bg-overlay">
                          <div class="bg-overlay-content dark flex-column" data-hover-animate="fadeIn">
                            <div class="d-flex mb-3" style="width:75%">
                              <a href="{{ $alias }}" data-hover-animate="fadeInDownSmall"
                                data-hover-animate-out="fadeOutDownSmall" data-hover-speed="1000"
                                style="border: 1px solid #FFFFFF;width:100%; text-align:center;"
                                class="bg-transparent text-light animated py-2 px-5 fadeOutDownSmall link-hover">
                                XEM CHI TIẾT
                                <i class="icon-line-arrow-right"></i>
                              </a>
                            </div>
                            @isset($item->json_params->shop_online)
                              <div class="d-flex" style="width:75%">
                                <a href="{{ $item->json_params->shop_online ?? '' }}" data-hover-animate="fadeInUpSmall"
                                  data-hover-animate-out="fadeOutDownSmall" data-hover-speed="1000"
                                  style="border: 1px solid #FFFFFF; width:100%; text-align:center;"
                                  class="bg-transparent text-light animated py-2 px-5 fadeOutDownSmall link-hover">
                                  SHOP ONLINE
                                  <i class="icon-line-shopping-cart"></i>
                                </a>
                              </div>
                            @endisset

                          </div>
                          <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                        </div>
                      </div>
                      <div class="entry-title text-center">
                        <h3><a href="{{ $alias }}">{{ $title_item }}</a></h3>
                      </div>
                    </article>
                  </div>
                @endforeach
              </div>
            @endif

          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- End content --}}
@endsection
