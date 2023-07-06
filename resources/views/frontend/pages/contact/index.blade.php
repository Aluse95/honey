@extends('frontend.layouts.default')

@php
  $page_title = $taxonomy->title ?? ($page->title ?? ($page->name ?? ''));
  $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
@endphp

@section('content')
  {{-- Print all content by [module - route - page] without blocks content at here --}}
  <section id="page-title">
    <div class="container text-center">
      <h1>{{ $page_title }}</h1>
      <p class="mt-4 mb-0">@lang('Home') / {{ $page_title }}</p>
    </div>
  </section>

  {{-- @isset($web_information->source_code->map)
    <section class="vh-60">
      {!! $web_information->source_code->map !!}
    </section>
  @endisset --}}

  <section id="contact">
    <div class="content-wrap">
      <div class="container">
        <div class="row">
          <div class="post-content col-lg-9">
            <h3 class="my-5">LIÊN HỆ TRỰC TUYẾN</h3>
            <div class="">
              <div class="form-result"></div>
              <form class="mb-0 form_ajax" method="post" action="{{ route('frontend.contact.store') }}">
                @csrf
                <div class="row">
                  <div class="col-md-12 form-group mb-4">
                    <label for="name">@lang('Fullname') <small class="text-danger">*</small></label><br>
                    <input type="text" id="name" name="name" value="" class="form-control required" required />
                  </div>
                  <div class="col-md-6 form-group">
                    <label for="email">Email <small class="text-danger">*</small></label>
                    <input type="email" id="email" name="email" value=""
                      class="required email form-control" required />
                  </div>
                  <div class="col-md-6 form-group">
                    <label for="phone">@lang('phone') <small class="text-danger">*</small></label>
                    <input type="text" id="phone" name="phone" value="" class="form-control" required />
                  </div>

                  <div class="col-12 form-group mt-4">
                    <label for="content">@lang('Content') <small class="text-danger">*</small></label><br>
                    <textarea class="required form-control" id="content" name="content" rows="5" cols="30" required></textarea>
                  </div>
                  <div class="col-12 form-group">
                    <button class="button text-uppercase my-4"
                      type="submit" name="submit" value="submit">
                      <span>Gửi liên hệ</span>
                    </button>
                  </div>
                </div>
                <input type="hidden" name="is_type" value="contact">
              </form>
            </div>
          </div>
          <div class="sidebar col-lg-3 mt-5">
            <address>
              <strong>@lang('address'):</strong><br>
              {!! $web_information->information->address ?? '' !!}
            </address>
            <abbr title="Phone Number">
              <strong>@lang('phone'):</strong>
            </abbr>
            {!! $web_information->information->phone ?? '' !!}<br>
            <abbr title="Email Address"><strong>Email:</strong></abbr>
            {!! $web_information->information->email ?? '' !!}
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
