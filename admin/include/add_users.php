<?php 

    if(isset($_POST['submit'])) {
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $role = mysqli_real_escape_string($conn,$_POST['role']);
        
        $user_image = $_FILES['image']['name'];
        $user_image_tmp = $_FILES['image']['tmp_name'];

        $password = mysqli_real_escape_string($conn,$_POST['password']);
        
        if(empty($username) || empty($email) || empty($password) || empty($user_image)){
            echo "<p class='alert-danger'>All fields are required</p>";
        }else {
            move_uploaded_file($user_image_tmp,"../images/$user_image");
            $query = "INSERT INTO users(username,email,u_password,u_image,role) VALUES ('$username','$email','$password','$user_image','$role')";
            $result = mysqli_query($conn,$query);
        }
    }
?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form_group">
        <label for="">username</label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="form_group">
        <label for="">password</label>
        <input type="password" class="form-control"  name="password">
    </div>
    <div class="form_group">
        <label for="">email</label>
        <input type="email" class="form-control"  name="email">
    </div>
    
    <label for="role">Select list:</label>
    <select name="role" id="role" class="form-control">
        <option value="admin">Admin</option>
        <option value="subscriber">Subscriber</option>
    </select>
    
    
    <div class="custom-file" style="margin:2rem 0">
        <label class="custom-file-label" for="inputGroupFile01">Image</label>
	    <input type="file" class="custom-file-input"  name="image">
	</div>
    
    
    
    <button class="btn btn-primary" type="submit" name="submit" style="margin-top: .8rem;">Add User</button>

</form>

