<?php


function confirmQuery($result){
    global $con;
    if(!$result){
        die("fail".mysqli_error($con));  
            }
    
}
function insert_categories(){
      if(isset($_POST['submit']))
                            {
          global $con;
                                 $cat_title = $_POST['cat_title'];
                               
                               if($cat_title == "" || empty($cat_title)){
                                   echo "This field should not be empty";
                               }else{
                                    $query = "INSERT INTO categories(cat_title) ";
                                   $query .= "VALUES('{$cat_title}' )";
                                   
                                $create_category_query = mysqli_query($con,$query);
                                    header("Location: categories.php");
                               }
                            
                            }
    
}

function delete_categories(){
     if(isset($_GET['delete']))
         
                                 {
         global $con;
                                  $the_cat_id = $_GET['delete'];//hold the id
                                     $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
                                     $delete_query = mysqli_query($con,$query);
                                       header("Location: categories.php");

                                 }
}
?>
