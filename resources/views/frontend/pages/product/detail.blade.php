@extends('frontend.layouts.default')

@php
  $title = $detail->json_params->title->{$locale} ?? $detail->title;
  $brief = $detail->json_params->brief->{$locale} ?? null;
  $price = $detail->json_params->price ?? null;
  $price_old = $detail->json_params->price_old ?? null;
  $content = $detail->json_params->content->{$locale} ?? null;
  $image = $detail->image != '' ? $detail->image : null;
  $image_thumb = $detail->image_thumb != '' ? $detail->image_thumb : null;
  $date = date('H:i d/m/Y', strtotime($detail->created_at));
  $color = $detail->json_params->color ?? '';
  $gallery = $detail->json_params->gallery_image ?? '';

  // For taxonomy
  $taxonomy_json_params = json_decode($detail->taxonomy_json_params);
  $taxonomy_title = $taxonomy_json_params->title->{$locale} ?? $detail->taxonomy_title;
  $image_background = $web_information->image->background_breadcrumbs ?? ($taxonomy->json_params->image_background ?? '');
  $taxonomy_alias = Str::slug($taxonomy_title);
  $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $taxonomy_alias, $detail->taxonomy_id);
  
  $seo_title = $detail->json_params->seo_title ?? $title;
  $seo_keyword = $detail->json_params->seo_keyword ?? null;
  $seo_description = $detail->json_params->seo_description ?? $brief;
  $seo_image = $image ?? ($image_thumb ?? null);
@endphp

