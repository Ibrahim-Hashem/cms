<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    <!-- Navigation -->
<?php include "includes/nav.php"; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->

            <div class="col-md-8">
                
            <?php
            if(isset($_POST['search'])){
                $search = $_POST['search'];
                $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                $query_search = mysqli_query($connect, $query);
                if(!$query_search){
                    die("connection failed".mysqli_error($connect));
                }
                $count = mysqli_num_rows($query_search);
                if($count == 0){
                    echo "<h1>No Results</h1>";
                }else{
//                $query = "SELECT * FROM posts";
//                $select_all_posts_query = mysqli_query($connect,$query);
                    while($row = mysqli_fetch_assoc($query_search)){
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                        ?>
                    <h1 class="page-header">
                       Header
                        <small>Secondary Text</small>
                    </h1>

                    <!-- First Blog Post -->
                    <h2>
                        <a href="#"><?php echo "{$post_title}"?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo "{$post_author}"?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo "{$post_date}"?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                    <hr>
                    <p><?php echo "{$post_content}"?></p>
                    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
<?php 
                    }
                }      
            }
?>
                


            </div>

<?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>
<?php include "includes/footer.php"; ?>