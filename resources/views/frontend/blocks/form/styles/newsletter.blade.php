@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : null;
    $background = $block->image_background != '' ? $block->image_background : null;
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
  @endphp
  <section class="newsletter bg-light" id="newsletter">
    <div class="container">
      <div class="newsletter-inner">
        <div class="row">
          <div class="col-lg-5">
            <h2>{{ $title }}</h2>
            <p>{{ $brief }}</p>
          </div>
          <div class="col-lg-7">
            <form class="newsletter-form form_ajax" action="{{ route('frontend.contact.store') }}" method="post">
              @csrf
              <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Nhập email của bạn" required />
                <input type="hidden" name="is_type" value="newsletter">
                <button class="main-btn" type="submit" name="send">
                  <span>@lang('Signup')</span>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endif