@section('content')
  <section id="page-title">
    <div class="container text-center">
      <h1 class="mb-3">{{ $taxonomy_title }}</h1>
      <span>{{ $title }}</span>
    </div>
  </section>

  <section id="content" class="py-5">
    <div class="content-wrap">
      <div class="container clearfix">
        <div class="single-product">
          <div class="product">
            <div class="row">
              <div class="col-md-6">
                <div class="slider slider-for w-75 m-auto mb-5">
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
              <div class="col-md-6 product-desc">
                <h3 class="mb-4">{{ $title }}</h3>
                <div class="line"></div>
                <div class="d-flex align-items-center justify-content-between mt-4 mb-3">
                  <div class="product-price">
                    <del>{{ isset($price_old) && $price_old > 0 ? number_format($price_old, 0, ',', '.') . ' đ' : "" }}</del>
                    <ins class="ms-3">{{ isset($price) && $price > 0 ? number_format($price, 0, ',', '.') . ' đ' : __('Contact') }}</ins>
                  </div>
                  <div class="product-rating">
                    @if($vote)
                      @php
                        $full = floor($vote);
                        $empty = 5 - $full;
                        $half = $vote - $full;
                        if($half > 0.4) {
                          $empty--;
                        }
                      @endphp
                      @for ($i=0; $i < $full ; $i++)
                        <i class="icon-star3" style="color: rgb(195, 255, 0)"></i>
                      @endfor
                      @if ($half > 0.4)
                        <i class="icon-star-half-full" style="color: rgb(195, 255, 0)"></i>
                      @endif
                      @if ($empty)
                        @for ($i = 0; $i < $empty; $i++)
                          <i class="icon-star-empty"></i>
                        @endfor
                      @endif
                    @else
                      @for ($i = 0; $i < 5; $i++)
                        <i class="icon-star-empty"></i>
                      @endfor
                    @endif
                  </div>
                </div>
                <div class="desc-detail">
                  {!! $brief !!}
                </div>
                <ul class="list-unstyled mt-3">
                  <li>
                    <i class="fa-solid fa-circle-right"></i>
                    <span class="detail-title">Thành phần</span>: Bánh tổ ong và mật ong tự nhiên 100%
                  </li>
                  <li>
                    <i class="fa-solid fa-circle-right"></i>
                    <span class="detail-title">Khối lượng</span>: 500g
                  </li>
                  <li>
                    <i class="fa-solid fa-circle-right"></i>
                    <span class="detail-title">Xuất xứ</span>: Việt Nam
                  </li>
                  <li>
                    <i class="fa-solid fa-circle-right"></i>
                    <span class="detail-title">Sản xuất tại</span>: Công ty Cổ phần Ong Tam Đảo
                  </li>
                  <li>
                    <i class="fa-solid fa-circle-right"></i>
                    <span class="detail-title">Mua hàng chính hãng tại: 096 735 0808</span>
                  </li>
                </ul>
                <form class="cart mb-4 d-flex align-items-center" method="post">
                  <div class="product-number d-flex align-items-center me-4">
                    <input type="button" value="-" class="minus number-sub" />
                    <input type="number" step="1" class="number" min="1" name="number" value="1">
                    <input type="button" value="+" class="plus number-add" />
                  </div>
                  <p class="m-0">Còn hàng</p>
                  <button type="button" data-id="{{ $detail->id }}" class="add-to-cart ms-3">
                    @lang('Add to cart')
                  </button>
                </form>
              </div>
              <div  class="modal fade"id="reviewFormModal"role="dialog"aria-labelledby="reviewFormModalLabel"aria-hidden="true"tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title text-center" id="reviewFormModalLabel">
                        Form review
                      </h4>
                      <button
                        type="button"
                        class="btn-close btn-sm"
                        data-bs-dismiss="modal"
                        aria-hidden="true"
                      ></button>
                    </div>
                    <div class="modal-body">
                      <form class="row mb-0" action="{{ route('frontend.review') }}" method="post">
                        @csrf
                        <div class="col-6 mb-3">
                          <label for="template_reviewform_name"
                            >Tên <small>*</small></label>
                          <div class="input-group">
                            <div class="input-group-text">
                              <i class="icon-user"></i>
                            </div>
                            <input required type="text" id="template_reviewform_name" name="name"
                            value="{{ old('template_reviewform_name') }}"class="form-control required"/>
                          </div>
                        </div>
                        <div class="col-6 mb-3">
                          <label for="template_reviewform_email"
                            >Email <small>*</small></label
                          >
                          <div class="input-group">
                            <div class="input-group-text">@</div>
                            <input required type="email" id="template_reviewform_email" name="email"
                            value="{{ old('template_reviewform_email') }}" class="required email form-control"/>
                          </div>
                        </div>

                        <div class="w-100"></div>

                        <div class="col-12 mb-3">
                          <label for="template_reviewform_rating"
                            >Đánh giá</label
                          >
                          <select
                            id="template_reviewform_rating"
                            name="vote"
                            class="form-select"
                          >
                            <option value="">-- Lựa chọn --</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                          </select>
                        </div>

                        <div class="w-100"></div>

                        <div class="col-12 mb-3">
                          <label for="template_reviewform_comment"
                            >Nội dung <small>*</small></label
                          >
                          <textarea required 
                            class="required form-control"
                            id="template_reviewform_comment"
                            name="content"
                            rows="6"
                            cols="30"
                          >{{ old('template_reviewform_comment') }}</textarea>
                        </div>
                        <input type="hidden" name="product_id" value="{{ $detail->id }}">
                        <div class="col-12">
                          <button class="button button-3d m-0"
                            type="submit">
                            Submit Review
                          </button>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                      >
                        Đóng
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr class="mb-1">
            <div class="row">
              <div class="col-lg-12 col-12">
                <div class="tabs mb-0">
                  <ul class="tab-nav d-flex list-unstyled mb-40">
                    <li class="nav-item active">
                      <a href="#tabs-1"
                        ><span class="d-none d-md-inline-block">
                          @lang('Description')</span
                        ></a
                      >
                    </li>
                    <li class="nav-item">
                      <a href="#tabs-2"
                        ><span class="d-none d-md-inline-block">
                          @lang('Reviews') ({{ count($review) }})
                        </span>
                      </a>
                    </li>
                  </ul>
                  <div class="tab-container">
                    <div class="tab-content active" id="tabs-1">
                      {!! $content !!}
                    </div>
                    <div class="tab-content" id="tabs-2">
                      <div id="reviews" class="clearfix">
                        <div style="max-height: 300px;overflow-y: auto;" class="over">
                          <ol class="commentlist clearfix">
                            @if(($review))
                              @foreach($review as $review)
                                <li class="comment even thread-even depth-1"id="li-comment-1">
                                  <div id="comment-1"class="comment-wrap clearfix">
                                    <div class="comment-meta">
                                      <div class="comment-author vcard">
                                        <span class="comment-avatar clearfix">
                                          <img alt="Image"src="https://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60" height="60"width="60"/>
                                        </span>
                                      </div>
                                    </div>
                                    <div class="comment-content clearfix">
                                      <div style="font-weight: bold;" class="comment-author ">
                                        {{ $review->name }}
                                        <span class="d-flex">
                                          <a>{{ $review->created_at }}</a>
                                          @if (Auth::user() && Auth::user()->user_type == 'admin' )
                                            <span style="margin-left: 10px; color:#333">
                                              <a href="{{ route('admin.remove.review',['id' => $review->id]) }}">Xóa</a>
                                            </span>
                                          @endif
                                        </span>
                                      </div>
                                      <p>
                                        {{ $review->content }}
                                      </p>
                                      <div class="review-comment-ratings">
                                        @if($review->vote && $review->vote >0)
                                          @for ($i=0; $i <  $review->vote ; $i++)
                                            <i class="icon-star3" style="color: rgb(195, 255, 0)"></i>
                                          @endfor
                                        @endif
                                      </div>
                                    </div>
                                    <div class="clear"></div>
                                  </div>
                                </li>
                              @endforeach
                            @endif
                          </ol>
                        </div>
                        <a
                          href="#"
                          data-bs-toggle="modal"
                          data-bs-target="#reviewFormModal"
                          class="button m-0 float-end"
                          >Thêm Review</a
                        >
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr>
        @if (isset($relatedPosts) && count($relatedPosts) > 0)
          <div>
            <h4 class="text-uppercase bold my-4">@lang('Related Products')</h4>
            <div class="swiper-relate">
              <div class="swiper-wrapper">
                @foreach ($relatedPosts as $item)
                  <div class="swiper-slide">
                    @php
                      $title = $item->json_params->title->{$locale} ?? $item->title;
                      $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                      $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                      $date = date('d/m/Y', strtotime($item->created_at));
                      // Viet ham xu ly lay slug
                      $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $title_item, $item->id, 'detail', $item->taxonomy_title);
                      $price = $item->json_params->price ?? null;
                      $price_old = $item->json_params->price_old ?? null;
                    @endphp

                    <div class="product-detail mb-4">
                      <a href="{{ $alias }}" class="product-image p-2">
                        <img class="img-fluid w-100" src="{{ $image }}" alt="{{ $title }}">
                      </a>
                      <div class="product-desc p-2">
                        <div class="product-title">
                          <h3>
                            <a href="{{ $alias }}">{{ Str::limit($title, 38) }}</a>
                          </h3>
                        </div>
                        <div class="product-price">
                          <ins>{{ number_format($price, 0,',','.') . ' đ'  }}</ins>
                          @if ($price_old)
                            <del>{{ number_format($price_old, 0,',','.') . ' đ' }}</del>
                          @endif
                        </div>
                        <div class="product-button d-flex justify-content-between mt-4 mb-2">
                          <a href="{{ $alias }}" class="button-detail">Chi tiết</a>
                          <div class="button-cart">Thêm vào giỏ</div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        @endif
      </div>
    </div>
  </section>
@endsection

@push('script')
  <script>
    $(function() {
      $('.nav-item').click(function() {
        $('.nav-item').removeClass('active')
        $(this).addClass('active')
        $('.tab-content').removeClass('active')
        let id = $(this).children('a').attr('href')
        $(id).addClass('active')
      })
    })
  </script>
@endpush
