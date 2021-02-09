<?php include "db.php"; ?>
<?php session_start(); ?>


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
            $db_user_id = $row['user_id'];
            $db_username = $row['username'];
            $db_user_password = $row['user_password'];
            $db_user_fistname = $row['user_firstname'];
            $db_user_lastname = $row['user_lastname'];
//            $db_user_email = $row['user_email'];
//            $db_user_image = $row['user_image'];
            $db_user_role = $row['user_role'];
            
        }
        
        if($username !== $db_username && $password !== $db_user_password){
            header("Location: ../index.php");
        }else if($username === $db_username && $password === $db_user_password){
            
            $_SESSION['username'] = $db_username;
            $_SESSION['firstname'] = $db_user_fistname; 
            $_SESSION['lastname'] = $db_user_lastname; 
            $_SESSION['user_role'] = $db_user_role;
            
            
            header("Location: ../admin");
        }else{
            header("Location: ../index.php");
        }
        
        
        
    }
        

?>