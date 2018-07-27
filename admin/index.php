

<?php include "includes/admin_header.php";?>


<body>

    <div id="wrapper">
<?php include"includes/admin_navigation.php";?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           WELCOME 
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->

                  
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                        $query = "SELECT * FROM posts";
                        $select_all_post = mysqli_query($con,$query);
                        
                        $post_counts = mysqli_num_rows( $select_all_post);    
                        echo "<div class='huge'>$post_counts</div>";
                        
                        ?>
                    
                    
                 
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                       <?php
                        $query = "SELECT * FROM comments";
                        $select_all_comments = mysqli_query($con,$query);
                        
                        $comment_counts = mysqli_num_rows( $select_all_comments);    
                        
                        
                        ?>
                     <div class='huge'><?php echo $comment_counts; ?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                        
                    </div>
                    <div class="col-xs-9 text-right">
                     <?php
                        $query = "SELECT * FROM users";
                        $select_all_users = mysqli_query($con,$query);
                        
                        $user_counts = mysqli_num_rows( $select_all_users);    
                        
                       
                        ?>
                    <div class='huge'><?php echo $user_counts; ?></div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
             
                    <div class="col-xs-9 text-right">
                       <?php
                        $query = "SELECT * FROM categories";
                        $select_all_cat = mysqli_query($con,$query);
                        
                        $cat_counts = mysqli_num_rows( $select_all_cat);    
                        
                       
                        ?>
                        <div class='huge'><?php echo $cat_counts; ?></div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
               
                <?php
                        $query = "SELECT * FROM posts WHERE post_status = 'draft'";
                        $select_all_draft_post = mysqli_query($con,$query);
                        
                        $post_draft_counts = mysqli_num_rows( $select_all_draft_post);  
                 
                
                    $query = "SELECT * FROM comments WHERE comment_status = 'unapproved'";
                        $select_all_unapproved_comment = mysqli_query($con,$query);
                        
                        $comment_unapproved_counts = mysqli_num_rows($select_all_unapproved_comment); 
                    
                $query = "SELECT * FROM users WHERE user_role = 'subscriber'";
                        $select_all_subcriber = mysqli_query($con,$query);
                        
                        $subcriber_counts = mysqli_num_rows( $select_all_subcriber);  
                       
                       
                        ?>
                <div class="row">
                    
                    
                    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['data', 'count'],
            
            <?php
            $select_element = ['posts','users','categories','comments','post draft','pending comment','subcriber'];
            $counts= [$post_counts,$user_counts,$comment_counts,$cat_counts,$post_draft_counts,$comment_unapproved_counts,$subcriber_counts];
            
            for($i = 0;$i<7;$i++){
                
                echo "['{$select_element[$i]}'" . "," . "{$counts[$i]}],";
            }
            
            ?>
         
       
        ]);

        var options = {
          chart: {
            title: '',
            subtitle:'' ,
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
                   <div id="columnchart_material" style="width: auto; height: 500px;"></div>

                </div>
               
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   
    <!-- /#wrapper -->

   <?php include "includes/admin_footer.php";?>