<div class="modal fade signup" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" id="signup">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
          @lang('Welcome to our website')
        </h4>
        <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
      </div>
      <div class="modal-body">
        <form class="row" id="signup_form" action="{{ route('frontend.signup.post') }}" method="POST">
          @csrf
          <div class="col-12">
            <h3>
              @lang('Signup an account')
            </h3>
          </div>

          <div class="col-12 form-group">
            <label for="name">@lang('Fullname') <small class="text-danger">*</small></label>
            <input type="text" id="name" name="name" value="" class="form-control" required />
          </div>
          <div class="col-12 form-group">
            <label for="phone">@lang('Phone') <small class="text-danger">*</small></label>
            <input type="text" id="phone" name="phone" value="" class="form-control" required />
          </div>
          <div class="col-12 form-group">
            <label for="email">@lang('Username') <small class="text-danger">*</small></label>
            <input type="text" id="email" name="email" value="" class="form-control" required />
          </div>

          <div class="col-12 form-group">
            <label for="password">@lang('Password') <small class="text-danger">*</small></label>
            <input type="password" id="password" name="password" value="" class="form-control" required />
          </div>

          <div class="col-12 form-group">
            <label for="affiliate_code">@lang('Affiliate code')</label>
            <input type="text" id="affiliate_code" name="affiliate_code"
              value="{{ session('affiliate_code') ?? '' }}" class="form-control" />
          </div>

          <div class="col-12 form-group">
            <button class="btn btn-primary m-0" type="submit">
              @lang('Signup')
            </button>
            <button class="btn btn-secondary m-0" type="button" data-bs-dismiss="modal" aria-hidden="true">
              @lang('Cancel')
            </button>
            <a href="#" class="float-end d-none">
              @lang('Forgot Password?')
            </a>
          </div>

          <div class="col-12 form-group signup_result d-none">
            <div class="alert alert-warning" role="alert">
              @lang('Processing...')
            </div>
          </div>

          @php
            $referer = request()->headers->get('referer');
            $current = url()->full();
          @endphp
          <input type="hidden" name="referer" value="{{ $referer }}">
          <input type="hidden" name="current" value="{{ $current }}">

        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $(function() {
    $("#signup_form").submit(function(e) {
      $(".signup_result .alert").text("@lang('Processing...')");
      $(".signup_result").removeClass('d-none');

      e.preventDefault();
      var form = $(this);
      var url = form.attr('action');
      $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(),
        success: function(response) {
          form[0].reset();
          location.reload();
        },
        error: function(response) {
          console.log(response);
          // Get errors
          if (typeof response.responseJSON.errors !== 'undefined') {
            var errors = response.responseJSON.errors;
            // Foreach and show errors to html
            var elementErrors = '';
            $.each(errors, function(index, item) {
              if (item === 'CSRF token mismatch.') {
                item = "@lang('CSRF token mismatch.')";
              }
              elementErrors += '<p>' + item + '</p>';
            });
            $(".signup_result .alert").html(elementErrors);
          } else {
            var errors = response.responseJSON.message;
            if (errors === 'CSRF token mismatch.') {
              $(".signup_result .alert").html("@lang('CSRF token mismatch.')");
            } else if (errors === 'The given data was invalid.') {
              $(".signup_result .alert").html("@lang('The given data was invalid.')");
            } else {
              $(".signup_result .alert").html(errors);
            }
          }
        }
      });
    });
  });
</script>
