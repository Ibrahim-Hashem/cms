<?php
function confirm($result){
    global $connect;
    if(!$result){
        die("Query failed". mysqli_error($connect));
    }
}

function delete(){
    global $connect;
    if(isset($_GET['delete'])){
        $the_delete_id = $_GET['delete'];
        $delete_query = "DELETE FROM posts WHERE post_id = {$the_delete_id} ";
        $delete_query_connect = mysqli_query($connect, $delete_query); 
        header("Location: post.php");
    };
}

function delete_comment(){
    global $connect;
    if(isset($_GET['delete'])){
        $the_delete_id = $_GET['delete'];
        $delete_query = "DELETE FROM comments WHERE comment_id = {$the_delete_id} ";
        $delete_query_connect = mysqli_query($connect, $delete_query); 
        header("Location: comment.php");
    };
}

?>