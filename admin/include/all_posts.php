<?php 
    if(isset($_POST['submit']) && isset($_POST['post_id'])) {
        $post_id = $_POST['post_id'];

        if($_POST['apply'] === "delete") {
            foreach($post_id as $id) {
                $query = "DELETE FROM posts WHERE id=$id";
                $result = mysqli_query($conn,$query);
            }
        }
    }
?>
<form action="" method="post">
    <div class="col-md-5">
        <div class="form-group">
            <select name="apply" id="" class="form-control">
                <option value=""></option>
                <option value="delete">Delete</option>
            </select>
        </div>
    </div>  
    <div class="col-md-5">
        <button class="btn btn-success" type="submit" name="submit">Apply</button>
    </div>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th><input type="checkbox" class="form-control checkAll" id=""></th>
            <th>ID</th>
            <th>title</th>
            <th>category</th>
            <th>date</th>
            <th>tags</th>
            <th>image</th>
            <th>comments</th>
            <th>status</th>
        </tr>
    </thead>
    <tbody>    
    <?php 
        $query = "SELECT * FROM posts ORDER BY id DESC";

        $result = mysqli_query($conn,$query);
        $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach($posts as $post) {
            $id = $post['id'];
            $title = $post['title'];
            $category = $post['category'];
            $image = $post['image'];
            $date = $post['post_date'];
            $tags = $post['tags'];
            $comments = $post['comment_count'];
            $status = $post['post_status'];
    ?>
    <tr>
        <td><input type="checkbox" id="" class="form-control checkbox" name="post_id[]" value="<?php echo $id; ?>"></td>
        <td><?php echo $id; ?></td>
        <td><a href="../post.php?id=<?php echo $id; ?>"><?php echo $title; ?></a></td>
        <td><?php echo $category; ?></td>
        <td><?php echo $date; ?></td>
        <td><?php echo $tags; ?></td>
        <td style="width: 20%;"><img src="../images/<?php echo $image; ?>" alt="image" style="width: 100%;"></td>
        <td><?php echo $comments; ?></td>
        <td><?php echo $status; ?></td>
        <td><a href="posts.php?source=edit_posts&id=<?php echo $id; ?>" class="btn btn-primary">Edit</a></td>
        <td><a onclick="return confirm('are you sure');" href="posts.php?source=delete_posts&id=<?php echo $id; ?>" class="btn btn-danger">Delete</a></td>
    </tr>
    <?php } ?>
    </tbody>
</table>
</form>