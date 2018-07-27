
<?php include "includes/admin_header.php";?>
<?php include "functions.php";?>
<?php ob_start();?>

    <div id="wrapper">
<?php include"includes/admin_navigation.php";?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            PHP
                            <small> Posts</small>
                        </h1>
                       <?php
                        if(isset($_SESSION['username']))
                        {
                            
                            $username = $_SESSION['username'];
                            $query = "SELECT * FROM users WHERE username = '{$username}'";
                            $profile_user_query = mysqli_query($con,$query);
                            while($row = mysqli_fetch_assoc($profile_user_query )){
                                $username = $row['username'];
                                $user_id = $row['user_id'];
                                $user_image = $row['user_image'];
                                $user_password = $row['user_password'];
                                $firstname = $row['user_firstname'];
                                $lastname = $row['user_lastname'];
                                $email = $row['user_email'];
                                $userrole = $row['user_role'];
                                
                                }
                        }
                        if(isset($_POST['update_user'])){
                             $username = $_POST['username'];
//                           $user_image = $_POST['user_image'];
                                $user_password = $_POST['user_password'];
                                $firstname = $_POST['user_firstname'];
                                $lastname = $_POST['user_lastname'];
                                $email = $_POST['user_email'];
                                $userrole = $_POST['user_role'];
                                $query = "UPDATE users SET ";
                                $query .="user_firstname  = '{$firstname}', ";
                                $query .="user_lastname = '{$lastname}', ";
                                $query .="user_role = '{$userrole}', ";
                                $query .="username   = '{$username}', ";
                                $query .="user_password   = '{$user_password}', ";
                                $query .="user_email= '{$email}' ";
                                $query .= "WHERE username = '{$username}' ";
                                 $update_profile = mysqli_query($con,$query);
                            if(!$update_profile){
                                die("fail".mysqli_error($con));
                            }
                            
                        }
                        ?>
                        <form action="" method="post" enctype="multipart/form-data">    
     
     
     <div class="form-group">
        <label for="title">Firstname</label>
         <input type="text" name="user_firstname" class="form-control" value="<?php echo $firstname; ?>">
     </div> 
       <div class="form-group">
        <label for="title">lastname</label>
         <input type="text" name="user_lastname" class="form-control" value="<?php echo $lastname; ?>">
     </div> 
       
       
  <div class="form-group">
      <b>User Role</b>
       <br>
        <select name="user_role" id="post_category">
          
           <option value="subscriber"><?php echo $userrole; ?></option>
           <?php
            if($userrole == 'admin'){
                
                 echo "<option value='subcriber'>subcriber</option>";
            }else{
              echo"<option value='admin'>admin</option>";
            }
            
            ?>
          
          
        </select>
     </div>

      <div class="form-group">
        <label for="author">Username</label>
         <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
     </div>
       
       <div class="form-group">
        <label for="author">Email</label>
         <input type="email" name="user_email" class="form-control" value="<?php echo $email; ?>">
     </div> 
       <div class="form-group">
        <label for="author">Password</label>
         <input type="password" name="user_password" class="form-control" value="<?php echo $user_password; ?>">
     </div>
       
      
      
       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="update_user" value="Update User">
      </div>


</form>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


  

    
    
    
   
    <!-- /#wrapper -->

   <?php include "includes/admin_footer.php";?>