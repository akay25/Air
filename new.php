<?php
final class data_base_query{

     private $link_open;
     private $host;
     private $user;
     private $key;

     function __construct($host,$user,$key){
           $this->host = $host;
           $this->user = $user;
           $this->key = $key;
     }

   
     function db_conn($da_name){

            $this->link_open = mysqli_connect("$this->host","$this->user","$this->key");
            if(!$this->link_open){ 
                   echo "Failed to connect to MySQL: " . mysqli_connect_error();
                   return 0;
             }
            $dc = mysqli_select_db($this->link_open,"$da_name");
            if(!$dc){
                   mysqli_close($this->link_open);
                   unset($dc);
                   echo"<br>unable to connect database<br>";
                   return 0;
             }
             return 1;
     }

     function __call($method , $arguments){
            if($method == "check_value"){
                               if(count($arguments) == 4){
                                            if(!data_base_query::db_conn($arguments[0])){
                                                 return 0;
                                            }
                                            $Q = "SELECT $arguments[2] FROM $arguments[1] WHERE $arguments[2] = '$arguments[3]' ";
                                            if($runquery = mysqli_query($this->link_open,$Q)){
                                                   if(mysqli_num_rows($runquery) >= 1){
                                                          $result = mysqli_num_rows($runquery);
                                                           mysqli_free_result($runquery);
                                                           mysqli_close($this->link_open);
                                                           return $result;
                                                    }
                                                    else{
                                                            mysqli_close($this->link_open);
                                                            return 0;
                                                    }
                                             }
                                            else{
                                                        mysqli_close($this->link_open);
                                                       return 0;
                                            }
                                }
                               else if(count($arguments) == 6){
                                            if(!data_base_query::db_conn($arguments[0])){
                                                  return 0;
                                            }
                                            $Q = "SELECT * FROM $arguments[1] WHERE $arguments[2] = '$arguments[3]' AND $arguments[4] = '$arguments[5]' ";
                                             if($runquery = mysqli_query($this->link_open,$Q)){
                                                    if(mysqli_num_rows($runquery) >= 1){
                                                            $result = mysqli_num_rows($runquery);
                                                             mysqli_free_result($runquery);
                                                             mysqli_close($this>link_open);
                                                             return $result;
                                                    }
                                              }
                                              else{
                                                    mysqli_close($this->link_open);
                                                    return 0;
                                              }
                                }
                                else{
                                    echo"<br>Wrong number of arguments<br>";
                                    return 0;
                                }
               }  
              else if($method == "return_value"){
                      if(count($arguments) == 3){
                               if(!data_base_query::db_conn($arguments[0])){
                                        return 0;
                                }
                               $Q = "SELECT $arguments[2] FROM $arguments[1]";
                               if($runquery = mysqli_query($this->link_open,$Q)){
                                       if(mysqli_num_rows($runquery) >= 1){
                                                $result = array();
                                                while($data = mysqli_fetch_array($runquery)){
                                                        $result[] =  $data[$arguments[2]];                                         
                                                 }
                                                mysqli_close($this->link_open);
                                                return $result;
                                        }
                                        else{
                                                 mysqli_close($this->link_open);
                                                 return 0;
                                        }
                                }
                               else{
                                       mysqli_close($this->link_open);
                                       return 0;
                                }
                      }
                      else if(count($arguments) == 5){
                                if(!data_base_query::db_conn($arguments[0])){
                                        return 0;
                                }
                               $Q = "SELECT $arguments[2] FROM $arguments[1] WHERE $arguments[3] = '$arguments[4]' ";
                               if($runquery = mysqli_query($this->link_open,$Q)){
                                        if(mysqli_num_rows($runquery) >= 1){
                                                $result = array();
                                                while($data = mysqli_fetch_array($runquery)){
                                                          $result[] =  $data[$arguments[2]];                                         
                                                 }
                                                 mysqli_close($this->link_open);
                                                 return $result;
                                        }
                                        else{
                                                  mysqli_close($this->link_open);
                                                  return 0;
                                        }
                                }
                               else{
                                       mysqli_close($this->link_open);
                                       return 0;
                                }
                      }
                      else if(count($arguments) == 6){
                               if(!data_base_query::db_conn($arguments[0])){
                                        return 0;
                                }
                               $Q = "SELECT $arguments[2] , $arguments[3] FROM $arguments[1] WHERE $arguments[4] = '$arguments[5]' ";
                               if($runquery = mysqli_query($this->link_open,$Q)){
                                     if(mysqli_num_rows($runquery) >= 1){
                                             $result = array();
                                             $one = array();
                                             $two = array();
                                             while($data = mysqli_fetch_array($runquery)){
                                                       $one[] =  $data[$arguments[2]]; 
                                                       $two[] = $data[$arguments[3]];                                       
                                              }
                                              $result = array_merge($one,$two);
                                              unset($one);
                                              unset($two);
                                              mysqli_close($this->link_open);
                                              return $result;
                                      }
                                      else{
                                               mysqli_close($this->link_open);
                                               return 0;
                                      }
                                }
                               else{
                                       mysqli_close($this->link_open);
                                       return 0;
                                }
                      } 
                      else if(count($arguments) == 7){
                                if(!data_base_query::db_conn($arguments[0])){
                                        return 0;
                                }
                               $Q = "SELECT $arguments[2] , $arguments[3] , $arguments[4] FROM $arguments[1] WHERE $arguments[5] = '$arguments[6]' ";
                               if($runquery = mysqli_query($this->link_open,$Q)){
                                         if(mysqli_num_rows($runquery) >= 1){
                                                    $result = array();
                                                    $one = array();
                                                    $two = array();
                                                    $three = array();
                                                    while($data = mysqli_fetch_array($runquery)){
                                                             $one[] = $data[$arguments[2]]; 
                                                             $two[] = $data[$arguments[3]];
                                                             $three[] = $data[$arguments[4]];                                        
                                                     }
                                                     $result = array_merge($one,$two,$three);
                                                     unset($one);
                                                     unset($two);
                                                     unset($three);
                                                     mysqli_close($this->link_open);
                                                     return $result;
                                            }
                                            else{
                                                      mysqli_close($this->link_open);
                                                      return 0;
                                            }
                                }
                               else{
                                       mysqli_close($this->link_open);
                                       return 0;
                                }
                      }
                       else if(count($arguments) == 8){
                                if(!data_base_query::db_conn($arguments[0])){
                                        return 0;
                                }
                               $Q = "SELECT $arguments[2] , $arguments[3] , $arguments[4] , $arguments[5] FROM $arguments[1] WHERE $arguments[6] = '$arguments[7]' ";
                               if($runquery = mysqli_query($this->link_open,$Q)){
                                         if(mysqli_num_rows($runquery) >= 1){
                                                      $result = array();
                                                      $one = array();
                                                      $two = array();
                                                      $three = array();
                                                      $four = array();
                                                      while($data = mysqli_fetch_array($runquery)){
                                                               $one[] = $data[$arguments[2]];
                                                               $two[] = $data[$arguments[3]];
                                                               $three[] = $data[$arguments[4]];
                                                               $four[] = $data[$arguments[5]];                                         
                                                       }
                                                      $result = array_merge($one,$two,$three,$four);
                                                      unset($one);
                                                      unset($two);
                                                      unset($three);
                                                      unset($four);
                                                      mysqli_close($this->link_open);
                                                      return $result;
                                          }
                                          else{
                                                      mysqli_close($this->link_open);
                                                      return 0;
                                          }
                                }
                               else{
                                       mysqli_close($this->link_open);
                                       return 0;
                                }
                      }

               }
               else if($method == "d_return_value"){
                         if(count($arguments) == 7){
                              if(!data_base_query::db_conn($arguments[0])){
                                        return 0;
                                }
                               $Q = "SELECT $arguments[2] FROM $arguments[1] WHERE $arguments[3] = '$arguments[4]' AND $arguments[5] = '$arguments[6]' ";
                               if($runquery = mysqli_query($this->link_open,$Q)){
                                          if(mysqli_num_rows($runquery) >= 1){
                                                    $result = array();
                                                    while($data = mysqli_fetch_array($runquery)){
                                                              $result[] =  $data[$arguments[2]];                                         
                                                     }
                                                     mysqli_close($this->link_open);
                                                     return $result;
                                           }
                                           else{
                                                     mysqli_close($this->link_open);
                                                     return 0;
                                           }
                                }
                               else{
                                           mysqli_close($this->link_open);          
                                           return 0;
                                }
                      }
                      else if(count($arguments) == 8){
                               if(!data_base_query::db_conn($arguments[0])){
                                        return 0;
                                }
                               mysqli_select_db("$arguments[0]");
                               $Q = "SELECT $arguments[2] , $arguments[3] FROM $arguments[1] WHERE $arguments[4] = '$arguments[5]' AND $arguments[6] = '$arguments[7]' ";
                               if($runquery = mysqli_query($this->link_open,$Q)){
                                        if(mysqli_num_rows($runquery) >= 1){
                                                   $result = array();
                                                   $one = array();
                                                   $two = array();
                                                   while($data = mysqli_fetch_array($runquery)){
                                                            $one[] =  $data[$arguments[2]];
                                                            $two[] =  $data[$arguments[3]];                                         
                                                   }
                                                   $result = array_merge($one,$two);
                                                   unset($one);
                                                   unset($two);
                                                   mysqli_close($this->link_open);
                                                   return $result;
                                        }
                                        else{
                                                    mysqli_close($this->link_open);
                                                    return 0;
                                        }
                                }
                               else{
                                        mysqli_close($this->link_open);       
                                        return 0;
                                }
                      }
                      else if(count($arguments) == 9){
                                if(!data_base_query::db_conn($arguments[0])){
                                        return 0;
                                }
                                mysqli_select_db("$arguments[0]");
                                $Q = "SELECT $arguments[2] , $arguments[3] , $arguments[4] FROM $arguments[1] WHERE $arguments[5] = '$arguments[6]' AND $arguments[7] = '$arguments[8]' ";
                                if($runquery = mysqli_query($this->link_open,$Q)){
                                            if(mysqli_num_rows($runquery) >= 1){
                                                      $result = array();
                                                      $one = array();
                                                      $two = array();
                                                      $three = array();
                                                      while($data = mysqli_fetch_array($runquery)){
                                                                 $one[] =  $data[$arguments[2]];
                                                                 $two[] =  $data[$arguments[3]];
                                                                 $three[] = $data[$arguments[4]];                                         
                                                      }
                                                      $result = array_merge($one,$two,$three);
                                                      unset($one);
                                                      unset($two);
                                                      unset($three);
                                                      mysqli_close($this->link_open);
                                                      return $result;
                                             }
                                             else{
                                                       mysqli_close($this->link_open);
                                                       return 0;
                                             }
                                }
                               else{
                                             mysqli_close($this->link_open);            
                                             return 0;
                                }
                      }
                      else if(count($arguments) == 10){
                               if(!data_base_query::db_conn($arguments[0])){
                                        return 0;
                                }
                               $Q = "SELECT $arguments[2] , $arguments[3] , $arguments[4] , $arguments[5] FROM $arguments[1] WHERE $arguments[6] = '$arguments[7]' AND $arguments[8] = '$arguments[9]' ";
                               if($runquery = mysqli_query($this->link_open,$Q)){
                                           if(mysqli_num_rows($runquery) >= 1){
                                                      $result = array();
                                                      $one = array();
                                                      $two = array();
                                                      $three = array();
                                                      $four = array();
                                                      while($data = mysqli_fetch_array($runquery)){
                                                                $one[] =  $data[$arguments[2]];
                                                                $two[] =  $data[$arguments[3]];
                                                                $three[] = $data[$arguments[4]]; 
                                                                $four[] =  $data[$arguments[5]];                                       
                                                      }
                                                      $result = array_merge($one,$two,$three,$four);
                                                      unset($one);
                                                      unset($two);
                                                      unset($three);
                                                      unset($four);
                                                      mysqli_close($this->link_open);
                                                      return $result;
                                             }
                                             else{
                                                    mysqli_close($this->link_open);
                                                    return 0;
                                             }
                                }
                               else{
                                             mysqli_close($this->link_open); 
                                             return 0;
                                }
                      }

               } 
            else if($method == "update_value"){
                     if(count($arguments) == 6){
                               if(!data_base_query::db_conn($arguments[0])){
                                        return 0;
                                }
                               $Q = "UPDATE $arguments[1] SET $arguments[2] = '$arguments[3]' WHERE $arguments[4] = '$arguments[5]' ";
                               if(mysqli_query($this->link_open,$Q)){               
                                       mysqli_close($this->link_open);
                                       return 1;
                                }
                               else{
                                       mysqli_close($this->link_open);      
                                       return 0;
                                }
                      }
                      else if(count($arguments) == 8){
                               if(!data_base_query::db_conn($arguments[0])){
                                        return 0;
                                }
                               $Q = "UPDATE $arguments[1] SET $arguments[2] =  '$arguments[3]' , $arguments[4] = '$arguments[5]' WHERE $arguments[6] = '$arguments[7]' ";
                               if(mysqli_query($this->link_open,$Q)){               
                                       mysqli_close($this->link_open);
                                       return 1;
                                }
                               else{
                                       mysqli_close($this->link_open);      
                                       return 0;
                                }
                      }
                      else if(count($arguments) == 10){
                               if(!data_base_query::db_conn($arguments[0])){
                                        return 0;
                                }
                               $Q = "UPDATE $arguments[1] SET $arguments[2] = '$arguments[3]' , $arguments[4] = '$arguments[5]' , $arguments[6] = '$arguments[7]' WHERE $arguments[8] = '$arguments[9]' ";
                               if(mysqli_query($this->link_open,$Q)){               
                                       mysqli_close($this->link_open);
                                       return 1;
                                }
                               else{
                                       mysqli_close($this->link_open);
                                       return 0;
                                }
                      }
             }
             else if($method == "d_update_value"){
                    if(count($arguments) == 8){
                               if(!data_base_query::db_conn($arguments[0])){
                                        return 0;
                                }
                               $Q = "UPDATE $arguments[1] SET $arguments[2] = '$arguments[3]'  WHERE $arguments[4] = '$arguments[5]' AND $arguments[6] = '$arguments[7]' ";
                               if(mysqli_query($this->link_open,$Q)){             
                                       mysqli_close($this->link_open);
                                       return 1;
                                }
                               else{
                                       mysqli_close($this->link_open);      
                                       return 0;
                                }
                      }
                      else if(count($arguments) == 10){
                               if(!data_base_query::db_conn($arguments[0])){
                                        return 0;
                                }
                               $Q = "UPDATE $arguments[1] SET $arguments[2] = '$arguments[3]' , $arguments[4] = '$arguments[5]' WHERE $arguments[6] = '$arguments[7]' AND $arguments[8] = '$arguments[9]' ";
                               if(mysqli_query($this->link_open,$Q)){               
                                       mysqli_close($this->link_open);
                                       return 1;
                                }
                               else{
                                       mysqli_close($this->link_open);      
                                       return 0;
                                }
                      }
                      else if(count($arguments) == 12){
                               if(!data_base_query::db_conn($arguments[0])){
                                        return 0;
                                }      
                               $Q = "UPDATE $arguments[1] SET $arguments[2] = '$arguments[3]' , $arguments[4] = '$arguments[5]' , $arguments[6] = '$arguments[7]' WHERE $arguments[8] = '$arguments[9]' AND $arguments[10] = '$arguments[11]' ";
                               if(mysqli_query($this->link_open,$Q)){               
                                       mysqli_close($this->link_open);
                                       return 1;
                                }
                               else{
                                       mysqli_close($this->link_open);
                                       return 0;
                                }
                      }
             }
             else if($method == "insert_value"){
                      if(count($arguments) == 4){
                               if(!data_base_query::db_conn($arguments[0])){
                                        return 0;
                                }
                               $Q = "INSERT INTO $arguments[1] ($arguments[2]) VALUES('$arguments[3]')";
                               if(mysqli_query($this->link_open,$Q)){               
                                       mysqli_close($this->link_open);
                                       return 1;
                                }
                               else{
                                       mysqli_close($this->link_open);
                                       return 0;
                                }
                      }
                      else if(count($arguments) == 6){
                               if(!data_base_query::db_conn($arguments[0])){
                                        return 0;
                                }
                               $Q = "INSERT INTO $arguments[1] ($arguments[2] , $arguments[3]) VALUES('$arguments[4]' , '$arguments[5]')";
                               if(mysqli_query($this->link_open,$Q)){               
                                       mysqli_close($this->link_open);
                                       return 1;
                                }
                               else{
                                       mysqli_close($this->link_open);      
                                       return 0;
                                }
                      }
                      else if(count($arguments) == 8){
                              if(!data_base_query::db_conn($arguments[0])){
                                        return 0;
                                }
                               $Q = "INSERT INTO $arguments[1] ($arguments[2] , $arguments[3] , $arguments[4]) VALUES('$arguments[5]' , '$arguments[6]' , '$arguments[7]')";
                               if(mysqli_query($this->link_open,$Q)){               
                                       mysqli_close($this->link_open);
                                       return 1;
                                }
                               else{
                                       mysqli_close($this->link_open);      
                                       return 0;
                                }
                      }
                      else if(count($arguments) == 10){
                               if(!data_base_query::db_conn($arguments[0])){
                                        return 0;
                                }
                               $Q = "INSERT INTO $arguments[1] ($arguments[2] , $arguments[3] , $arguments[4] , $arguments[5]) VALUES('$arguments[6]' , '$arguments[7]' , '$arguments[8]'  , '$arguments[9]')";
                               if(mysqli_query($this->link_open,$Q)){               
                                       mysqli_close($this->link_open);      
                                       return 1;
                                }
                               else{
                                       mysqli_close($this->link_open);
                                       return 0;
                                }
                      }
                      else if(count($arguments) == 12){
                                if(!data_base_query::db_conn($arguments[0])){
                                        return 0;
                                }
                               $Q = "INSERT INTO $arguments[1] ($arguments[2] , $arguments[3] , $arguments[4] , $arguments[5] , $arguments[6]) VALUES('$arguments[7]' , '$arguments[8]' , '$arguments[9]' , '$arguments[10]' ,'$parameters[11]')";
                               if(mysqli_query($this->link_open,$Q)){               
                                       mysqli_close($this->link_open);
                                       return 1;
                                }
                               else{
                                       mysqli_close($this->link_open);      
                                       return 0;
                                }
                      }
                      else if(count($arguments) == 14){
                               if(!data_base_query::db_conn($arguments[0])){
                                        return 0;
                                }
                               $Q = "INSERT INTO $arguments[1] ($arguments[2] , $arguments[3] , $arguments[4] , $arguments[5] , $arguments[6] , $arguments[7]) VALUES('$arguments[8]' , '$arguments[9]' , '$arguments[10]' , '$arguments[11]' ,'$parameters[12]' , '$arguments[13]')";
                               if(mysqli_query($this->link_open,$Q)){               
                                       mysqli_close($this->link_open);
                                       return 1;
                                }
                               else{
                                       mysqli_close($this->link_open);
                                       return 0;
                                }
                      }
             }
             else if($method == "search"){
                     if(count($arguments) == 5){
                               if(!data_base_query::db_conn($arguments[0])){
                                        return 0;
                                }
                               $Q = "SELECT $arguments[2] FROM $arguments[1] WHERE $arguments[3] LIKE  '$arguments[4]'";
                               if($runquery = mysqli_query($this->link_open,$Q)){
                                    if(mysqli_num_rows($runquery)>0){
                                         $result =array();
                                         while($rows = mysqli_fetch_array($runquery)){
                                             $result[]  = $rows[$arguments[2]];
                                         }
                                         mysqli_close($this->link_open);
                                         return $result;
                                    }
                                    else{
                                         mysqli_close($this->link_open);
                                         return 0;
                                    }
                               }
                               else{
                                    mysqli_close($this->link_open);
                                    return 0;
                              }
                     }
             }
             else if($method == "delete"){

                     if(count($arguments) == 4){
                                if(!data_base_query::db_conn($arguments[0])){
                                        return 0;
                                }
                                $Q = "DELETE FROM $arguments[1] WHERE $arguments[2] = '$arguments[3]' ";
                                if(mysqli_query($this->link_open,$Q)){
                                        mysqli_close($this->link_open);
                                        
                                        return 1;
                                }
                                else{
                                        mysqli_close($this->link_open);
                                        
                                        return 0;
                                } 
                     }
                     else if(count($arguments) == 6){
                                if(!data_base_query::db_conn($arguments[0])){
                                        return 0;
                                }
                                $Q = "DELETE FROM $arguments[1] WHERE $arguments[2] = '$arguments[3]' AND  $arguments[4] = '$arguments[5]'";
                                if(mysqli_query($this->link_open,$Q)){
                                        mysqli_close($this->link_open);
                                        return 1;
                                }
                                else{
                                        mysqli_close($this->link_open);
                                        return 0;
                                } 
                     }
             }
     } // __call method ends

}  //class ends 

