<table class="table table-bordered table-hover">
    <thead>
        <tr>
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