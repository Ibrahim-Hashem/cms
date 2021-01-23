<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In response to</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = "SELECT * FROM comments";
            $query_comments = mysqli_query($connect,$query);

            while($row = mysqli_fetch_assoc($query_comments)){
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
                                
                    
                    <td><?php echo $comment_email;  ?></td>
                    <td><?php echo $comment_status;  ?></td>
                    <td>some title</td>
                    <td><?php echo $comment_date;  ?></td>
                    <td><a href=<?php echo "post.php?delete=";?>>Approve</a></td>
                    <td><a href=<?php echo "post.php?source=edit_post&p_id=";?>>Unapprove</a></td>
                    <td><a href=<?php echo "post.php?delete=";?>>X</a></td>
                    <td><a href=<?php echo "post.php?source=edit_post&p_id=";?>>edit</a></td>
                    
                    <?php delete() ?>
                    
                </tr> 
            <?php }; ?>
            
    </tbody>
</table>