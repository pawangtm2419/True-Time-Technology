<script type="text/javascript"> 
   function addCart(id){
	  var pid=id;
	  var pimg=$(".pimg"+id).val();
	  var pname=$(".pname"+id).val();
	  var pasale=$(".pasale"+id).val().trim();
	  var pareg=$(".pareg"+id).val().trim();;
	  var qnti=$(".quantity"+id).val();
	  var add="add";
	  $.ajax({
		  type:"post",
		  beforeSend: function ( xhr ) {
           $('.process'+id).show();  
          },
		  url:"incs/cart.php",
		  cache: false,
		  data:"pid1="+pid+"&pimg1="+pimg+"&pname1="+pname+"&pasale1="+pasale+"&pareg1="+pareg+"&add1="+add+"&qnti1="+qnti,
		  success:function(data){	
			 $('.process'+id).hide();
			 $(".man").html(data);	
				cartItem(); 
				viewcart();
				viewcarts();
		  }
	  });
	};
	function cartItem(){
      $.ajax({ 
	    url: "incs/cartItems.php",
        context: document.body,
        success: function(data){
          $(".countItems").html(data);	
            }
	   });
    };
	function viewcart(){
      $.ajax({ 
	    url: "incs/viewcart.php",
        context: document.body,
        success: function(data){
          $(".cart-items").html(data);
             }
	   });
    };
	function viewcarts(){
      $.ajax({ 
	    url: "incs/viewcarts.php",
        context: document.body,
        success: function(data){
 		  $(".cartbos").html(data);	
            }
	   });
    };
	function delCart(id){
	 if (confirm("Are you sure want to delete cart item ?"))
         {
		  $.ajax({
			  type:"post",
			  url:"incs/cart-del.php",
			  cache: false,
			  data:"orderId="+id,
			  success:function(data){
				cartItem(); 
				viewcart();
				viewcarts();
			  }
		  });
	 };
    } ;
	function cartdetaiils(){
	$(".cartbos").slideToggle();
	};
	function cartHide(){
	$(".cartbos").hide();
	};
   function textQutit(id){
		var nquity =  $('.quantitys'+id).val();
		  $.ajax({
			  type:"post",
			  url:"incs/getPrice.php",
			  cache: false,
			  data:"priceId="+id+"&nquity1="+nquity,
			  success:function(data){
				//cartItem(); 
				viewcart();
				viewcarts();
			  }
		  });
    } ;
	function textQutit1(id){
		var nquity =  $('.quantitys1'+id).val();
		  $.ajax({
			  type:"post",
			  url:"incs/getPrice.php",
			  cache: false,
			  data:"priceId="+id+"&nquity1="+nquity,
			  success:function(data){
				//cartItem(); 
				viewcart();
				viewcarts();
			  }
		  });
    } ;
</script>

<script type="text/javascript">
$(document).ready(function(){
$('.fa-spin').hide();

$(".megamenu").megamenu();
cartItem(); 
viewcarts();
viewcart();
$('#image-gallery').lightSlider({
	gallery:true,
	item:1,
	thumbItem:5,
	autoWidth: false,
	slideMargin: 0,
	speed:500,
	auto:false,
	loop:false,
	onSliderLoad: function() {
		$('#image-gallery').removeClass('cS-hidden');
	}  
 });

});
</script>
