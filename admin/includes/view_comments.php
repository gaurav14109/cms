                     
                       
                        <table class="table table-bordered table-hover">
                            
                            <thead >
                                <tr><th>id</th>
                                <th>post_id</th>
                                <th>Author</th>
                                <th>Email</th>
                                <th>Content</th>
                                <th>Status</th>
                                <th>In Response To</th>
                                <th>Date</th> 
                                <th>Approve</th>
                                <th>Unapprove</th>
                               
                                <th>Delete</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                        <?php
                         $query = "SELECT * FROM comments";
                        $comment = mysqli_query($con,$query);
                        while($row = mysqli_fetch_assoc($comment)){
                            $comment_id = $row['comment_id'];
                            $comment_post_id = $row['comment_post_id'];
                            $comment_author = $row['comment_author'];
                            $comment_email = $row['comment_email'];
                            $comment_content = $row['comment_content'];
                            $comment_status = $row['comment_status'];
                            $comment_date = $row['comment_date'];
                           
                          
                            echo "<tr>";
                            echo "<td>$comment_id </td>";
                            echo "<td>$comment_post_id</td>";
                            echo "<td>$comment_author</td>";
                            echo "<td>$comment_email</td>";
                            echo "<td>$comment_content </td>";
                            echo "<td>$comment_status </td>";
                            
                            $query = "SELECT * from posts WHERE post_id = $comment_post_id";
                            $run_query = mysqli_query($con,$query);
                            while($row = mysqli_fetch_assoc($run_query)){
                                $post_title = $row['post_title'];
                                $post_id = $row['post_id'];
                            echo "<td><a href='../post.php?p_id=$post_id'> $post_title </a> </td>";
                            }
                            echo "<td>$comment_date </td>";
                            echo "<td><a href='comments.php?approve={$comment_id}'>approve </td>";
                            echo "<td><a href='comments.php?unapprove={$comment_id}'>unapprove </a></td>";   
                            echo "<td><a href='comments.php?delete={$comment_id}'>DELETE </a></td>";
                            echo "</tr>";
                                                   
                        }
                                        ?>
                            </tbody>
                        </table>
                        <?php


  if(isset($_GET['unapprove'])){
                           $the_comment_id = $_GET['unapprove'];
                           $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id ";
                           $unapprove_query = mysqli_query($con,$query);
                         header("Location: comments.php");
                                            
                       }
  if(isset($_GET['approve'])){
                           $the_comment_id = $_GET['approve'];
                           $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comment_id ";
                           $unapprove_query = mysqli_query($con,$query);
                         header("Location: comments.php");
                                            
                       }
                       if(isset($_GET['delete'])){
                           $the_comment_id = $_GET['delete'];
                           $query = "DELETE FROM comments where comment_id = $the_comment_id";
                           $delete_query = mysqli_query($con,$query);
                         header("Location: comments.php");
                                            
                       }

                      ?>
              
               