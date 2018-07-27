

   <?php
if(isset($_GET['e_id'])){
    $the_e_id = $_GET['e_id'];
}
    $query = "SELECT * FROM users WHERE user_id = $the_e_id";
    $update_user_query = mysqli_query($con,$query);
    while($row = mysqli_fetch_assoc($update_user_query)){
    $user_firstname=$row['user_firstname'];
    $user_lastname=$row['user_lastname'];
    $user_role=$row['user_role'];
    $username=$row['username'];
//    $post_image=$_FILES['image']['name'];
//    $post_image_temp=$_FILES['image']['tmp_name'];
    $user_email=$row['user_email'];
    $user_password=$row['user_password'];
//    $post_date=date('d-m-y');
    }
    
//    move_uploaded_file($post_image_temp,"../images/$post_image");
    
//    $query = "INSERT into users(user_firstname,user_lastname,user_role,username,user_email,user_password)  VALUES('$user_firstname','$user_lastname','$user_role','$username','$user_email','$user_password')";
//    $create_post_query = mysqli_query($con,$query);
//    confirmQuery( $create_post_query);
//    

?>
    
<?php
if(isset($_POST['update_user'])){
    
    $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
    $user_role=$_POST['user_role'];
    $username=$_POST['username'];
//    $post_image=$_FILES['image']['name'];
//    $post_image_temp=$_FILES['image']['tmp_name'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
//    $post_date=date('d-m-y');
    
    
//    move_uploaded_file($post_image_temp,"../images/$post_image");
    
   
          $query = "UPDATE users SET ";
          $query .="user_firstname  = '{$user_firstname}', ";
          $query .="user_lastname = '{$user_lastname}', ";
//          $query .="post_date   =  now(), ";
          //$query .="post_user = '{$post_user}', ";
          $query .="user_role = '{$user_role}', ";
          $query .="username   = '{$username}', ";
          $query .="user_email= '{$user_email}' ";
          $query .= "WHERE user_id = {$the_e_id} ";
    $update_user_query = mysqli_query($con,$query);
    if(! $update_user_query){
        die("fail".mysqli_error($con));
    }
}
?>
    
    <form action="" method="post" enctype="multipart/form-data">    
     
     
     <div class="form-group">
        <label for="title">Firstname</label>
         <input type="text" name="user_firstname" class="form-control" value="<?php echo $user_firstname; ?>">
     </div> 
       <div class="form-group">
        <label for="title">lastname</label>
         <input type="text" name="user_lastname" class="form-control" value="<?php echo $user_lastname; ?>" >
     </div> 
       
       
   <div class="form-group">
      
        <select name="user_role" id="post_category">
          
           <option value="subscriber"><?php echo $user_role; ?></option>
           <?php
            if($user_role == 'admin'){
                
                 echo "<option value='subcriber'>subcriber</option>";
            }else{
              echo"<option value='admin'>admin</option>";
            }
            
            ?>
          
          
        </select>
     </div>
<!--
       <div class="form-group">
         <label for="post_image">user Image</label>
          <input type="file"  name="user_image">
      </div>
-->
      <div class="form-group">
        <label for="author">Username</label>
         <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
     </div>
       
       <div class="form-group">
        <label for="author">Email</label>
         <input type="email" name="user_email" class="form-control" value="<?php echo  $user_email; ?>">
     </div>
      
  

      <div class="form-group">
         <label for="post_tags">Password</label>
          <input type="password" class="form-control" name="user_password" value=" <?php echo  $user_password; ?>">
      </div>
      
      
       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="update_user" value="Update User">
      </div>


</form>
    