
<?php
if(isset($_POST['create_user'])){
    
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
    
    $query = "INSERT into users(user_firstname,user_lastname,user_role,username,user_email,user_password)  VALUES('$user_firstname','$user_lastname','$user_role','$username','$user_email','$user_password')";
    $create_user_query = mysqli_query($con,$query);
    confirmQuery( $create_user_query);
        echo "user created: " . " " . "<a href='users.php'>View users</a>";

    
}
?>
    

    
    <form action="" method="post" enctype="multipart/form-data">    
     
     
     <div class="form-group">
        <label for="title">Firstname</label>
         <input type="text" name="user_firstname" class="form-control">
     </div> 
       <div class="form-group">
        <label for="title">lastname</label>
         <input type="text" name="user_lastname" class="form-control">
     </div> 
       
   <div class="form-group">
        <select name="user_role" id="post_category">
           <option value="subscriber">Select option</option>
           <option value="Admin">Admin</option>
           <option value="subcriber">Subcriber</option>
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
         <input type="text" name="username" class="form-control">
     </div>
       
       <div class="form-group">
        <label for="author">Email</label>
         <input type="email" name="user_email" class="form-control">
     </div>
      
  

      <div class="form-group">
         <label for="post_tags">Password</label>
          <input type="password" class="form-control" name="user_password">
      </div>
      
      
       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
      </div>


</form>
    