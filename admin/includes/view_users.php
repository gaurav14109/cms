                     
                       
                        <table class="table table-bordered table-hover">
                            
                            <thead >
                                <tr><th>id</th>
                                <th>username</th>
                                <th>firstname</th>
                                <th>lastname</th>
                                <th>email</th>
                                <th>image</th>
                                <th>role</th>
<!--                                <th>date</th>-->
                                <th>Edit</th>
                                <th>delete</th>
                               
                                    
                                </tr>
                            </thead>
                            <tbody>
                        <?php
                         $query = "SELECT * FROM users";
                        $users = mysqli_query($con,$query);
                        while($row = mysqli_fetch_assoc($users)){
                            $user_id = $row['user_id'];
                            $username = $row['username'];
                            $user_password = $row['user_password'];
                            $user_firstname = $row['user_firstname'];
                            $user_lastname = $row['user_lastname'];
                            $user_email = $row['user_email'];
                            $user_image = $row['user_image'];
                            $user_role = $row['user_role'];
                           
                          
                            echo "<tr>";
                            echo "<td>$user_id </td>";
                            echo "<td>$username</td>";
                            echo "<td>$user_firstname</td>";
                            
                            
                            
//                            $query="SELECT * FROM categories WHERE cat_id = {$post_category_id} ";                 
//                            $select_categories = mysqli_query($con,$query);
//                            while($row = mysqli_fetch_assoc($select_categories)){
//                            $cat_id=$row['cat_id'];
//                            $cat_title=$row['cat_title'];
//                           echo "<td>$cat_title </td>";
//                                
//                            }
                             
                            
                            echo "<td>$user_lastname </td>";
                            echo "<td>$user_email</td>";
                            echo "<td><img width='100' src='../images/ $user_image' alt='image'> </td>";
                            echo "<td>$user_role </td>";
                            
                            echo "<td><a href='users.php?source=edit_users&e_id={$user_id}'>EDIT </td>";
                            echo "<td><a href='users.php?delete={$user_id}'>DELETE </a></td>";
                            echo "<td><a href='users.php?change_to_admin={$user_id}'>admin </td>";
                            echo "<td><a href='users.php?change_to_subscriber={$user_id}'>subscriber </a></td>";   
                          
                            echo "</tr>";
                                                   
                        }
                                        ?>
                            </tbody>
                        </table>
                        <?php
                        if(isset($_GET['change_to_admin'])){
                           $the_user_id = $_GET['change_to_admin'];
                           $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $the_user_id ";
                           $change_to_admin = mysqli_query($con,$query);
                         header("Location: users.php");
                                            
                       }
  if(isset($_GET['change_to_subscriber'])){
                           $the_user_id = $_GET['change_to_subscriber'];
                           $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $the_user_id ";
                            $change_to_subscriber = mysqli_query($con,$query);
                         header("Location: users.php");
                                            
                       }
?>
                        <?php
                       if(isset($_GET['delete'])){
                           $the_user_id = $_GET['delete'];
                           $query = "DELETE FROM users where user_id = $the_user_id";
                           $delete_query = mysqli_query($con,$query);
                         header("Location: users.php");
                                            
                       }

                      ?>
              
               