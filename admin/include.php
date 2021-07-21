<?php
include_once("inc/body.php");
include_once 'Select.php';
$object=new Select();
//echo "select * from ".TBL_LIST." ";
 $qry = $db->fireQuery("SELECT * FROM " . TBL_LIST. " ");
            $rowCount = $db->rowCount($qry);
                  if ($rowCount > 0) {
                      echo $_SESSION["name"];
                  } 
                     
                     echo "list";
                     $option=array( $_SESSION["name"]);
                     echo $object->Test("name","name",$option);
                     
?>