@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : null;
    $background = $block->image_background != '' ? $block->image_background : null;
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  @endphp

  <div id="form" class="section my-4 py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div
            class="row align-items-stretch align-items-center flex-row-reverse"
          >
            <div
              class="col-md-7 min-vh-50"
              style="
                background: url('{{ $background }}')
                  center center no-repeat;
                background-size: cover;
                border-radius: 30px;
              "
            ></div>
            <div class="col-md-5">
              <div class="card border-0 py-2">
                <div class="card-body">
                  <h3 class="card-title mb-4 ls0">
                    {{ $title }}
                  </h3>
                  <ul class="iconlist ms-3">
                    @if ($block_childs)
                      @foreach ($block_childs as $item)
                        @php
                          $title_child = $item->json_params->title->{$locale} ?? $item->title;
                        @endphp

                        <li>
                          <i class="icon-circle-blank text-black-50"></i>
                          {{ $title_child }}
                        </li>
                      @endforeach
                    @endif
                  </ul>
                  <div class="form-result"></div>
                  <form
                    id="widget-subscribe-form"
                    action="{{ route('frontend.contact.store') }}"
                    method="post"
                    class="mt-1 mb-0 d-flex form_ajax"
                  >
                    @csrf
                    <input
                      type="email"
                      id="widget-subscribe-form-email"
                      name="email"
                      class="form-control sm-form-control required email"
                      placeholder="Email"
                    />

                    <button
                      class="button nott fw-normal ms-1 my-0"
                      type="submit" id="submit" name="submit" value="submit"
                    >
                      Đăng kí
                    </button>
                    <input type="hidden" name="is_type" value="call_request">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endif
