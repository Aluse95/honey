@if ($block)
  @php
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  @endphp

  <section id="banner">
    <div class="swiper">
      <div class="swiper-wrapper">
        @if ($block_childs)
          @foreach ($block_childs as $item)
            @php
              $title = $item->json_params->title->{$locale} ?? $item->title;
              $brief = $item->json_params->brief->{$locale} ?? $item->brief;
              $content = $item->json_params->content->{$locale} ?? $item->content;
              $image = $item->image != '' ? $item->image : null;
              $image_background = $item->image_background != '' ? $item->image_background : null;
            @endphp

            <div class="swiper-slide">
              <img class="img-fluid w-100 h-100" src="{{ $image }}" alt="{{ $title }}"/>
            </div>
            {{-- <div class="swiper-slide">
              <img class="lazyload img-fluid w-100 h-100"
                    src="{{ asset('images/lazyload.gif')}}"
                    data-src="{{ $image }}" alt="{{ $title }}"
                  />
            </div> --}}
          @endforeach
        @endif
      </div>
    </div>
  </section>
@endif
