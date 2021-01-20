<?php
function confirm($result){
    global $connect;
    if(!$result){
        die("Query failed". mysqli_error($connect));
    }
}
?>