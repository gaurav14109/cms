<?php include "db.php";?>
<?php session_start(); ?>
<?php
          if(isset($_POST['login'])){
                       $username = $_POST['username'];
                     $password = $_POST['password'];
              
              $username = mysqli_real_escape_string($con,$username);
              $password = mysqli_real_escape_string($con,$password);
                   }
    $query = "SELECT * FROM users where username = '{$username}' ";
    $select_user_query = mysqli_query($con,$query);
   while($row = mysqli_fetch_assoc($select_user_query)){
       $db_user_id = $row['user_id'];
       $db_username = $row['username'];
       $db_user_password = $row['user_password'];
       $db_user_firstname = $row['user_firstname'];
       $db_user_lastname = $row['user_lastname'];
       $db_user_role = $row['user_role'];
   }
if($username !== $db_username && $password !== $db_user_password){
    header ("location: ../index.php ");
}
 else
 {
     //    before we login we need some info admin should know who has logged in to system etc with the help of session we give this  session value every time we need to access any session value we need to turn it on session_start() $_SESSION['name] = value; 
    $_SESSION['username'] = $db_username;
    $_SESSION['firstname'] =  $db_user_firstname;
    $_SESSION['lastname'] =  $db_user_lastname;
    $_SESSION['role'] = $db_user_role;
     
         header ("location: ../admin");
     

 }
                   
                   ?>

