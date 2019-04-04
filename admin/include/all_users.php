<?php 
    if(isset($_POST['submit']) && isset($_POST['user_id'])) {
        $user_id = $_POST['user_id'];

        if($_POST['apply'] === "delete") {
            foreach($user_id as $id) {
                $query = "DELETE FROM users WHERE id=$id";
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
            <th>username</th>
            <th>email</th>
            <th>image</th>
            <th>date</th>
            <th>role</th>
        </tr>
    </thead>
    <tbody>    
    <?php 
        $query = "SELECT * FROM users ORDER BY id DESC";

        $result = mysqli_query($conn,$query);
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach($users as $user) {
            $id = $user['id'];
            $username = $user['username'];
            $email = $user['email'];
            $image = $user['u_image'];
            $date = $user['created_at'];
            $role = $user['role'];
    ?>
    <tr>
        <td><input type="checkbox" id="" class="form-control checkbox" name="post_id[]" value="<?php echo $id; ?>"></td>
        <td><?php echo $id; ?></td>
        <td><?php echo $username; ?></td>
        <td><?php echo $email; ?></td>
        <td style="width: 20%;"><img src="../images/<?php echo $image; ?>" alt="image" style="width: 100%;"></td>
        <td><?php echo $date; ?></td>
        <td><?php echo $role; ?></td>
        <td><a href="users.php?source=edit_users&id=<?php echo $id; ?>" class="btn btn-primary">Edit</a></td>
        <td><a href="users.php?source=delete_users&id=<?php echo $id; ?>" class="btn btn-danger">Delete</a></td>
    </tr>
    <?php } ?>
    </tbody>
</table>
</form>
