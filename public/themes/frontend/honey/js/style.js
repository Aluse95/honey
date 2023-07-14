$(function() {
  $('#header .search').click(function() {
    $(this).children('.search-form').show()
  })
  $(window).click(function(e) {
    if (!$('.search').is(e.target) && $('.search').has(e.target).length == 0) {
      $('.search-form').hide();
    }
  })
  $('#header .shopping-cart').click(function() {
    $(this).children('.cart-container').show()
  })
  
  $(window).click(function(e) {
    if (!$('.shopping-cart').is(e.target) && !$('.shopping-cart').has(e.target).length) {
      $('.cart-container').hide();
    }
  })

  $('.icon-menu').click(function() {
    $('.overlay').show();
    $('.menu-mobile').css('transform','translateX(0)');
  })
  $('.close').click(function() {
    $('.menu-mobile').css('transform','translateX(-100%)');
    $('.overlay').hide();
  })
  $('.overlay').click(function() {
    $('.menu-mobile').css('transform','translateX(-100%)');
    $(this).hide();
  })
  $('.number-sub').click(function() {
    let value = $(this).parent().children('.number').val()
    if(value > 1) {
      value--
      $(this).parent().children('.number').val(value)
    }
  })
  $('.number-add').click(function() {
    let value = $(this).parent().children('.number').val()
    value++
    $(this).parent().children('.number').val(value)
  })
  $('.minus').click(function() {
    let value = $(this).parent().children('.qty').val()
    if(value > 1) {
      value--
      $(this).parent().children('.qty').val(value).change()
    }
  })
  $('.plus').click(function() {
    let value = $(this).parent().children('.qty').val()
    value++
    $(this).parent().children('.qty').val(value).change()
  })
  $('.modal').click(function(e) {
    if (!$('.card').is(e.target) && $('.card').has(e.target).length == 0) {
      $('.modal').hide();
    }
  })
  $('#header .user').click(function() {
    $('.modal').toggle()
  })
  $('.btn-register').click(function() {
    $('#modal-sign-up').hide()
    $('#modal-register').show()
  })
  $('.sub-container').parent().children().children('.icon-down').html('<i class="fa-solid fa-chevron-down"></i>')
})



