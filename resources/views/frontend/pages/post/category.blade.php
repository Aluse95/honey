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

@section('content')
  {{-- Print all content by [module - route - page] without blocks content at here --}}
  <section id="page-title">
    <div class="container text-center">
      <h1>{{ $page_title }}</h1>
      <p class="mt-4 mb-0">@lang('Home') / {{ $page_title }}</p>
    </div>
  </section>

  <section id="content">
    <div class="content-wrap">
      <div class="container mb-3">
        <div class="row my-5">
          <div class="postcontent col-lg-9">
            <div class="row">
              @foreach ($posts as $item)
                @php
                  $title = $item->json_params->title->{$locale} ?? $item->title;
                  $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                  $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                  // $date = date('H:i d/m/Y', strtotime($item->created_at));
                  $date = date('d', strtotime($item->created_at));
                  $month = date('M', strtotime($item->created_at));
                  $year = date('Y', strtotime($item->created_at));
                  // Viet ham xu ly lay slug
                  $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
                  $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
                @endphp
                <div class="col-md-6">
                  <article class="mb-5">
                    <div class="article-image mb-4">
                      <a href="{{ $alias }}">
                        <img class="img-fluid w-10" src="{{ $image }}" alt="{{ $title }}">
                      </a>
                    </div>
                    <div class="article-title bold">
                      <h3>
                        <a href="{{ $alias }}">{{ $title }}</a>
                      </h3>
                    </div>
                    <div class="article-infor">
                      <ul class="list-unstyled d-flex align-items-center mt-3">
                        <li class="me-3">
                          <i class="fa-solid fa-folder"></i>
                          <a href="{{ $alias_category }}">
                            {{ $item->taxonomy_title }}
                          </a>
                        </li>
                        <li>
                          <i class="fa-solid fa-calendar-xmark"></i> 
                          {{ $date }} {{ $month }} {{ $year }}
                        </li>
                      </ul>
                    </div>
                    <div class="article-content">
                      <p>{{ Str::limit($brief, 100) }}</p>
                    </div>
                  </article>
                </div>
              @endforeach
              {{ $posts->withQueryString()->links('frontend.pagination.default') }}
            </div>
          </div>
          @include('frontend.components.sidebar.post')
        </div>
      </div>
    </div>
  </section>
@endsection
