@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $icon = $block->icon ?? '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  @endphp

  <section id="process">
    <div class="container">
      <h2 class="text-uppercase text-center bold">{{ $title }}</h2>
      <div class="row">
        @foreach ($block_childs as $item)
        @php
          $title_child = $item->json_params->title->{$locale} ?? $item->title;
          $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
        @endphp
            
        <div class="col-lg-3 col-md-3 col-12 px-3 mb-5 text-center">
          <div class="process-item">
            <div class="process-number pt-3">{{ $title_child }}</div>
            {!! $brief_child !!}
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
@endif
