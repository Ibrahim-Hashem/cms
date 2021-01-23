<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In response to</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Date</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = "SELECT * FROM posts";
            $query_connect = mysqli_query($connect,$query);

            while($row = mysqli_fetch_assoc($query_connect)){
                $comment_id = $row['comment_id'];
                $comment_author = $row['comment_author'];
                $comment_post_id = $row['comment_post_id'];
                $comment_status = $row['comment_status'];
                $comment_email = $row['comment_email'];
                $comment_content = $row['comment_content'];
                $comment_date = $row['comment_date'];
                ?>
                <tr>        
                    <td><?php echo $comment_id;  ?></td>
                    <td><?php echo $comment_author;  ?></td>
                    <td><?php echo $comment_content;  ?></td>
                    
                    <?php
                    $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
                    $select_cat_connect = mysqli_query($connect,$query);
                    while($row_post = mysqli_fetch_assoc($select_cat_connect)){
                        $cat_id = $row_post["cat_id"];
                        $cat_title = $row_post["cat_title"];
                    ?>
                    
                    <?php echo "<td> $cat_title</td>"; ?> 
                    
                    <?php }; ?>
                    
                    
                    
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