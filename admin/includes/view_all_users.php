<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Usernamer</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = "SELECT * FROM users";
            $query_users = mysqli_query($connect,$query);

            while($row = mysqli_fetch_assoc($query_users)){
                $user_id = $row['user_id'];
                $user_password = $row['user_password'];
                $user_username = $row['username'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['user_email'];
                $user_image = $row['user_image'];
                $user_role = $row['user_role'];
                ?>
                <tr>        
                    <td><?php echo $user_id;  ?></td>
                    <td><?php echo $user_username;  ?></td>
                    <td><?php echo $user_firstname;  ?></td>
                    <td><?php echo $user_lastname;  ?></td>
                    
                    <td><?php echo $user_email;  ?></td>
                    <td><?php echo $user_role;  ?></td>
<!--
                    <td><a href="users.php?approve">approved</a></td>
                    <td><a href="users.php?unpprove">unapprove</a></td>
-->
                    <td><a href=<?php echo "users.php?delete=$user_id"; ?> >X</a></td>
                    
                    
                </tr> 
            <?php } ?>
            
    </tbody>
</table>

<?php

    if(isset($_GET['approve'])){
        $the_comment_id = $_GET['approve'];
        $approve_query = "UPDATE users SET comment_status= 'Approve' WHERE comment_id = $the_comment_id ";
        $unapprove_query_connect = mysqli_query($connect,$approve_query);
        header("Location: comments.php");
        
    }

    if(isset($_GET['unapprove'])){
        $the_comment_id = $_GET['unapprove'];
        $unapprove_query = "UPDATE comments SET comment_status= 'Unapprove' WHERE comment_id = $the_comment_id ";
        $unapprove_query_connect = mysqli_query($connect,$unapprove_query);
        header("Location: comments.php");
        
    }


    if(isset($_GET['delete'])){
        $the_user_id = $_GET['delete'];
        $delete_query = "DELETE FROM users WHERE user_id = $the_user_id ";
        $delete_query_connect = mysqli_query($connect, $delete_query);

        header("Location: users.php");
        
    }
?>    