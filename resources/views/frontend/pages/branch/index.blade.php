@extends('frontend.layouts.default')

@php
  $page_title = $taxonomy->title ?? ($page->title ?? ($page->name ?? ''));
  $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
@endphp
@push('style')
  <style>
    .fluid-width-video-wrapper {
      height: 100%;
    }

    .selectpicker {
      height: 100%;
      width: 80%;
      margin-left: 10px;
      padding: 0 10px;
    }

    label {
      min-width: 100px;
    }

    .button {
      background-color:#197c53;
      border: 1px solid transparent;
      transition: all ease 0.2s;
      height: 100%;
      width: 100%;
      text-align: center;
    }

    .button:hover {
      background-color: #fff;
      color: var(--pri-color);
      border: 1px solid #197c53;
    }

    .branch-list {
      max-height: 510px;
      overflow-y: scroll;
    }

    .branch-list::-webkit-scrollbar {
      width: 5px;
      background-color: transparent;
    }

    .branch-list::-webkit-scrollbar-thumb {
      background-color: var(--pri-color);
    }

    .branch-item {
      transition: all ease 0.2s;
      cursor: pointer;
    }

    .branch-item:hover {
      background-color: rgb(235, 235, 235);
    }

    .branch-item p {
      margin-bottom: 10px;
    }

    /* START EMBED MAP */

    .mapouter {
      position: relative;
      text-align: right;
      width: 100%;
      height: 510px;
    }

    .gmap_canvas {
      overflow: hidden;
      background: none !important;
      width: 100%;
      height: 510px;
    }

    .gmap_iframe {
      height: 510px !important;
    }

    iframe {
      height: 100%;
    }
  </style>
@endpush
@section('content')
  {{-- Print all content by [module - route - page] without blocks content at here --}}
  <section id="page-title" class="page-title-parallax page-title-center page-title d-none"
    style="background-image: url('{{ $image_background }}'); background-size: cover; padding: 120px 0;"
    data-bottom-top="background-position:0px 300px;" data-top-bottom="background-position:0px -300px;">
    <div id="particles-line"></div>

    <div class="container clearfix mt-4">
      <h1>{{ $page_title }}</h1>
    </div>
  </section>

  <section id="content">
    <div class="content-wrap">
      <div class="container">
        <!-- START FILTER -->
        <div class="row mb-5">
          <div class="col-lg-12 bottommargin-sm">
            <div class="white-section">
              <form class="mb-0" method="post" action="{{ route('frontend.branch') }}">
                @csrf
                <div class="row col-mb-30">
                  <div class="col-lg-5 d-flex align-items-center">
                    <label class="mb-0">Thành phố:</label>
                    <select name="city" id="city" class="selectpicker">
                      <option value="">@lang('Please select')</option>
                      @foreach (App\Region::DATA as $key => $item)
                        <option value="{{ $item['id'] }}"
                          {{ isset($params['city']) && $params['city'] == $item['id'] ? 'selected' : '' }}>
                          {{ __($item['name']) }} </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-lg-5 d-flex align-items-center">
                    @php
                      $city = $params['city'] ?? null;
                      $districts = collect(App\Region::DATA);
                      $district = $districts->first(function ($item, $key) use ($city) {
                          return $item['id'] == $city;
                      });
                    @endphp
                    <label class="mb-0">Quận/Huyện:</label>
                    <select name="district" id="district" class="selectpicker">
                      <option value="">@lang('Please select')</option>
                      @isset($district)
                        @foreach ($district['district'] as $key => $item)
                          <option value="{{ $item['id'] }}"
                            {{ isset($params['district']) && $params['district'] == $item['id'] ? 'selected' : '' }}>
                            {{ __($item['name']) }}
                          </option>
                        @endforeach
                      @endisset
                    </select>
                  </div>
                  <div class="col-lg-2">
                    <button type="submit" class="button my-0">Tìm kiếm</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row g-0 border">
          <div class="col-lg-4 col-md-12 branch-list">
            @foreach ($rows as $item)
              <div data-map='{!! $item->map !!}' class="branch-item p-3 border-bottom branch-address">
                <h4 class="text-uppercase mb-3">
                  {!! $item->name !!}
                </h4>
                <p><i class="icon-realestate-map pe-3"></i>{!! $item->address !!}</p>
                <p><i class="icon-line-phone pe-3"></i>{!! $item->phone !!}</p>
                <p><i class="icon-fax pe-3"></i>{!! $item->fax !!}</p>
              </div>
            @endforeach

          </div>
          <div class="col-lg-8 col-md-12">
            <div class="mapouter">
              <div class="gmap_canvas">
                {!! $web_information->source_code->map ?? '' !!}
              </div>
            </div>
          </div>
        </div>
        <!-- END FILTER -->
      </div>
    </div>
  </section>

  {{-- End content --}}
@endsection

@push('script')
  <script>
    const dataMaps = document.querySelectorAll(".branch-address");
    const map = document.querySelector(".gmap_canvas");
    let attr;

    dataMaps.forEach((dataMap) => {
      dataMap.addEventListener("click", () => {
        map.innerHTML = dataMap.getAttributeNode("data-map").value;
      });
    });

    // Change to filter
    $(document).ready(function() {
      // Routes get all
      var regions = @json(App\Region::DATA ?? []);
      $(document).on('change', '#city', function() {
        let _value = parseInt($(this).val());
        let _targetHTML = $('#district');
        let _list = filterArray(regions, 'id', _value);
        let _optionList = '<option value="">@lang('Please select')</option>';
        if (_list) {
          _list.forEach(element => {
            element.district.forEach(item => {
              _optionList += '<option value="' + item.id + '"> ' + item.name + ' </option>';
            });
          });
          _targetHTML.html(_optionList);
        }
        $(".select2").select2();
      });

    });
  </script>
@endpush
