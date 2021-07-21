<?php
  class sqlConnection {
	  
	  private $host;
	  private $user;
	  private $pass;
	  private $database;
	  private $conn;
	  private $connString;
	  private $query;
	  private $result;
	  // Initiate Sqlconnection
	  public function __construct(){
		  $this->host = "localhost";
		  $this->user = "truetimeuse";
		  $this->pass = "YGVK9c&ke";
		  $this->database = "truetimedb";
		//  Db name:dbtech_dbtmsq
//User:dbtech_usrDbtc
//Pwd:Dnbgr4ed51
//Host:173.203.199.171

		  $this->conn = mysql_connect( $this->host,$this->user,$this->pass ) or die( "<center><span style='color:red; font-weight:bold'>Database Error !!!</span></center>" );
		  
		  if( $this->conn ) {
			//mysql_query ("set character_set_results='utf8'");  
			$this->connString = mysql_select_db( $this->database ) or die( "<center><span style='color:red; font-weight:bold'>Database Error !!!</span></center>" );  
		  } 		  
		  	   
	  }
	  // Run query
	  public function fireQuery( $qry ) {
		  //echo $qry;
		  if( !empty( $qry ) ) {
			  $this->query = mysql_query( $qry );
			  return $this->query;
		  }	
		  else {
			  die( "<center><span style='color:red; font-weight:bold'>Database Table Error !!!</span></center>" );  
		  }
	  }
	  // Count Row
	  public function rowCount( $param ){
		  if(!empty( $param ) ){
			  return( mysql_num_rows($param) );
		  }
	  }
	  // fetchAssoc
	  public function fetchAssoc( $param ){
			  if(!empty( $param ) ){
				  if( mysql_num_rows( $param ) > 0 ) {
					  while( $rs = mysql_fetch_assoc( $param ) ) {
					  $arr[] = $rs;	  			  
					  }
				  return $arr;	  
			  } else {
				 return NULL;
			  }
		  }
	  }
	  
	  // get All records from a query
  }
?>