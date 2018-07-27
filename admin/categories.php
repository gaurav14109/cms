
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
                            <small>By Author</small>
                        </h1>
                        
                        <div class="col-xs-6">
                           
                           
                           <?php
                         insert_categories()
                            ?>
                            <form action="" method="post">
                                <div class="form-group">
                                   <label for="cat_title">Add Category</label>                             
                                    <input class="form-control" type="text" name="cat_title">
                                </div><div class="form-group">
                                    <input class="btn btn-primary "type="submit" name="submit" value="Add Category">
                                </div>
                                
                            </form>
                            
                            <?php
                            if(isset($_GET['edit']))
                            {
                                $cat_id = $_GET['edit'];
                                include "includes/update_categories.php";
                            }
                            ?>
                        </div>
                        
                        <div class="col-xs-6">
                     
                            
                            <table class="table table-bordered table-hover">
                            
                            <thead >
                                <tr><th>id</th>
                                <th>Category title</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
                                  <?php
                                 $query = "SELECT * FROM categories";
                            $select_categories = mysqli_query($con,$query);
                            while ($row = mysqli_fetch_assoc($select_categories)){
                                
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];
                                echo "<tr>";
                                echo "<td>{$cat_id}</td>";
                                echo "<td>{$cat_title}</td>";
                                echo "<td><a href='categories.php?delete={$cat_id}'>DELETE</a></td>";//array delete will be key for array and cat_id is value super global
                                    echo "<td><a href='categories.php?edit={$cat_id}'>EDIT</a></td>";
                                 echo "</tr>"; 
                            }
                            ?>
                                   <?php
                                delete_categories();
                            ?>
                            
                            </tbody>
                        </table>
                           
                            
                       
                        </div>
                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   
    <!-- /#wrapper -->

   <?php include "includes/admin_footer.php";?>