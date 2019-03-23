<?php 

    if(isset($_POST['submit'])) {
        $title = mysqli_real_escape_string($conn,$_POST['title']);
        $tags = mysqli_real_escape_string($conn,$_POST['tags']);
        
        $post_image = $_FILES['image']['name'];
        $post_image_tmp = $_FILES['image']['tmp_name'];

        $content = mysqli_real_escape_string($conn,$_POST['content']);
        
        if(empty($title) || empty($tags) || empty($content) || empty($post_image)){
            echo "<p class='alert-danger'>this field is required</p>";
        }else {
            move_uploaded_file($post_image_tmp,"../images/$post_image");
            $query = "INSERT INTO posts(title,tags,content,image) VALUES ('$title','$tags','$content','$post_image')";
            $result = mysqli_query($conn,$query);
        }
    }
?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form_group">
        <label for="">title</label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="form_group">
        <label for="">tags</label>
        <input type="text" class="form-control"  name="tags">
    </div>
    <div class="custom-file" style="margin:2rem 0">
        <label class="custom-file-label" for="inputGroupFile01">Image</label>
	    <input type="file" class="custom-file-input"  name="image">
	</div>
    
    <textarea name="content" id="" class="form-control" rows="10" style="margin-top:1.5rem"></textarea>
    
    <button class="btn btn-primary" type="submit" name="submit" style="margin-top: .8rem;">Add Post</button>

</form>

