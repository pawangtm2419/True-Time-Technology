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
		$path = "http://yusrafashion.com/$path";
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
<a href="javascript:void(0)" class="pull-right" onclick="cartHide();"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>
<table width="100%" class="table-condensed" style="text-align:left !important; border-bottom:1px dashed #DDD; margin-bottom:5px;">
<tr> 
<td align="left" width="40"><img src="<?php echo str_replace(" ","+",$rowItem['productimage']);?>" width="30" height="30" class="img-responsive" alt="" /> </td>
<td align="left" colspan="2"><?php echo $rowItem['productname'];?></td>
</tr>
<tr>
 <td align="left">
 <input type="number" class="form-control quantitys<?php echo $rowItem['productid'];?>" min="1" style="width:40px; padding:0; height:24px; border:1px solid #DDD; border-radius:2px;" onchange="textQutit($(this).attr('id'));"  id="<?php echo $rowItem['productid'];?>"   style="width:70px;" maxlength="3" value="<?php echo $rowItem['quantity'];?>" />
 </td>
 <td align="left">
  Rs. <?php echo number_format($rowItem['total'],2);?> 
  </td>
  <td align="right">
  <a  href="javascript:void(0)" id="<?php echo $rowItem['id'];?>"  onClick="delCart($(this).attr('id'));" style="color:red;"><i class="fa fa-trash" aria-hidden="true"></i>
</a>
  </td>
 </tr>
 </table>
  <?php
    }
	}
	else
	{
	echo " <div><h4 class='text-center'>Your cart is empty !</h4></div>";
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
    <?php if($resTotal['totals']!=""){?>
  <div style="width:100%; padding:5px 0;"><strong>Total Price : </strong>
  <span class="pull-right"><strong>Rs.
  <?php if($resTotal['totals']){echo number_format($resTotal['totals'],2);}else{ echo "0.00";}?>
  <?php $_SESSION['tott'] = $resTotal['totals']; ?></strong></span>
  </div>
  <div style="width:100%; padding:5px 0;">
   <a class="btn btn-sm btn-primary" style="width:100%;" href="view-cart.php">View Cart</a> 
   <?php } ?>
  </div>