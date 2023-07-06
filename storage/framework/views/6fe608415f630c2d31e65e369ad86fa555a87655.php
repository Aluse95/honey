

<?php
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
?>

<?php $__env->startSection('content'); ?>
  <section id="page-title">
    <div class="container text-center">
      <h1 class="mb-3"><?php echo e($taxonomy_title); ?></h1>
      <span><?php echo e($title); ?></span>
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
                  <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div>
                    <img class="img-fluid w-100" src="<?php echo e($value); ?>" alt="product image">
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="slider slider-nav pt-4">
                  <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div>
                    <img class="img-fluid w-75 m-auto" src="<?php echo e($value); ?>" alt="product image">
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
              <div class="col-md-6 product-desc">
                <h3 class="mb-4"><?php echo e($title); ?></h3>
                <div class="line"></div>
                <div class="d-flex align-items-center justify-content-between mt-4 mb-3">
                  <div class="product-price">
                    <del><?php echo e(isset($price_old) && $price_old > 0 ? number_format($price_old, 0, ',', '.') . ' đ' : ""); ?></del>
                    <ins class="ms-3"><?php echo e(isset($price) && $price > 0 ? number_format($price, 0, ',', '.') . ' đ' : __('Contact')); ?></ins>
                  </div>
                  <div class="product-rating">
                    <?php if($vote): ?>
                      <?php
                        $full = floor($vote);
                        $empty = 5 - $full;
                        $half = $vote - $full;
                        if($half > 0.4) {
                          $empty--;
                        }
                      ?>
                      <?php for($i=0; $i < $full ; $i++): ?>
                        <i class="icon-star3" style="color: rgb(195, 255, 0)"></i>
                      <?php endfor; ?>
                      <?php if($half > 0.4): ?>
                        <i class="icon-star-half-full" style="color: rgb(195, 255, 0)"></i>
                      <?php endif; ?>
                      <?php if($empty): ?>
                        <?php for($i = 0; $i < $empty; $i++): ?>
                          <i class="icon-star-empty"></i>
                        <?php endfor; ?>
                      <?php endif; ?>
                    <?php else: ?>
                      <?php for($i = 0; $i < 5; $i++): ?>
                        <i class="icon-star-empty"></i>
                      <?php endfor; ?>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="desc-detail">
                  <?php echo $brief; ?>

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
                  <button type="button" data-id="<?php echo e($detail->id); ?>" class="add-to-cart ms-3">
                    <?php echo app('translator')->get('Add to cart'); ?>
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
                      <form class="row mb-0" action="<?php echo e(route('frontend.review')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="col-6 mb-3">
                          <label for="template_reviewform_name"
                            >Tên <small>*</small></label>
                          <div class="input-group">
                            <div class="input-group-text">
                              <i class="icon-user"></i>
                            </div>
                            <input required type="text" id="template_reviewform_name" name="name"
                            value="<?php echo e(old('template_reviewform_name')); ?>"class="form-control required"/>
                          </div>
                        </div>
                        <div class="col-6 mb-3">
                          <label for="template_reviewform_email"
                            >Email <small>*</small></label
                          >
                          <div class="input-group">
                            <div class="input-group-text">@</div>
                            <input required type="email" id="template_reviewform_email" name="email"
                            value="<?php echo e(old('template_reviewform_email')); ?>" class="required email form-control"/>
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
                          ><?php echo e(old('template_reviewform_comment')); ?></textarea>
                        </div>
                        <input type="hidden" name="product_id" value="<?php echo e($detail->id); ?>">
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
                          <?php echo app('translator')->get('Description'); ?></span
                        ></a
                      >
                    </li>
                    <li class="nav-item">
                      <a href="#tabs-2"
                        ><span class="d-none d-md-inline-block">
                          <?php echo app('translator')->get('Reviews'); ?> (<?php echo e(count($review)); ?>)
                        </span>
                      </a>
                    </li>
                  </ul>
                  <div class="tab-container">
                    <div class="tab-content active" id="tabs-1">
                      <?php echo $content; ?>

                    </div>
                    <div class="tab-content" id="tabs-2">
                      <div id="reviews" class="clearfix">
                        <div style="max-height: 300px;overflow-y: auto;" class="over">
                          <ol class="commentlist clearfix">
                            <?php if(($review)): ?>
                              <?php $__currentLoopData = $review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                        <?php echo e($review->name); ?>

                                        <span class="d-flex">
                                          <a><?php echo e($review->created_at); ?></a>
                                          <?php if(Auth::user() && Auth::user()->user_type == 'admin' ): ?>
                                            <span style="margin-left: 10px; color:#333">
                                              <a href="<?php echo e(route('admin.remove.review',['id' => $review->id])); ?>">Xóa</a>
                                            </span>
                                          <?php endif; ?>
                                        </span>
                                      </div>
                                      <p>
                                        <?php echo e($review->content); ?>

                                      </p>
                                      <div class="review-comment-ratings">
                                        <?php if($review->vote && $review->vote >0): ?>
                                          <?php for($i=0; $i <  $review->vote ; $i++): ?>
                                            <i class="icon-star3" style="color: rgb(195, 255, 0)"></i>
                                          <?php endfor; ?>
                                        <?php endif; ?>
                                      </div>
                                    </div>
                                    <div class="clear"></div>
                                  </div>
                                </li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
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
        <?php if(isset($relatedPosts) && count($relatedPosts) > 0): ?>
          <div>
            <h4 class="text-uppercase bold my-4"><?php echo app('translator')->get('Related Products'); ?></h4>
            <div class="swiper-relate">
              <div class="swiper-wrapper">
                <?php $__currentLoopData = $relatedPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="swiper-slide">
                    <?php
                      $title = $item->json_params->title->{$locale} ?? $item->title;
                      $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                      $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                      $date = date('d/m/Y', strtotime($item->created_at));
                      // Viet ham xu ly lay slug
                      $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $title_item, $item->id, 'detail', $item->taxonomy_title);
                      $price = $item->json_params->price ?? null;
                      $price_old = $item->json_params->price_old ?? null;
                    ?>

                    <div class="product-detail mb-4">
                      <a href="<?php echo e($alias); ?>" class="product-image p-2">
                        <img class="img-fluid w-100" src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>">
                      </a>
                      <div class="product-desc p-2">
                        <div class="product-title">
                          <h3>
                            <a href="<?php echo e($alias); ?>"><?php echo e(Str::limit($title, 38)); ?></a>
                          </h3>
                        </div>
                        <div class="product-price">
                          <ins><?php echo e(number_format($price, 0,',','.') . ' đ'); ?></ins>
                          <?php if($price_old): ?>
                            <del><?php echo e(number_format($price_old, 0,',','.') . ' đ'); ?></del>
                          <?php endif; ?>
                        </div>
                        <div class="product-button d-flex justify-content-between mt-4 mb-2">
                          <a href="<?php echo e($alias); ?>" class="button-detail">Chi tiết</a>
                          <div class="button-cart">Thêm vào giỏ</div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\honey\resources\views/frontend/pages/product/detail.blade.php ENDPATH**/ ?>