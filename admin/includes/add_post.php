
<?php
if(isset($_POST['create_post'])){
    
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
    
    $query = "INSERT into posts(post_title,post_category_id,post_author,post_status,post_image,post_tags,post_content,post_date)  VALUES('$post_title','$post_category_id','$post_author','$post_status','$post_image','$post_tags','$post_content',now())";
    $create_post_query = mysqli_query($con,$query);
    confirmQuery( $create_post_query);
    
}
?>
    

    
    <form action="" method="post" enctype="multipart/form-data">    
     
     
     <div class="form-group">
        <label for="title">Post Title</label>
         <input type="text" name="title" class="form-control">
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
         <input type="text" name="author" class="form-control">
     </div>
       
       <div class="form-group">
        <label for="author">Post Status</label>
         <input type="text" name="status" class="form-control">
     </div>
      
    <div class="form-group">
         <label for="post_image">Post Image</label>
          <input type="file"  name="image">
      </div>

      <div class="form-group">
         <label for="post_tags">Post Tags</label>
          <input type="text" class="form-control" name="post_tags">
      </div>
      
      <div class="form-group">
         <label for="post_content">Post Content</label>
         <textarea class="form-control "name="post_content" id="" cols="30" rows="10">
         </textarea>
      </div>
      
       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
      </div>


</form>
    