// JavaScript Document
 jQuery(document).ready(function($) {
/*======header=============*/
 
   $(window).scroll(function(){
		if ($(window).scrollTop() > 0) {
		   $('.header_bg').addClass('fixed');
		 }
		else {
		   $('.header_bg').removeClass('fixed');
		 }
    });
   
   $(window).load(function(){
	if ($(window).scrollTop() > 0)
	{
 	 $('.header_bg').addClass('fixed');
	}
   });
  /*========== accordion =========*/
  
      $("#accordions > li").append("<i class='fa fa-angle-down pull-right'></i>");
	  $("#accordions > li:last").css("border","none");
	  $("#accordions > li").click(function(){
	 							   
	  if(false==$(this).next().is(':visible'))
	  {
	  $('#accordions > ul').slideUp(300);
	  }
      $(this).next().slideToggle(300);});$('#accordions > ul:eq(0)').show();
	 $("#accordions > ul > li > a").append("<i class='fa fa-angle-right pull-left'></i>");
	 
 /* ====== Carousel ========*/
 
     $(".owl-portfolio").owlCarousel({
		items : 5,
		lazyLoad : true,
		autoPlay : false,
		stopOnHover : true,
		pagination : false,
		navigation : true
	});
/* ====== enlarge product ========*/ 
   
 
 });
