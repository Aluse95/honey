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
  $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['service'], $taxonomy_alias, $detail->taxonomy_id);
  
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
      padding: 0 0 0 50px;

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
  <style>
    .page-title-area {
      background-image: url('{{ $image_background }}');
      background-position: center center;
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
@endpush

@push('schema')
  <script type="application/ld+json">
  {
      "@context": "https://schema.org/",
      "@type": "BlogPosting",
      "@id": "{{ Request::fullUrl() }}",
      "mainEntityOfPage": "{{ Request::fullUrl() }}",
      "headline": "{{$seo_title}}",
      "name": "{{$seo_title}}",
      "description": "{{$seo_description}}",
      "datePublished": "{{$datePublished}}",
      "dateModified": "{{$dateModified}}",
      "author": {
          "@type": "Person",
          "name": "{{$web_information->information->site_name ?? ''}}",
          "url": "{{Request::root()}}",
          "image": {
              "@type": "ImageObject",
              "@id": "{{ $web_information->image->logo_header ?? '' }}",
              "url": "{{ $web_information->image->logo_header ?? '' }}",
              "height": "125",
              "width": "125"
          }
      },
      "publisher": {
          "@type": "Organization",
          "@id": "{{Request::root()}}",
          "name": "{{$web_information->information->site_name ?? ''}}",
          "logo": {
              "@type": "ImageObject",
              "@id": "{{ $web_information->image->logo_header ?? '' }}",
              "url": "{{ $web_information->image->logo_header ?? '' }}",
              "width": "125",
              "height": "125"
          }
      },
      "image": {
          "@type": "ImageObject",
          "@id": "{{$seo_image}}",
          "url": "{{$seo_image}}",
          "height": "362",
          "width": "388"
      },
      "url": "{{ Request::fullUrl() }}",
      "isPartOf": {
          "@type" : "Blog",
           "@id": "{{ $alias_category }}",
           "name": "{{ $taxonomy_title ?? '' }}",
           "publisher": {
               "@type": "Organization",
               "@id": "{{Request::root()}}",
               "name": "{{$web_information->information->site_name ?? ''}}"
           }
       }
  }
  </script>
@endpush

@section('content')
  {{-- Print all content by [module - route - page] without blocks content at here --}}
  <div class="page-title-area">
    <div class="container">
      <span class="page-tag">{{ $taxonomy_title ?? '' }}</span>
      <h2 class="page-title">{{ $title }}</h2>

      <ul class="breadcrumb-nav">
        <li><a href="{{ route('frontend.home') }}">@lang('Home')</a></li>
        <li><a href="{{ $alias_category }}">{{ $taxonomy_title ?? '' }}</a></li>
        <li class="active">{{ $title }}</li>
      </ul>
    </div>
  </div>


  <div class="entry-posts entry-page-padding">
    <div class="site-container">
      <div class="site-content-wrapper right-sidebar">
        <div class="content-area">

          <div id="post-1021"
            class="entry-single-post post-details post-1021 post type-post status-publish format-standard has-post-thumbnail hentry category-web tag-design tag-web">
            <div class="post-content-area">
              <div class="entry-content clearfix" id="content-detail">
                {!! $content ?? '' !!}
              </div>

              <div class="entry-footer">
                <div class="row justify-content-between align-items-start">
                  <div class="col-md-6">
                    <div class="social-share">
                      <h5>@lang('Share this post')</h5>
                      <ul>
                        <li><a target="_blank" href="https://twitter.com/intent/tweet?url={{ Request::fullUrl() }}"
                            title="Twitter"><i class="fab fa-twitter"></i></a></li>
                        <li><a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u={{ Request::fullUrl() }}"
                            title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a target="_blank" href="https://www.instagram.com/cws/share?url={{ Request::fullUrl() }}"
                            title="instagram"><i class="fab fa-instagram"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>

              @if (isset($relatedPosts) && count($relatedPosts) > 0)
                <div class="related-post">
                  <h3 class="related-title">@lang('Related Posts')</h3>
                  <div class="row">
                    @foreach ($relatedPosts as $item)
                      @php
                        $title = $item->json_params->title->{$locale} ?? $item->title;
                        $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                        $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                        $date = date('d/m/Y', strtotime($item->created_at));
                        // Viet ham xu ly lay slug
                        $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['service'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
                        $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['service'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
                      @endphp
                      <div class="col-md-6">
                        <div class="single-related-post">
                          <div class="thumb">
                            <img width="770" height="460" src="{{ $image }}"
                              class="attachment-medium-large size-medium-large wp-post-image" alt="{{ $title }}"
                              loading="lazy" sizes="(max-width: 770px) 100vw, 770px" />
                          </div>
                          <div class="desc">
                            <span class="date">
                              <i class="far fa-calendar-alt"></i> {{ $date }} </span>
                            <h4>
                              <a href="{{ $alias }}">
                                {{ $title }}
                              </a>
                            </h4>
                            <p>
                              {{ Str::limit($brief, 100) }}
                            </p>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
              @endif

            </div>
          </div>
        </div>

        @include('frontend.components.sidebar.post')

      </div>
    </div>
  </div>

  {{-- End content --}}
@endsection
