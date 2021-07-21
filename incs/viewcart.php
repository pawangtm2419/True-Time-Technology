<?php
include('../config/connection.php');
	$userinfo = $_SESSION['mzs'];
	$cemail = $_SESSION['custEmail'];
       if($cemail == "")
       {
	$precart = mysql_query("SELECT * FROM cart WHERE userinfo='$userinfo' AND paymentstatus=' '");
       }
       else
       {
       $precart = mysql_query("SELECT * FROM cart WHERE usremail='$cemail' AND paymentstatus=' '");
       }
	$count = mysql_fetch_row($precart);
	
	 if($count > 0)
	 {
	    //viewcart = mysql_query("SELECT * FROM cart WHERE userinfo='$userinfo'");
          if($cemail == "")
           {
	    $viewcart = mysql_query("SELECT * FROM cart WHERE userinfo='$userinfo' AND paymentstatus=' '");
           }
           else
           {
            $viewcart = mysql_query("SELECT * FROM cart WHERE usremail='$cemail' AND paymentstatus=' '");
           }
	 while($rowItem = mysql_fetch_assoc($viewcart))
	 {
	 ?>
	 <?php
        $reportoutput .= "<tr>";
		$reportoutput .= '<td>'.'<center>'. $rowItem['productname'] .'<center>'.'</td>';
		//$cartOutput .= '<td>'. $path .'</td>';
		
		$reportoutput .= '<td>' .'<center>'. $rowItem['quantity'] .'</center>'. '</td>';
		$reportoutput .= '<td>'.'<center>' . $rowItem['total'] .'<center>'. '</td>';
		//$cartOutput .= '<td>' . $each_item['quantity'] . '</td>';
		$reportoutput .= '</tr>';
		$_SESSION['reportout'] = $reportoutput;
		$path = str_replace(" ","+",$rowItem['productimage']);
		$path = "/$path";
		$checkoutput .= "<tr>";
		$checkoutput .= '<td>'.'<center>'.'<img height=40px width=40px src='. $path .'>'.'</td>';
		$checkoutput .= '<td>'.'<center>'. $rowItem['productname'] .'<center>'.'</td>';
		$productor .=  $rowItem['productname'].' '.'('.$rowItem['quantity'].')'.' '.',';
		//$cartOutput .= '<td>'. $path .'</td>';
		
		$checkoutput .= '<td>' .'<center>'. $rowItem['quantity'] .'</center>'. '</td>';
		$checkoutput .= '<td>'.'<center>' . $rowItem['total'] .'<center>'. '</td>';
		//$cartOutput .= '<td>' . $each_item['quantity'] . '</td>';
		$checkoutput .= '</tr>';
		$_SESSION['outpt'] = $checkoutput;
		$_SESSION['productor'] = $productor;
	 ?>
     <div class="shoping_bag1">
		<div class="shoping_left">
			<div class="shoping1_of_1">
				<img src="<?php echo str_replace(" ","+",$rowItem['productimage']);?>" width="30" height="30" class="img-responsive" alt="" />
			</div>
            <div class="shoping1_of_2">
             <h4><?php echo $rowItem['productname'];?></h4>
            </div>
			<div class="shoping1_of_5">
			  <input type="number" class="form-control quantitys1<?php echo $rowItem['productid'];?>" min="1" onchange="textQutit1($(this).attr('id'));"  id="<?php echo $rowItem['productid'];?>"   style="width:70px;" maxlength="3" value="<?php echo $rowItem['quantity'];?>" />
			</div>
			<div class="clearfix"></div>
		</div>
        
		<div class="shoping_right">
			<p><span> <?php echo number_format($rowItem['total'],2);?></span>
             <a  href="javascript:void(0)" id="<?php echo $rowItem['id'];?>"  onClick="delCart($(this).attr('id'));" style="color:red;"><i class="fa fa-times-circle"></i></a>
            </p>
		</div>
		<div class="clearfix"></div>
	</div>
     
	<?php
    }
	}
	else
	{
	echo " <div class='shoping_bag1'><h4 class='text-center'>Your cart is empty !</h4></div>";
	}
         if($cemail == "")
           {
	    $totalusm = mysql_query("SELECT sum(total) as totals FROM cart where userinfo='$userinfo' AND paymentstatus=' '");
           }
           else
           {
            $totalusm = mysql_query("SELECT sum(total) as totals FROM cart WHERE usremail='$cemail' AND paymentstatus=' '");
           }
	
	  $resTotal =mysql_fetch_array($totalusm);
	?>
    
	<div class="shoping_bag2">
		<div class="shoping_left">
			<a class="btn1" href="contact-us.php">Place order</a>
		</div>
		<div class="shoping_right">
		<p class="tot"><span><i class="fa fa-usd"></i> <?php if($resTotal['totals']){echo number_format($resTotal['totals'],2);}else{ echo "0.00";}?></span></p>
		</div>
		<div class="clearfix"></div>
	</div>
    <?php $_SESSION['tott'] = $resTotal['totals']; ?>