<div class="modal">
  <div id="modal-sign-up">
    <div class="wrap-card">
      <div class="card m-auto" style="max-width: 540px">
        <div class="card-header py-5 text-center">
          <h3 class="mb-0 fw-normal">Chào mừng quay trở lại !</h3>
        </div>
        <div class="card-body mx-auto py-5" style="max-width: 70%">
          <form
            id="login_form"
            name="login_form"
            class="mb-0 row"
            action="<?php echo e(route('frontend.login.post')); ?>"
            method="post"
          >
          <?php echo csrf_field(); ?>
            <div class="col-12 mb-3">
              <input
                type="text"
                name="email"
                value=""
                class="form-control not-dark"
                placeholder="<?php echo app('translator')->get('Username'); ?>"
                required
              />
            </div>
    
            <div class="col-12 my-4">
              <input
                type="password"
                name="password"
                value=""
                class="form-control not-dark"
                placeholder="<?php echo app('translator')->get('Password'); ?>"
              />
            </div>
    
            <div class="col-12 mt-4 mb-5">
              <button
                class="button login_button w-100 m-0"
                id="login-form-submit"
                name="login-form-submit"
                value="login"
              >
                <?php echo app('translator')->get('Login'); ?>
              </button>
            </div>
            
            <div class="col-12 form-group login_result d-none">
                <div class="alert alert-warning" role="alert">
                  <?php echo app('translator')->get('Processing...'); ?>
                </div>
              </div>
    
              <?php
                $referer = request()->headers->get('referer');
                $current = url()->full();
              ?>
              <input type="hidden" name="referer" value="<?php echo e($referer); ?>">
              <input type="hidden" name="current" value="<?php echo e($current); ?>">
          </form>
        </div>
        <div class="card-footer py-5 text-center">
          <p class="mb-0">
            Chưa có tài khoản? <span class="btn-register text-primary">Đăng ký</span></a>
          </p>
        </div>
      </div>
    </div>
  </div>
  <div id="modal-register">
    <div class="wrap-card">
      <div class="card m-auto" style="max-width: 540px">
        <div class="card-header py-5 text-center">
          <h3 class="mb-0 fw-normal"><?php echo app('translator')->get('Signup an account'); ?></h3>
        </div>
        <div class="card-body mx-auto py-5" style="max-width: 70%">
          <form
            id="signup_form"
            name="signup_form"
            class="mb-0 row"
            action="<?php echo e(route('frontend.signup.post')); ?>"
            method="post"
          >
          <?php echo csrf_field(); ?>
            <div class="col-12">
              <input
                type="text"
                name="name"
                value=""
                class="form-control not-dark"
                placeholder="<?php echo app('translator')->get('Username'); ?>"
                required
              />
            </div>
            
            <div class="col-12 mt-4">
              <input
                type="text"
                name="phone"
                value=""
                class="form-control not-dark"
                placeholder="<?php echo app('translator')->get('Phone'); ?>"
                required
              />
            </div>
    
            <div class="col-12 mt-4">
              <input
                type="text"
                name="email"
                value=""
                class="form-control not-dark"
                placeholder="<?php echo app('translator')->get('Email'); ?>"
                required
              />
            </div>
            
            <div class="col-12 mt-4">
              <input
                type="password"
                name="password"
                value=""
                class="form-control not-dark"
                placeholder="<?php echo app('translator')->get('Password'); ?>"
              />
            </div>
    
            <div class="col-12 my-5">
              <button
                class="button login_button w-100 m-0"
                name="login-form-submit"
                value="login"
              >
                <?php echo app('translator')->get('Signup an account'); ?>
              </button>
            </div>
              <div class="col-12 form-group signup_result d-none">
                <div class="alert alert-warning" role="alert">
                  <?php echo app('translator')->get('Processing...'); ?>
                </div>
              </div>
    
              <?php
                $referer = request()->headers->get('referer');
                $current = url()->full();
              ?>
              <input type="hidden" name="referer" value="<?php echo e($referer); ?>">
              <input type="hidden" name="current" value="<?php echo e($current); ?>">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<?php /**PATH D:\xampp\htdocs\honey\resources\views/frontend/components/popup/login.blade.php ENDPATH**/ ?>