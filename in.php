<?php
final class data_base_query{

     private $email;
     private $password;

   /*  function __construct(){
              if(isset($_POST['email']) && isset($_POST['']))
                     $this->email = "$_POST['email']";
                     $this-> = "$_POST['']";
                     unset($_POST['email']);
                     unset($_POST['']);
               }
      } */
      function make_password($key){
                  $newkey=strtoupper($key).strtolower($key);
                  return md5($newkey);
                  //echo md5($newkey);
      }
      function check_email($address){
            if(strpos($address,'(')>=0 || strpos($address, ')') >=0 || strpos($address,'\'')>=0 || strpos($address, '"')>=0 || strpos($address,'/')>=0 || strpos($address,'\\')){
                echo"hello";
            }

      }
      function make_email($address){

               $length = strlen($address);
               $at = strrpos($address,"@");
               $dot = strrpos($address,".");
               print_r($at);
               print_r($dot);
               echo $address;
      }

     function __call($method , $arguments){
     	      if($method == "check_value"){
     	      	      if(count($arguments) == 4){
                               $link_open = mysql_connect("localhost","root","");
                               mysql_select_db("$arguments[0]");
                               $Q = "SELECT $arguments[2] FROM $arguments[1] WHERE $arguments[2] = '$arguments[3]' ";
                               $runquery = mysql_query($Q);
                               if(mysql_num_rows($runquery) >= 1){
                                       mysql_free_result($runquery);
                                       mysql_close($link_open);
                                       return 1;
                                }
                               else{
                                       mysql_close($link_open);
                                       return 0;
                                }
                       }
                       else if(count($arguments) == 6){
                       	       $link_open = mysql_connect("localhost","root","");
                               mysql_select_db("$arguments[0]");
                               $Q = "SELECT * FROM $arguments[1] WHERE $arguments[2] = '$arguments[3]' AND $arguments[4] = '$arguments[5]' ";
                               $runquery = mysql_query($Q);
                               if(mysql_num_rows($runquery) >= 1){
                               	       mysql_free_result($runquery);
                                       mysql_close($link_open);
                                       return 1;
                                }
                               else{
                               	       mysql_free_result($Q);
                                       mysql_close($link_open);
                                       return 0;
                                }
                       	}
               }  // method check_vakue ends.
              else if($method == "return_result"){
               	      if(count($arguments) == 3){
               	               $link_open = mysql_connect("localhost","root","");
                               mysql_select_db("$arguments[0]");
                               $Q = "SELECT $arguments[2] FROM $arguments[1]";
                               $runquery = mysql_query($Q);
                               if(mysql_num_rows($runquery) >= 1){
                               	      $result = array();
                               	      while($data = mysql_fetch_array($runquery)){
                                           $result[] =  $data[$arguments[2]];                                         
                               	       }
                                       mysql_close($link_open);
                                       return $result;
                                }
                               else{
                                       mysql_close($link_open);
                                       return 0;
                                }
               	      }
               	      else if(count($arguments) == 5){
               	      	       $link_open = mysql_connect("localhost","root","");
                               mysql_select_db("$arguments[0]");
                               $Q = "SELECT $arguments[2] FROM $arguments[1] WHERE $arguments[3] = '$arguments[4]' ";
                               $runquery = mysql_query($Q);
                               if(mysql_num_rows($runquery) >= 1){
                               	      $result = array();
                               	      while($data = mysql_fetch_array($runquery)){
                                           $result[] =  $data[$arguments[2]];                                         
                               	       }
                                       mysql_close($link_open);
                                       return $result;
                                }
                               else{
                                       mysql_close($link_open);
                                       return 0;
                                }
               	      }
               	      else if(count($arguments) == 6){
               	      	       $link_open = mysql_connect("localhost","root","");
                               mysql_select_db("$arguments[0]");
                               $Q = "SELECT $arguments[2] , $arguments[3] FROM $arguments[1] WHERE $arguments[4] = '$arguments[5]' ";
                               $runquery = mysql_query($Q);
                               if(mysql_num_rows($runquery) >= 1){
                               	      $result = array();
                               	      while($data = mysql_fetch_array($runquery)){
                                           $result[] =  $data[$arguments[2]];                                         
                               	       }
                                       mysql_close($link_open);
                                       return $result;
                                }
                               else{
                                       mysql_close($link_open);
                                       return 0;
                                }
               	      } 
               	      else if(count($arguments) == 7){
               	      	       $link_open = mysql_connect("localhost","root","");
                               mysql_select_db("$arguments[0]");
                               $Q = "SELECT $arguments[2] , $arguments[3] , $arguments[4] FROM $arguments[1] WHERE $arguments[5] = '$arguments[6]' ";
                               $runquery = mysql_query($Q);
                               if(mysql_num_rows($runquery) >= 1){
                               	      $result = array();
                               	      while($data = mysql_fetch_array($runquery)){
                                           $result[] =  $data[$arguments[2]];                                         
                               	       }
                                       mysql_close($link_open);
                                       return $result;
                                }
                               else{
                                       mysql_close($link_open);
                                       return 0;
                                }
               	      }
               	       else if(count($arguments) == 8){
               	      	       $link_open = mysql_connect("localhost","root","");
                               mysql_select_db("$arguments[0]");
                               $Q = "SELECT $arguments[2] , $arguments[3] , $arguments[4] , perameters[5] FROM $arguments[1] WHERE $arguments[6] = '$arguments[7]' ";
                               $runquery = mysql_query($Q);
                               if(mysql_num_rows($runquery) >= 1){
                               	      $result = array();
                               	      while($data = mysql_fetch_array($runquery)){
                                           $result[] =  $data[$arguments[2]];                                         
                               	       }
                                       mysql_close($link_open);
                                       return $result;
                                }
                               else{
                                       mysql_close($link_open);
                                       return 0;
                                }
               	      }

               }//if return_result ends
               else if($method == "d_return_result"){
               	         if(count($arguments) == 7){
               	      	       $link_open = mysql_connect("localhost","root","");
                               mysql_select_db("$arguments[0]");
                               $Q = "SELECT $arguments[2] FROM $arguments[1] WHERE $arguments[3] = '$arguments[4]' AND $arguments[5] = '$arguments[6]' ";
                               $runquery = mysql_query($Q);
                               if(mysql_num_rows($runquery) >= 1){
                               	      $result = array();
                               	      while($data = mysql_fetch_array($runquery)){
                                           $result[] =  $data[$arguments[2]];                                         
                               	       }
                                       mysql_close($link_open);
                                       return $result;
                                }
                               else{
                                       mysql_close($link_open);
                                       return 0;
                                }
               	      }
               	      else if(count($arguments) == 8){
               	      	       $link_open = mysql_connect("localhost","root","");
                               mysql_select_db("$arguments[0]");
                               $Q = "SELECT $arguments[2] , $arguments[3] FROM $arguments[1] WHERE $arguments[4] = '$arguments[5]' AND $arguments[6] = '$arguments[7]' ";
                               $runquery = mysql_query($Q);
                               if(mysql_num_rows($runquery) >= 1){
                               	      $result = array();
                               	      while($data = mysql_fetch_array($runquery)){
                                           $result[] =  $data[$arguments[2]];                                         
                               	       }
                                       mysql_close($link_open);
                                       return $result;
                                }
                               else{
                                       mysql_close($link_open);
                                       return 0;
                                }
               	      }
               	      else if(count($arguments) == 9){
               	      	        $link_open = mysql_connect("localhost","root","");
                               mysql_select_db("$arguments[0]");
                               $Q = "SELECT $arguments[2] , $arguments[3] , $arguments[4] FROM $arguments[1] WHERE $arguments[5] = '$arguments[6]' AND $arguments[7] = '$arguments[8]' ";
                               $runquery = mysql_query($Q);
                               if(mysql_num_rows($runquery) >= 1){
                               	      $result = array();
                               	      while($data = mysql_fetch_array($runquery)){
                                           $result[] =  $data[$arguments[2]];                                         
                               	       }
                                       mysql_close($link_open);
                                       return $result;
                                }
                               else{
                                       mysql_close($link_open);
                                       return 0;
                                }
               	      }
               	      else if(count($arguments) == 10){
               	      	       $link_open = mysql_connect("localhost","root","");
                               mysql_select_db("$arguments[0]");
                               $Q = "SELECT $arguments[2] , $arguments[3] , $arguments[4] , $arguments[5] FROM $arguments[1] WHERE $arguments[6] = '$arguments[7]' AND $arguments[8] = '$arguments[9]' ";
                               $runquery = mysql_query($Q);
                               if(mysql_num_rows($runquery) >= 1){
                               	      $result = array();
                               	      while($data = mysql_fetch_array($runquery)){
                                           $result[] =  $data[$arguments[2]];                                         
                               	       }
                                       mysql_close($link_open);
                                       return $result;
                                }
                               else{
                                       mysql_close($link_open);
                                       return 0;
                                }

               	      }

               } // // d_return_result ends
            else if($method == "update_value"){
                     if(count($arguments) == 6){
               	                $link_open = mysql_connect("localhost","root","");
                               mysql_select_db("$arguments[0]");
                               $Q = "UPDATE $arguments[1] SET $arguments[2] = '$arguments[3]' WHERE $arguments[4] = '$arguments[5]' ";
                               if(mysql_query($Q)){        	      
                                       mysql_close($link_open);
                                       return 1;
                                }
                               else{
                                       mysql_close($link_open);
                                       return 0;
                                }
                      }
                      else if(count($arguments) == 8){
                      	       $link_open = mysql_connect("localhost","root","");
                               mysql_select_db("$arguments[0]");
                               $Q = "UPDATE $arguments[1] SET $arguments[2] =  '$arguments[3]' , $arguments[4] = '$arguments[5]' WHERE $arguments[6] = '$arguments[7]' ";
                               if(mysql_query($Q)){        	      
                                       mysql_close($link_open);
                                       return 1;
                                }
                               else{
                                       mysql_close($link_open);
                                       return 0;
                                }
                      }
                      else if(count($arguments) == 10){
                      	       $link_open = mysql_connect("localhost","root","");
                               mysql_select_db("$arguments[0]");
                               $Q = "UPDATE $arguments[1] SET $arguments[2] = '$arguments[3]' , $arguments[4] = '$arguments[5]' , $arguments[6] = '$arguments[7]' WHERE $arguments[8] = '$arguments[9]' ";
                               if(mysql_query($Q)){       	      
                                       mysql_close($link_open);
                                       return 1;
                                }
                               else{
                                       mysql_close($link_open);
                                       return 0;
                                }
                      }
             }
             else if($method == "d_update_value"){
             	      if(count($arguments) == 8){
                      	       $link_open = mysql_connect("localhost","root","");
                               mysql_select_db("$arguments[0]");
                               $Q = "UPDATE $arguments[1] SET $arguments[2] = '$arguments[3]'  WHERE $arguments[4] = '$arguments[5]' AND $arguments[6] = '$arguments[7]' ";
                               if(mysql_query($Q)){      	      
                                       mysql_close($link_open);
                                       return 1;
                                }
                               else{
                                       mysql_close($link_open);
                                       return 0;
                                }
                      }
                      else if(count($arguments) == 10){
                      	       $link_open = mysql_connect("localhost","root","");
                               mysql_select_db("$arguments[0]");
                               $Q = "UPDATE $arguments[1] SET $arguments[2] = '$arguments[3]' , $arguments[4] = '$arguments[5]' WHERE $arguments[6] = '$arguments[7]' AND $arguments[8] = '$arguments[9]' ";
                               if(mysql_query($Q)){        	      
                                       mysql_close($link_open);
                                       return 1;
                                }
                               else{
                                       mysql_close($link_open);
                                       return 0;
                                }
                      }
                      else if(count($arguments) == 12){
                               $link_open = mysql_connect("localhost","root","");
                               mysql_select_db("$arguments[0]");
                               $Q = "UPDATE $arguments[1] SET $arguments[2] = '$arguments[3]' , $arguments[4] = '$arguments[5]' , $arguments[6] = '$arguments[7]' WHERE $arguments[8] = '$arguments[9]' AND $arguments[10] = '$arguments[11]' ";
                               if(mysql_query($Q)){               
                                       mysql_close($link_open);
                                       return 1;
                                }
                               else{
                                       mysql_close($link_open);
                                       return 0;
                                }
                      }

             }
             else if($method == "insert_value"){
                      if(count($arguments) == 4){
                              $link_open = mysql_connect("localhost","root","");
                               mysql_select_db("$arguments[0]");
                               $Q = "INSERT INTO $arguments[1] ($arguments[2]) VALUES('$arguments[3]')";
                               if(mysql_query($Q)){               
                                       mysql_close($link_open);
                                       return 1;
                                }
                               else{
                                       mysql_close($link_open);
                                       return 0;
                                }
                      }
                      else if(count($arguments) == 6){
                               $link_open = mysql_connect("localhost","root",""); 
                               mysql_select_db("$arguments[0]");
                               $Q = "INSERT INTO $arguments[1] ($arguments[2] , $arguments[3]) VALUES('$arguments[4]' , '$arguments[5]')";
                               if(mysql_query($Q)){               
                                       mysql_close($link_open);
                                       return 1;
                                }
                               else{
                                       mysql_close($link_open);
                                       return 0;
                                }
                      }
                      else if(count($arguments) == 8){
                               $link_open = mysql_connect("localhost","root","");
                               mysql_select_db("$arguments[0]");
                               $Q = "INSERT INTO $arguments[1] ($arguments[2] , $arguments[3] , $arguments[4]) VALUES('$arguments[5]' , '$arguments[6]' , '$arguments[7]')";
                               if(mysql_query($Q)){               
                                       mysql_close($link_open);
                                       return 1;
                                }
                               else{
                                       mysql_close($link_open);
                                       return 0;
                                }
                      }
                      else if(count($arguments) == 10){
                               $link_open = mysql_connect("localhost","root","");
                               mysql_select_db("$arguments[0]");
                               $Q = "INSERT INTO $arguments[1] ($arguments[2] , $arguments[3] , $arguments[4] , $arguments[5]) VALUES('$arguments[6]' , '$arguments[7]' , '$arguments[8]'  , '$arguments[9]')";
                               if(mysql_query($Q)){               
                                       mysql_close($link_open);
                                       return 1;
                                }
                               else{
                                       mysql_close($link_open);
                                       return 0;
                                }
                      }
                      else if(count($arguments) == 12){
                               $link_open = mysql_connect("localhost","root","");
                               mysql_select_db("$arguments[0]");
                               $Q = "INSERT INTO $arguments[1] ($arguments[2] , $arguments[3] , $arguments[4] , $arguments[5] , $arguments[6]) VALUES('$arguments[7]' , '$arguments[8]' , '$arguments[9]' , '$arguments[10]' ,'$parameters[11]')";
                               if(mysql_query($Q)){               
                                       mysql_close($link_open);
                                       return 1;
                                }
                               else{
                                       mysql_close($link_open);
                                       return 0;
                                }
                      }
                      else if(count($arguments) == 14){
                               $link_open = mysql_connect("localhost","root","");
                               mysql_select_db("$arguments[0]");
                               $Q = "INSERT INTO $arguments[1] ($arguments[2] , $arguments[3] , $arguments[4] , $arguments[5] , $arguments[6] , $arguments[7]) VALUES('$arguments[8]' , '$arguments[9]' , '$arguments[10]' , '$arguments[11]' ,'$parameters[12]' , '$arguments[13]')";
                               if(mysql_query($Q)){               
                                       mysql_close($link_open);
                                       return 1;
                                }
                               else{
                                       mysql_close($link_open);
                                       return 0;
                                }
                      }
             }
     } // __call method ends

}  //class ends 

