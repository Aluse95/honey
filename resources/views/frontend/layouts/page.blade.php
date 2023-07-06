<!DOCTYPE html>
<html lang="{{ $locale ?? 'vi' }}">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    {{ $seo_title ?? ($page->title ?? ($web_information->information->seo_title ?? '')) }}
  </title>
  <link rel="icon" href="{{ $web_information->image->favicon ?? '' }}" type="image/x-icon">
  {{-- Print SEO --}}
  @php
    $seo_title = $seo_title ?? ($page->title ?? ($web_information->information->seo_title ?? ''));
    $seo_keyword = $seo_keyword ?? ($page->keyword ?? ($web_information->information->seo_keyword ?? ''));
    $seo_description = $seo_description ?? ($page->description ?? ($web_information->information->seo_description ?? ''));
    $seo_image = $seo_image ?? ($page->json_params->og_image ?? ($web_information->image->seo_og_image ?? ''));
  @endphp
  <meta name="description" content="{{ $seo_description }}" />
  <meta name="keywords" content="{{ $seo_keyword }}" />
  <meta name="news_keywords" content="{{ $seo_keyword }}" />
  <meta property="og:image" content="{{ $seo_image }}" />
  <meta property="og:title" content="{{ $seo_title }}" />
  <meta property="og:description" content="{{ $seo_description }}" />
  <meta property="og:url" content="{{ Request::fullUrl() }}" />

  <meta name="copyright" content="{{ $web_information->information->site_name ?? '' }}" />
  <meta name="author" content="{{ $web_information->information->site_name ?? '' }}" />
  <meta name="robots" content="index,follow" />

  {{-- End Print SEO --}}
  {{-- Include style for app --}}
  @include('frontend.panels.styles')
  {{-- Styles custom each page --}}
  @stack('style')
  @stack('schema')
</head>

<body class="stretched">
  <div id="wrapper" class="content-wrap p-0">

    @include('frontend.blocks.header.styles.default')

    {{-- Foreach and print block content by current page --}}
    @if (isset($blocks_selected))
      @foreach ($blocks_selected as $block)
        @if (\View::exists('frontend.blocks.' . $block->block_code . '.index'))
          @include('frontend.blocks.' . $block->block_code . '.index')
        @else
          {{ 'View: frontend.blocks.' . $block->block_code . '.index do not exists!' }}
        @endif
      @endforeach
    @endif

    @include('frontend.blocks.footer.styles.default')

  </div>
  {{-- Include fixed alert --}}
  @include('frontend.components.sticky.alert')
  {{-- Include scripts --}}
  @include('frontend.panels.scripts')
  {{-- Scripts custom each page --}}
  @stack('script')
  {{-- Include sticky contact --}}
  @include('frontend.components.sticky.contact')

  {{-- Include popup --}}
  @include('frontend.components.popup.default')

</body>

</html>
