
<?php
if(isset($_GET['edit'])){
    $the_post_id = $_GET['edit'];
}
    $query = "SELECT * from posts where post_id = $the_post_id";
  $edit_post_id = mysqli_query($con,$query);
     while($row = mysqli_fetch_assoc($edit_post_id))
     {
         
         
     $post_id = $row['post_id'];
    $post_title=$row['post_title'];
    $post_category_id=$row['post_category_id'];
    $post_author=$row['post_author'];
    $post_status=$row['post_status'];
    $post_image=$row['post_image'];
    
   $post_tags=$row['post_tags'];
    $post_content=$row['post_content']; 
    $post_date=$row['post_date'];
    $post_comment_count=$row['post_comment_count'];
   
    
    //move_uploaded_file($post_img_temp,"../images/$post_img");
    
//    $query = "INSERT into posts(post_title,post_category_id,post_author,post_status,post_image,post_tags,post_content,post_date,post_comment_count)  VALUES('$post_title','$post_category_id','$post_author','$post_status','$post_image','$post_tags','$post_content',now(),'$comment_count')";
//    $create_post_query = mysqli_query($con,$query);
//    confirmQuery( $create_post_query);
     }
if(isset($_POST['update_post'])){
     $post_title=$_POST['title'];
    $post_category_id=$_POST['post_category'];
    $post_author=$_POST['author'];
    $post_status=$_POST['status'];
    $post_image=$_FILES['image']['name'];
    $post_image_temp=$_FILES['image']['tmp_name'];
    $post_tags=$_POST['post_tags'];
    $post_content=$_POST['post_content'];
    $post_date=date('d-m-y');
    
    move_uploaded_file($post_image_temp,"../images/$post_image");
    if(empty($post_image)) {
        
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
        $select_image = mysqli_query($con,$query);
            
        while($row = mysqli_fetch_array($select_image)) {
            
           $post_image = $row['post_image'];
        
        }
        
        
}
          $query = "UPDATE posts SET ";
          $query .="post_title  = '{$post_title}', ";
          $query .="post_category_id = '{$post_category_id}', ";
          $query .="post_date   =  now(), ";
          //$query .="post_user = '{$post_user}', ";
          $query .="post_status = '{$post_status}', ";
          $query .="post_tags   = '{$post_tags}', ";
          $query .="post_content= '{$post_content}', ";
          $query .="post_image  = '{$post_image}' ";
          $query .= "WHERE post_id = {$the_post_id} ";
    $update_edit_post = mysqli_query($con,$query);
    }

 ?>   


    

    
    <form action="" method="post" enctype="multipart/form-data">    
     
     
     <div class="form-group">
        <label for="title">Post Title</label>
         <input type="text" name="title" class="form-control" value="<?php echo $post_title; ?>">
     </div> 
       
       <div class="form-group">
        <select name="post_category" id="post_category">
            <?php
                            $query = "SELECT * FROM categories";
                            $select_categories = mysqli_query($con,$query);
                            while ($row = mysqli_fetch_assoc($select_categories)){
                                
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];
                               echo "<option value='$cat_id'>$cat_title</option>";
                                
                            }
                            ?>
            
        </select>
     </div>
     
      <div class="form-group">
        <label for="author">Post Author</label>
         <input type="text" name="author" class="form-control" value="<?php echo $post_author; ?>">
     </div>
       
       <div class="form-group">
        <label for="author">Post Status</label>
         <input type="text" name="status" class="form-control" value="<?php echo $post_status; ?>">
     </div>
      
    <div class="form-group">
        <img width="100" src="../images/<?php echo $post_image;?>">
        <input type="file" name="image" >
      </div>

      <div class="form-group">
         <label for="post_tags">Post Tags</label>
          <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags; ?>">
      </div>
      
      <div class="form-group">
         <label for="post_content">Post Content</label>
         <textarea class="form-control "name="post_content" id="" cols="30" rows="10" >
        <?php echo $post_content; ?>
         </textarea>
      </div>
      
       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
      </div>


</form>