$object = new data_base_query();

if($x = $object->return_value('data','tac','first','last','chand'))
{
  echo"data is present ";
}
else{
  echo"no data";
}
/*$object->check_value(data_base , table_name , filed_name , value);
$object->check_value(data_base , table_name , filed_name , value , field_name , value);

$object->return_result(database , table_name , field_name);
$object->return_result(database , table_name , return_field , filed_name , value);
$object->return_result(database , table_name , return_field , return_field , field_name , value);
$object->return_result(database , table_name , return_field , return_field , return_field , field_name , value);
$object->return_result(database , table_name , return_field , return_field , return_field , return_field , field_name , value);

$object->d_return_result(database , table_name , return_field , field_name , value , field_name , value);
$object->d_return_result(database , table_name , return_field , return_field , field_name , value , field_name , value);
$object->d_return_result(database , table_name , return_field , return_field , return_field , field_name , value , field_name , value);
$object->d_return_result(database , table_name , return_field , return_field , return_field , return_field , field_name , value , field_name , value);

$object->update_value(database , table_name , update_field , update_value , field_name , value);
$object->update_value(database , table_name , update_field , update_value , update_field , update_value , field_name , value);
$object->update_value(database , table_name , update_field , update_value , update_field , update_field , update_value , update_value , field_name , value);

$object->d_update_value(database , table_name , update_field , update_value , field_name , value , field_name , value);
$object->d_update_value(database , table_name , update_field , update_value , update_field , update_value , field_name , value , field_name , value);
*/
//$object->insert_value("data_xyz" , "table_abc" , "f_name" , "l_name" , "email" , "rahul" , "chand" , "chandrahul41@gmail.com");
//$object->insert_value(database , table_name , update_field , update_value , update_field , update_value , field_name , value , field_name , value);

?>
