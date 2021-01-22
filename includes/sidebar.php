<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">
<!--
-->
    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            
        <div class="input-group">
            <input type="text" name="search" class="form-control">
            <span class="input-group-btn">
            <button class="btn btn-default" type="submit" name="submit">
                    <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
        </div>
        
        </form>
        <!-- /.input-group -->
    </div>
    
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php
                        $query = "SELECT * FROM categories";
                        $select_sidebar_categories_query = mysqli_query($connect,$query);
                        while($row = mysqli_fetch_assoc($select_sidebar_categories_query)){
                            $category = $row['cat_title'];
                            $cat_id = $row['cat_id'];
                            echo "<li><a href='category.php?category=$cat_id'>{$category}</a></li>";
                        };
                    ?>
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include "widget.php"?>
</div>