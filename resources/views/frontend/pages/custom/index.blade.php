@extends('frontend.layouts.default')

@php
  $page_title = $taxonomy->title ?? ($page->title ?? ($page->name ?? ''));
  $content = $page->content;
  $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
@endphp
@push('style')
  <style>

    #content-detail ul,
    #content-detail ol {
      list-style: inherit;
      padding: 0 0 0 50px;
    }
  </style>
@endpush
@section('content')
  {{-- Print all content by [module - route - page] without blocks content at here --}}
  <section id="page-title" class="page-title-parallax page-title-center page-title d-none"
    style="background-image: url('{{ asset('images/background-img.jpg') }}'); background-size: cover; padding: 120px 0;"
    data-bottom-top="background-position:0px 300px;" data-top-bottom="background-position:0px -300px;">
    <div id="particles-line"></div>

    <div class="container clearfix mt-4">
      <h1>{{ $page_title }}</h1>
    </div>
  </section>

  <section id="content">
    <div class="content-wrap">
      <div class="container">
        <h1 class="text-center">{{ $page_title }}</h1>
        <p>{!! $content !!}</p>
      </div>
    </div>
  </section>

  {{-- End content --}}
@endsection
