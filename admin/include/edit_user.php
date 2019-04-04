<?php
    include 'db.php';
    if(isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn,$_GET['id']);

        $query = "SELECT * FROM users WHERE id='$id'";
        $result = mysqli_query($conn,$query);

        $users = mysqli_fetch_all($result,MYSQLI_ASSOC);

        if(!empty($users)){
            $username = $users[0]['username'];
            $email = $users[0]['email'];
            $user_image = $users[0]['u_image'];
            $role = $users[0]['role'];

            if(isset($_POST['submit'])){
                $username = mysqli_real_escape_string($conn,$_POST['username']);
                $email = mysqli_real_escape_string($conn,$_POST['email']);
                $role = mysqli_real_escape_string($conn,$_POST['role']);
                
                $user_image = $_FILES['image']['name'];
                $user_image_tmp = $_FILES['image']['tmp_name'];

                $password = mysqli_real_escape_string($conn,$_POST['password']);
 
                move_uploaded_file($user_image_tmp, "../images/$user_image");
                
                if(empty($user_image)) {
                    $user_image = $users[0]['u_image'];
                }

                $query = "UPDATE users SET username='$username', email='$email', u_image='$user_image', u_password='$password', role='$role' WHERE id=$id ";
                $result = mysqli_query($conn,$query);

                echo '<h3 class="alert alert-success">User successfully Edited</h3>';
            }
            
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form_group">
        <label for="">username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $username ?>">
    </div>
    <div class="form_group">
        <label for="">password</label>
        <input type="password" class="form-control"  name="password">
    </div>
    <div class="form_group">
        <label for="">email</label>
        <input type="email" class="form-control"  name="email" value="<?php echo $email ?>">
    </div>
            
    <div class="form-group">
        <label for="role">Select list:</label>
        <select name="role" id="role" class="form-control">
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>
    
    <div class="custom-file" style="margin:2rem 0">
        <img width="100" src="../images/<?php echo $user_image; ?>" alt="">
        <input  type="file" name="image">
    </div>
    
    <button class="btn btn-primary" type="submit" name="submit" style="margin-top: .8rem;">Edit User</button>

</form>


<?php
        }
    }
?>