<?php include "db.php"; ?>


<?php
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $username = mysqli_real_escape_string($connect, $username);
        $password = mysqli_real_escape_string($connect, $password);
        
        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        
        $select_query = mysqli_query($connect, $query);
        
        if(!$select_query){
            die('query failed'.mysqli_error($connect));
        }
        
        while($row  = mysqli_fetch_assoc($select_query)){
            echo $row['user_id'];
        }
        
        
    }
        

?>