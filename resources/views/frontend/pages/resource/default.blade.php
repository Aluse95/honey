@extends('frontend.layouts.default')

@php
$page_title = $taxonomy->title ?? ($page->title ?? $page->name);
$image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
$str_alias = '.html?id=';
@endphp
@push('style')
  <style>
    #services .article img {
      height: 350px;
    }
  </style>
@endpush
@section('content')
  {{-- Print all content by [module - route - page] without blocks content at here --}}
  <section class="page-title" id="page-title" style="background: url('{{ $image_background }}') center center no-repeat;">
    <div class="container">
      <div class="content">
        <h2 class="text-uppercase">{{ $page_title }}</h2>
      </div>
    </div>
  </section>

  <section class="events bg-light">
    <div class="container">
      <div class="row">
        @foreach ($posts as $item)
          @php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            // Viet ham xu ly lay alias bai viet
            $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['resource'], $item->taxonomy_title, $item->taxonomy_id);
            $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['resource'], $title, $item->id, 'detail');
          @endphp
          <div class="col-lg-6">
            <div class="event">
              <div class="event-img">
                <a href="{{ $alias }}">
                  <img src="{{ $image }}" alt="{{ $title }}">
                </a>
              </div>
              <div class="event-content">
                <div class="event-title">
                  <a href="{{ $alias }}">
                    <h4>{{ $title }}</h4>
                  </a>
                </div>
                <div class="event-text">
                  <p>{{ Str::limit($brief, 100) }}</p>
                </div>
                <a class="event-more" href="{{ $alias }}">@lang('Read more')</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      {{ $posts->withQueryString()->links('frontend.pagination.default') }}

    </div>
  </section>

  {{-- End content --}}
@endsection
