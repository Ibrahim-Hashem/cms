<?php include "includes/admin_header.php"?>
<?php include "includes/admin_navigation.php"?>    

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Posts
                </h1>

                   
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Categories</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Tags</th>
                                <th>Comments</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = "SELECT * FROM posts";
                                $query_connect = mysqli_query($connect,$query);
                                
                                while($row = mysqli_fetch_assoc($query_connect)){
                                    $post_id = $row['post_id'];
                                    $post_author = $row['post_author'];
                                    $post_title = $row['post_title'];
                                    $post_category_id = $row['post_category_id'];
                                    $post_status = $row['post_status'];
                                    $post_image = $row['post_image'];
                                    $post_tags = $row['post_tags'];
                                    $post_comments = $row['post_comment_count'];
                                    $post_date = $row['post_date'];
                                    ?>
                                    
                                    <tr>        
                                        <td><?php echo $post_id;  ?></td>
                                        <td><?php echo $post_author;  ?></td>
                                        <td><?php echo $post_title;  ?></td>
                                        <td><?php echo $post_category_id;  ?></td>
                                        <td><?php echo $post_status;  ?></td>
                                        <td><img src="../images/<?php echo $post_image;?>" style="width:200px;" alt=""></td>
                                        <td><?php echo $post_tags;  ?></td>
                                        <td><?php echo $post_comments;  ?></td>
                                        <td><?php echo $post_date;  ?></td>
                                    </tr> 
                                <?php }; ?>
                        </tbody>
                    </table>
                
            </div> 
        </div>
        <!-- /.row -->
        
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"?>