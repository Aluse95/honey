@if ($block)
  @php
    $product = App\Models\CmsPost::where('is_type', App\Consts::POST_TYPE['product'])
                      ->where('is_featured', true)
                      ->where('status', 'active')
                      ->first();
    // dd($product);
    $title = $product->title ?? '';
    $brief = $product->json_params->brief->{$locale} ?? $product->brief;
    $content = $product->json_params->content->{$locale} ?? $product->content;
    $price = $product->json_params->price ?? '';
    $price_old = $product->json_params->price_old ?? '';
    $gallery = $product->json_params->gallery_image ?? '';
    $id = $product->id ?? '';
  @endphp

  <section id="product">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 col-12">
          <div class="slider slider-for w-50 m-auto mb-5">
            @foreach ($gallery as $key => $value)
            <div>
              <img class="img-fluid w-100" src="{{ $value }}" alt="product image">
            </div>
            @endforeach
          </div>
          <div class="slider slider-nav pt-4">
            @foreach ($gallery as $key => $value)
            <div>
              <img class="img-fluid w-75 m-auto" src="{{ $value }}" alt="product image">
            </div>
            @endforeach
          </div>
        </div>
        <div class="col-lg-5 col-12">
          <div class="product-infor">
            <h2 class="text-uppercase text-center bold mb-4">{{ $title }}</h2>
            <div class="line"></div>
            <div class="product-price pt-3 d-flex">
              <div class="old-price bold pe-3">{{ number_format($price) }} đ</div>
              <div class="price bold px-3">{{ number_format($price_old) }} đ</div>
              <div class="sale-off bold ps-3">{{ number_format($price_old - $price) }} đ</div>
            </div>
            <hr>
            {!! $brief !!}
            <hr>
            {!! $content !!}
            <p>Kích thước</p>
            <div class="d-flex">
              <div class="product-size">
                <input type="radio" name="size" id="size1" checked class="d-none">
                <label for="size1"><div>200g</div></label><br>
              </div>
              <div class="product-size ms-3">
                <input type="radio" name="size" id="size2" class="d-none">
                <label for="size2"><div>500g</div></label><br>
              </div>
            </div>
            <div class="d-flex align-items-center pt-4">
              <div class="product-number d-flex align-items-center me-4">
                <button class="number-sub">-</button>
                <input type="number" class="number" min="1" name="number" value="1">
                <button class="number-add">+</button>
              </div>
              <p class="m-0">Còn hàng</p>
            </div>
            <div class="d-flex mt-4">
              <div class="add-to-cart me-4" data-id="{{ $id }}">
                Thêm giỏ hàng
              </div>
              <div class="buy-now">
                Mua ngay
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endif

