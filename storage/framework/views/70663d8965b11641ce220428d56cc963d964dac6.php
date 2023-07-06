<!-- jQuery 3 -->
<script src="<?php echo e(asset('themes/admin/js/jquery.min.js')); ?>"></script>
<!-- CKEditor-->
<script src="//cdn.ckeditor.com/4.17.2/full/ckeditor.js"></script>
<!-- Custom & config js -->
<script src="<?php echo e(asset('themes/admin/js/custom.js')); ?>"></script>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo e(asset('themes/admin/js/bootstrap.min.js')); ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo e(asset('themes/admin/plugins/slimScroll/jquery.slimscroll.min.js')); ?>"></script>
<!-- Select2 -->
<script src="<?php echo e(asset('themes/admin/plugins/select2/select2.full.min.js')); ?>"></script>
<!-- DatePicker -->
<script src="<?php echo e(asset('themes/admin/plugins/datepicker/bootstrap-datepicker.js')); ?>"></script>
<script src="<?php echo e(asset('themes/admin/plugins/timepicker/bootstrap-timepicker.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('themes/admin/js/app.min.js')); ?>"></script>

<script src="<?php echo e(asset('themes/admin/plugins/nestable/jquery.nestable.min.js')); ?>"></script>

<script>
  $(".select2").select2();

  $('.datepicker').datepicker({
    autoclose: true,
    todayHighlight: true,
    format: 'dd/mm/yyyy',
    language: 'vn'
  });

  //Timepicker
  $(".timepicker").timepicker({
    showInputs: false
  });

  $('.lfm').filemanager('other', {
    prefix: route_prefix
  });

  const filterArray = (array, fields, value) => {
    fields = Array.isArray(fields) ? fields : [fields];
    return array.filter((item) => fields.some((field) => item[field] === value));
  };

  function formatDate(date) {
    var d = new Date(date),
      month = '' + (d.getMonth() + 1),
      day = '' + d.getDate(),
      year = d.getFullYear();

    if (month.length < 2)
      month = '0' + month;
    if (day.length < 2)
      day = '0' + day;

    return [day, month, year].join('/');
  }
</script>
<?php /**PATH D:\xampp\htdocs\honey\resources\views/admin/panels/scripts.blade.php ENDPATH**/ ?>