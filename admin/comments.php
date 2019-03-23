<?php
    
    include 'include/admin_header.php';
    include 'functions.php';
    include 'include/db.php';

    if(isset($_GET['delete'])) {
        $id = mysqli_real_escape_string($conn,$_GET['delete']);
        $query = "DELETE FROM comments WHERE id='$id'";
        $result = mysqli_query($conn,$query);
    }

?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome
                            <small>Writer</small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Post</th>
                                <th>author</th>
                                <th>email</th>
                                <th>date</th>
                                
                            </tr>
                        </thead>
                        <tbody>    
                        <?php 
                            $query = "SELECT * FROM comments ORDER BY id DESC";

                            $result = mysqli_query($conn,$query);
                            $comments = mysqli_fetch_all($result, MYSQLI_ASSOC);

                            foreach($comments as $comment) {
                                $id = $comment['id'];
                                $post_id = $comment['post_id'];
                                $author = $comment['author'];
                                $email = $comment['email'];
                                $date = $comment['comment_date'];

                                $query = "SELECT * FROM posts WHERE id = '$post_id'";
                                $result = mysqli_query($conn,$query);

                                $post = mysqli_fetch_all($result,MYSQLI_ASSOC);
                        ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><a href="../post.php?id=<?php echo $post[0]['id']; ?>"><?php echo $post[0]['title']; ?></a></td>
                            <td><?php echo $author; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $date; ?></td>
                            <td><a href="comments.php?delete=<?php echo $id; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>