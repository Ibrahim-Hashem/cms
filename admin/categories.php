<?php include "includes/admin_header.php"?>
<?php include "includes/admin_navigation.php"?>    

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to Admin Page
                    <small>Author</small>
                </h1>
            </div>
            <div class="col-xs-6">
                <?php
                    if(isset($_POST['submit'])){
                        $cat_title = $_POST['cat_title'];
                        if($cat_title == "" ||empty($cat_title)){
                            echo "Enter a category";
                        }else{
                            $query_add = "INSERT INTO categories(cat_title) ";
                            $query_add .="VALUE('{$cat_title}')";
                            $create_category_query = mysqli_query($connect,$query_add);
                            if(!$create_category_query){
                                die("Quiery failed". mysqli_error($connect));
                            };
                        };
                        
                    };
                ?>
            
                <?php
                    $query = "SELECT * FROM categories";
                    $select_sidebar_categories_query = mysqli_query($connect,$query);
                 ?>   
                <form action="" method="post">
                    <div class="form-group">
                        <label for="cat_title">Add Category</label>
                        <input type="text" name="cat_title" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                    </div>
                </form>
            </div>
            <div class="col-xs-6">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category title</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                           while($row = mysqli_fetch_assoc($select_sidebar_categories_query)){
                                $category = $row['cat_title'];
                                $cat_id = $row['cat_id'];
                                echo 
                                    "<tr>
                                        <td>{$cat_id}</td>
                                        <td>{$category}</td>
                                    </tr>";
                            };
                      ?>   
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