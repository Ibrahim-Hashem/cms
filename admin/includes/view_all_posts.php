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
            <th>Delete</th>
            <th>Edit</th>
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
                    <td><a href=<?php echo "post.php?delete={$post_id}";?>>X</a></td>
                    <td><a href=<?php echo "post.php?source=edit_post&p_id={$post_id}";?>>edit</a></td>
                    
                    <?php delete() ?>
                    
                </tr> 
            <?php }; ?>
            
    </tbody>
</table>