<?php
    include "config.php";
    $post_id=$_GET['id'];
    $cart_id=$_GET['category_id'];

    $sql1 = "SELECT * from post where post_id={$post_id}";
    $result=mysqli_query($conn,$sql1) or die("Query failed:SELECT");
    $row= mysqli_fetch_assoc($result);

    unlink("upload/".$row['post_img']);

    $sql ="DELETE FROM post where post_id={$post_id};";
    $sql .="UPDATE category SET post= post - 1 where category_id={$cart_id}";

    if(mysqli_multi_query($conn,$sql)){
        header("location: {$hostname}/admin/post.php");
    } else {
        echo "Query failed";
    }
?>