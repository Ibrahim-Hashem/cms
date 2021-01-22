<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    <!-- Navigation -->
<?php include "includes/nav.php"; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->

                <h1 class="page-header">
                   All posts
                </h1>
            <div class="col-md-8">
                
            <?php
            $query = "SELECT * FROM posts";
            $select_all_posts_query = mysqli_query($connect,$query);
            while($row = mysqli_fetch_assoc($select_all_posts_query)){
                    $post_title = $row['post_title'];
                    $post_id = $row['post_id'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'],0,50);
                    
                    ?>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo "{$post_id}"?>"><?php echo "{$post_title}"?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo "{$post_author}"?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo "{$post_date}"?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo "{$post_content}"?></p>
                <a href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                
            
            <?php } ?>


            </div>

<?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>
<?php include "includes/footer.php"; ?>