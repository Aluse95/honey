<div id="gotoTop" class="icon-angle-up"></div>

<script src="<?php echo e(asset('themes/frontend/honey/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/honey/js/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/honey/js/slick.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/honey/js/style.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<script>
  $(function() {
    $("#form-booking").submit(function(e) {
    //  $(".form-process").show();
      e.preventDefault();
      var form = $(this);
      var url = form.attr('action');
      $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(),
        success: function(response) {
          form[0].reset();
        //  $(".form-process").hide();
          alert(response.message);
          location.reload();
        },
        error: function(response) {
        //  $(".form-process").hide();
          // Get errors
          if (typeof response.responseJSON.errors !== 'undefined') {
            var errors = response.responseJSON.errors;
            // Foreach and show errors to html
            var elementErrors = '';
            $.each(errors, function(index, item) {
              if (item === 'CSRF token mismatch.') {
                item = "<?php echo app('translator')->get('CSRF token mismatch.'); ?>";
              }
              elementErrors += '<p>' + item + '</p>';
            });
            $(".form-result").html(elementErrors);
          } else {
            var errors = response.responseJSON.message;
            if (errors === 'CSRF token mismatch.') {
              $(".form-result").html("<?php echo app('translator')->get('CSRF token mismatch.'); ?>");
            } else if (errors === 'The given data was invalid.') {
              $(".form-result").html("<?php echo app('translator')->get('The given data was invalid.'); ?>");
            } else {
              $(".form-result").html(errors);
            }
          }
        }
      });
    });

    // Form ajax default
    $(".form_ajax").submit(function(e) {
      e.preventDefault();
      var form = $(this);
      var url = form.attr('action');
      $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(),
        success: function(response) {
          form[0].reset();
          alert(response.message);
          location.reload();
        },
        error: function(response) {
          // Get errors
          console.log(response);
          var errors = response.responseJSON.errors;
          // Foreach and show errors to html
          var elementErrors = '';
          $.each(errors, function(index, item) {
            if (item === 'CSRF token mismatch.') {
              item = "<?php echo app('translator')->get('CSRF token mismatch.'); ?>";
            }
            elementErrors += '<p>' + item + '</p>';
          });
        }
      });
    });

    // Add to cart
    $(document).on('click', '.add-to-cart', function() {
      let _root = $(this);
      let _html = _root.html();
      let _id = _root.attr("data-id");
      let _quantity = _root.attr("data-quantity") ?? $("#quantity").val();
      if (_id > 0) {
        _root.html("<?php echo app('translator')->get('Processing...'); ?>");
        var url = "<?php echo e(route('frontend.order.add_to_cart')); ?>";
        $.ajax({
          type: "POST",
          url: url,
          data: {
            "_token": "<?php echo e(csrf_token()); ?>",
            "id": _id,
            "quantity": _quantity
          },
          success: function(data) {
            _root.html(_html);
            window.location.reload();
          },
          error: function(data) {
            // Get errors
            var errors = data.responseJSON.message;
            alert(errors);
            location.reload();
          }
        });
      }
    });

    $(".update-cart").change(function(e) {
      e.preventDefault();
      var ele = $(this);
      $.ajax({
        url: '<?php echo e(route('frontend.order.cart.update')); ?>',
        method: "PATCH",
        data: {
          _token: '<?php echo e(csrf_token()); ?>',
          id: ele.parents("tr").attr("data-id"),
          quantity: ele.parents("tr").find(".qty").val()
        },
        success: function(response) {
          window.location.reload();
        }
      });
    });

    $(".remove-from-cart").click(function(e) {
      e.preventDefault();
      var ele = $(this);
      if (confirm("<?php echo e(__('Are you sure want to remove?')); ?>")) {
        $.ajax({
          url: '<?php echo e(route('frontend.order.cart.remove')); ?>',
          method: "DELETE",
          data: {
            _token: '<?php echo e(csrf_token()); ?>',
            id: ele.parents("tr").attr("data-id")
          },
          success: function(response) {
            window.location.reload();
          }
        });
      }
    });
    $(".del-cart").click(function(e) {
      e.preventDefault();
      var ele = $(this);
      if (confirm("<?php echo e(__('Are you sure want to remove?')); ?>")) {
        $.ajax({
          url: '<?php echo e(route('frontend.order.cart.remove')); ?>',
          method: "DELETE",
          data: {
            _token: '<?php echo e(csrf_token()); ?>',
            id: ele.attr("data-id")
          },
          success: function(response) {
            window.location.reload();
          }
        });
      }
    });

  });

  const filterArray = (array, fields, value) => {
    fields = Array.isArray(fields) ? fields : [fields];
    return array.filter((item) => fields.some((field) => item[field] === value));
  };

//  $(function(){
//     function show_popup(){
//         $(".click_show_pop").click();
//     };
//     window.setTimeout( show_popup, 3000 ); // 5 seconds
//   });
  const swiper = new Swiper('.swiper', {
    loop: true,
    autoplay: {
      delay: 5000,
    },
  });
  const swiper_2 = new Swiper('.swiper-relate', {
    loop: true,
    slidesPerView: 4,
    spaceBetween: 15,
 
    autoplay: {
      delay: 5000,
    },
  });
  $('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
  });
  $('.slider-nav').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: true,
    focusOnSelect: true
  });

  $('a[data-slide]').click(function(e) {
    e.preventDefault();
    var slideno = $(this).data('slide');
    $('.slider-nav').slick('slickGoTo', slideno - 1);
  });
</script>
 
<?php if(isset($web_information->source_code->footer)): ?>
<?php echo $web_information->source_code->footer; ?>

<?php endif; ?><?php /**PATH D:\xampp\htdocs\honey\resources\views/frontend/panels/scripts.blade.php ENDPATH**/ ?>