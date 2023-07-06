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
  $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $taxonomy_alias, $detail->taxonomy_id);
  
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
    #content-detail {
      text-align: justify;
    }

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
      padding: 0 0 0 25px;

    }

    #content-detail ul li {
      display: list-item;
      list-style: initial;
    }

    #content-detail ol li {
      display: list-item;
      list-style: decimal;
    }

    .posts-sm .entry-image {
      width: 75px;
    }

    #content-detail img {
      max-width: 100%;
      width: auto !important;
    }

    body.light #content-detail p {
      color: #000 !important;
      font-weight: 400 !important;
    }
  </style>
@endpush

@section('content')
  {{-- Print all content by [module - route - page] without blocks content at here --}}
  <section id="page-title">
    <div class="container text-center">
      <h1 class="mb-3">{{ $taxonomy_title }}</h1>
      <span>{{ $title }}</span>
    </div>
  </section>

  <section id="content">
    <div class="content-wrap">
      <div class="container my-5">
        <div class="row">
          <div class="postcontent col-lg-9">
            <div class="single-post mb-0">
              <div class="entry clearfix">
                <div class="entry-content mt-0" id="content-detail">
                  {!! $content ?? '' !!}
                  <hr class="mt-5">
                  <div class="si-share border-0 d-flex justify-content-between align-items-center mt-3">
                    <span>@lang('Share this post'):</span>
                    <div>
                      <a href="http://www.facebook.com/sharer/sharer.php?u={{ Request::fullUrl() }}"
                        class="social-icon icon-facebook">
                        <i class="fa-brands fa-square-facebook"></i>
                      </a>
                      <a href="https://twitter.com/intent/tweet?url={{ Request::fullUrl() }}"
                        class="social-icon icon-twitter">
                        <i class="fa-brands fa-square-twitter"></i>
                      </a>
                      <a href="https://www.instagram.com/cws/share?url={{ Request::fullUrl() }}"
                        class="social-icon icon-instagram">
                        <i class="fa-brands fa-square-instagram"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              @if (isset($relatedPosts) && count($relatedPosts) > 0)
                <h4 class="title-widget text-uppercase">@lang('Related Posts')</h4>
                <div class="related-posts row posts-md col-mb-30">
                  @foreach ($relatedPosts as $item)
                    @php
                      $title = $item->json_params->title->{$locale} ?? $item->title;
                      $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                      $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                      $date = date('d/m/Y', strtotime($item->created_at));
                      // Viet ham xu ly lay slug
                      $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
                      $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
                    @endphp
                    <div class="entry col-12 col-md-6">
                      <div class="grid-inner row align-items-center gutter-20">
                        <div class="col-4 col-xl-5">
                          <div class="entry-image">
                            <a href="{{ $alias }}"><img src="{{ $image }}" alt="Blog Single"></a>
                          </div>
                        </div>
                        <div class="col-8 col-xl-7">
                          <div class="entry-title title-xs nott">
                            <h3><a href="{{ $alias }}">{{ Str::limit($title, 70) }}</a></h3>
                          </div>
                          <div class="entry-content d-none d-xl-block">
                            {{ Str::limit($brief, 100) }}
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              @endif
            </div>
          </div>
          @include('frontend.components.sidebar.post')
        </div>
      </div>
    </div>
  </section>
@endsection