$object = new data_base_query("localhost","root","");
//echo $object->make_password("password");

/*$object->check_value(data_base , table_name , filed_name , value);
$object->check_value(data_base , table_name , filed_name , value , field_name , value);

$object->return_value(database , table_name , field_name);
$object->return_value(database , table_name , return_field , filed_name , value);
$object->return_value(database , table_name , return_field , return_field , field_name , value);
$object->return_value(database , table_name , return_field , return_field , return_field , field_name , value);
$object->return_value(database , table_name , return_field , return_field , return_field , return_field , field_name , value);

$object->d_return_value(database , table_name , return_field , field_name , value , field_name , value);
$object->d_return_value(database , table_name , return_field , return_field , field_name , value , field_name , value);
$object->d_return_value(database , table_name , return_field , return_field , return_field , field_name , value , field_name , value);
$object->d_return_value(database , table_name , return_field , return_field , return_field , return_field , field_name , value , field_name , value);

$object->update_value(database , table_name , update_field , update_value , field_name , value);
$object->update_value(database , table_name , update_field , update_value , update_field , update_value , field_name , value);
$object->update_value(database , table_name , update_field , update_value , update_field , update_field , update_value , update_value , field_name , value);

$object->d_update_value(database , table_name , update_field , update_value , field_name , value , field_name , value);
$object->d_update_value(database , table_name , update_field , update_value , update_field , update_value , field_name , value , field_name , value);
*/
//$object->insert_value("data_xyz" , "table_abc" , "f_name" , "l_name" , "email" , "rahul" , "chand" , "chandrahul41@gmail.com");
//$object->insert_value(database , table_name , update_field , update_value , update_field , update_value , field_name , value , field_name , value);
//$object->search('database','table','return_field','field_name','pattern');

if($x = $object->check_value('data','tac','last','chand')){
     echo"data present".$x;
}
else{
     echo"do not present";
}
?>
