<?php 
    if(isset($_GET['id'])) {

        global $conn;

        $id = mysqli_real_escape_string($conn,$_GET['id']);

        $query = "SELECT * FROM users WHERE id='$id'";
        $result = mysqli_query($conn,$query);

        $user = mysqli_fetch_all($result,MYSQLI_ASSOC);

        if(!empty($user)){
            $query = "DELETE FROM users WHERE id='$id'";
            $result = mysqli_query($conn,$query);

            echo "<h1 class='alert alert-success'>user deleted successfully</h1>";
            echo '<a href="users.php" class="btn btn-primary">Back To users</a>';
        }else {
            echo "<h1 class='alert alert-danger'>user not found</h1>";
            echo '<a href="users.php" class="btn btn-primary">Back To users</a>';
        }

    }
?>