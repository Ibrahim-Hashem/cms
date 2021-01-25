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
                    
                    <?php
                        
                        $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
                        $query_connect_title = mysqli_query($connect,$query);
                        while($row = mysqli_fetch_assoc($query_connect_title)){
                            $post_title = $row['post_title'];
                            $post_id = $row['post_id'];    
                            echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                        }
                    
                    ?>
                    
                    <td><?php echo $comment_date;  ?></td>
                    <td><a href=<?php echo "post.php?delete=";?>>Approve</a></td>
                    <td><a href=<?php echo "post.php?source=edit_post&p_id=";?>>Unapprove</a></td>
                    <td><a href=<?php echo "comments.php?delete=$comment_id"; ?> >X</a></td>;
                    
                </tr> 
            <?php }; ?>
            
    </tbody>
</table>

<?php
    if(isset($_GET['delete'])){
        $the_comment_id = $_GET['delete'];
        $delete_query = "DELETE FROM comments WHERE comment_id = $the_comment_id ";
        $delete_query_connect = mysqli_query($connect, $delete_query);
        header("Location: comments.php");
        
    }
?>    