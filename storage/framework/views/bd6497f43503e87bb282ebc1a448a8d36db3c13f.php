<?php if(isset($popup)): ?>
  <div class="modal fade popup" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">
            <?php echo e($popup->title ?? ''); ?>

          </h4>
          <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
        </div>
        <div class="modal-body">
          <?php if(isset($popup->image)): ?>
            <p class="text-center"><img src="<?php echo e($popup->image); ?>" alt="" class="w-100"></p>
          <?php endif; ?>
          <?php if(isset($popup->content)): ?>
            <?php echo $popup->content; ?>

          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(function() {
      $(".popup").modal('toggle');
      var counter = <?php echo e($popup->duration ?? 999); ?>;
      var interval = setInterval(function() {
        counter--;
        if (counter == 0) {
          $('.popup').modal('hide');
          clearInterval(interval);
        }
      }, 1000);
    });
  </script>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\honey\resources\views/frontend/components/popup/default.blade.php ENDPATH**/ ?>