 <?php

  class Admin extends sqlConnection{	  	  
	 public $database;
	 public $page;
	 # Initialise Admin Class
	 public function __construct(){
		 $this->database = new sqlConnection();
		 $this->page = $_SERVER['REQUEST_URI'];
	 }
		
  # Activate
  public function checkActivate( $act ){
	  $db = $this->database;
	  extract($act);
	if(isset($activate))
	{
		$count = 0;
		if( isset( $checkAll ) )
		 {
			foreach($checkAll as $id)
			{				
				$qry_active = $db->fireQuery("UPDATE `admin` SET `status` = 'Active' where `id` = '$id'");
				if($qry_active)
				{
					$count++;	
				}			
			}
			
			if( $count ){
				$_SESSION['msg'] = "Record(s) activated successfully!";
				header("location:$this->page");die();
			}			
		 }
		}
	  }

//Deactivate
    
public function checkDeactivate( $dact ){
	  $db = $this->database;
	  extract( $dact );
	  if(isset($deactivate))
	{
		 $count = 0;
		 if( isset( $checkAll ) )
		 {
			foreach($checkAll as $id)
			{
				$qry_inactive = $db->fireQuery("UPDATE `admin` SET `status` = 'Inactive' where `id` = '$id'");
				if($qry_inactive)
				{
					$count++;
				}
			}
			if( $count ) {
			  $_SESSION['msg'] = "Record(s) deactivated successfully!";
			  header("location:$this->page");die();		
			}
		 }
	   }
	  }	
	  
	  //delete  row wise /one at a  time
	  
	  public function deleteAdmin( $qry ){
		  $db = $this->database;
		  extract( $qry );
		  $rec_id=siteDecrypt($_REQUEST['id']);	
		  if(($_SESSION['user_id'])!=$rec_id){	
		// echo "delete from ".TBL_ADMIN." where id = '$rec_id'";exit;  
	 	     $qry = $db->fireQuery("delete from `admin` where id = '$rec_id'");
		  }
		if($qry)
		{
			$_SESSION['msg'] = "Record(s) deleted successfully!";
                        header("location:admin-mgmt.php");die(); 
		} else{
			
			//$_SESSION['msg']="Record(s) not deleted because u login this name!";
			 header("location:admin-mgmt.php");die(); 
			}
		 
		
	  }
	   
	   
	   //update password
	   
	   
	    public function changePassword( $qry ){
		  $db = $this->database;
		  extract( $qry );
		  $_SESSION["user_id"];
		  $oldpass=base64_encode(trim($old_password));
		  $newpass=base64_encode(trim($new_password));
		  $selpass=$db->fetchAssoc($db->fireQuery("select `password` from `admin` where id=".$_SESSION["user_id"].""));
		  if($selpass[0]["password"]==$oldpass){
     		  $updateqry = $db->fireQuery("update `admin` set `password`='$newpass' where id =".$_SESSION["user_id"]."");	  }
	 	
		if($updateqry)
		{
		  $_SESSION['msg'] = "Record(s) updated successfully!";
                  header("location:$this->page");die(); 
		}else
		{
	          $_SESSION['errormsg'] = "Record(s) Not updated successfully!";
                  header("location:$this->page");die(); 
		
		}
		 
		
	  }
	   //
	   //forgot password
	   
	     
	   /* public function forgotPassword( $qry ){
		$db = $this->database;
		extract( $qry );
		$email=trim($email);
		$get_rec=$db->fetchAssoc($db->fireQuery("select * from ".TBL_ADMIN." where email='$email'"));
		$count_rec = count($get_rec); 
		if($count_rec > 0)
		{
					$mail_user = $get_rec[0]['username']; 
					$mail_pass = base64_decode($get_rec[0]['password']); 
					$to      =  $email;
					$subject = 'Your Login Details';
					$message = 'Hello '.$get_rec[0]['username'].'';
					$message.= 'Your Password is '.$mail_pass;
					$headers = 'From: MyApp' . "\r\n" .
					'Reply-To: test@example.com' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();
			
					$mail = @mail($to, $subject, $message, $headers); 
		
		if(count($mail) > 0 )
		{
			
			$_SESSION['msg'] = "Check Your Mail To Get Password !";
            header("location:$this->page");die(); 
		}
		
		
		}
		else
		{
			$_SESSION['errormsg'] = "Mail Not Sent Successfully!";
            header("location:$this->page");die(); 
		
		}
		
		}
		*/ 
		
		
	   //
	   public function forgotPassword( $frmElements ){
		 if( isset( $frmElements ) ){
		   extract( $frmElements );
		  $db = $this->database;
		  $email = trim($email);	
	      $sel_query=$db->fetchAssoc($db->fireQuery("SELECT * FROM `admin` WHERE `email` =\"$email\""));
		  $email = $sel_query[0]["email"];
		  $pass  = base64_decode($sel_query[0]['password']);
		  $fullname = $sel_query[0]['username'];
		  $arr1 = array("%name%","%pass%","%email%");
		  $arr2 = array($fullname,$pass,$email) ;
		  $sq2  = $db->fetchAssoc($db->fireQuery("SELECT * FROM `admin` WHERE `title` = 'RetrievePassword'"));
		  $mailformat = str_replace($arr1,$arr2,$sq2[0]['mailformat']);
		  $subject=str_replace($arr1,$arr2,$sq2[0]['subject']);
		  $headers = "MIME-Version: 1.0\r\n";
		  $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		  $mailSender = @mail($email,$subject,$mailformat,$headers);
		 if( $mailSender )
		 {
		 $_SESSION['msg'] = "Check Your Mail To Get Password !";
                  header("location:$this->page");die(); 
		 }
		 else
		 {
		  $_SESSION['errormsg'] = "Your email id is not found !";
		  header("location:$this->page");die(); 
		 }
	 }
	 	 }
   
	   
	    # delete record	  
	  public function deleteRecord( $qry ){
		  $db = $this->database;
		  extract( $qry );		  
	  foreach( $checkAll as $id )
	   {
		   if($_SESSION['user_id']!=$id){
		   $qry = $db->fireQuery("delete from `admin` where id = '$id'");
		   }
		
		if($qry && $_SESSION['user_id']!=$id)
		{
			$_SESSION['msg'] = "Record(s) deleted successfully!";
			header("location:$this->page");die();
		}
		else
		{
			//$_SESSION['msg'] = "Error in deleting record(s)!";
		}
	   } header("location:$this->page");die();
     }
	 
	 
	 //update records
	 
	  public function updateAdmin( $qry ){
		  $db = $this->database;
		  extract( $qry );
		  $action = $_REQUEST["action"];
		  $type=trim($user_type);
		  $name=trim($name);
		  $email=trim($email);
		  $password=base64_encode(trim($password));
		  $status=trim($status);
		  if($action=='add'){
		  $insert=$db->fireQuery("insert into `admin` (`id`,`username`,`password`,`email`,`admin_type`,`status`) values ('','$name','$password','$email','$type','$status')");
		  $last_id = mysql_insert_id();
		  if($insert) 
		  {
				 $_SESSION['msg'] = "Record inserted successfully!";
				 header("location:$this->page");die();

		  }
		  }
		  if($action=='edit'){
		  $update=$db->fireQuery("update `admin` set `username`='$name',`password`='$password',`email`='$email',`admin_type`='$type',`status`='$status' where id=".siteDecrypt($_REQUEST['id'])."");
    	  if($update) 
		  {
				 $_SESSION['msg'] = "Record Updated successfully!";
				 header("location:$this->page");die();

		   } 
		  }

     }
	 
	 
  }
?>