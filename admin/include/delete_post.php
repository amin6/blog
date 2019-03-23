<?php 
    if(isset($_GET['id'])) {

        global $conn;

        $id = mysqli_real_escape_string($conn,$_GET['id']);

        $query = "SELECT * FROM posts WHERE id='$id'";
        $result = mysqli_query($conn,$query);

        $post = mysqli_fetch_all($result,MYSQLI_ASSOC);

        if(!empty($post)){
            $query = "DELETE FROM posts WHERE id='$id'";
            $result = mysqli_query($conn,$query);

            echo "<h1 class='alert alert-success'>post deleted successfully</h1>";
            echo '<a href="posts.php" class="btn btn-primary">Back To Posts</a>';
        }else {
            echo "<h1 class='alert alert-danger'>post not found</h1>";
            echo '<a href="posts.php" class="btn btn-primary">Back To Posts</a>';
        }

    }
?>