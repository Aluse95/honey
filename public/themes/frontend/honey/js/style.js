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
    if($(this).parent().children('.cart-container').css('display') == 'none') {
      $(this).parent().children('.cart-container').css('display' , 'block')
    } else {
      $(this).parent().children('.cart-container').hide()
    }
  })
  $(window).click(function(e) {
    if (!$('.shopping-cart').is(e.target) && $('.shopping-cart').has(e.target).length == 0) {
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
})


