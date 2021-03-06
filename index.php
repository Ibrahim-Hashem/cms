<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    <!-- Navigation -->
<?php include "includes/nav.php"; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->

                <h1 class="page-header">
                   Post Entries
                </h1>
            <div class="col-md-8">
                
            <?php
            $query = "SELECT * FROM posts ";
            $select_all_posts_query = mysqli_query($connect,$query);
            while($row = mysqli_fetch_assoc($select_all_posts_query)){
                    $post_title = $row['post_title'];
                    $post_id = $row['post_id'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'],0,50);
                    $post_status = $row['post_status'];
                    if ($post_status == 'published'){ ?>
                <!-- First Blog Post -->
                        <div style="box-shadow: 1px 1px 15px #778899; border-radius:5px;">
                           <div style="padding:10px; margin-bottom:50px;">
                                <a style="text-decoration:none" href="post.php?p_id=<?php echo "{$post_id}"?>">
                                    <h2>
                                        <?php echo "{$post_title}"?>
                                    </h2>
                                    <p class="lead">
                                        by <?php echo "{$post_author}"?>
                                    </p>
                                    <p><span class="glyphicon glyphicon-time"></span> <?php echo "{$post_date}"?></p>
                                    <hr>
                                        <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">

                                    <hr>
                                    <p><?php echo "{$post_content}"?></p>
                                    <p>Read More <span class="glyphicon glyphicon-chevron-right"></span></p> 
                                </a>
                            </div>
                        </div>
                
            
            <?php } } ?>


            </div>

<?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>
<?php include "includes/footer.php"; ?>