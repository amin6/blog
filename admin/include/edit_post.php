<?php
    include 'db.php';
    if(isset($_GET['id'])) {

        $query = "SELECT * FROM categories";
        $result = mysqli_query($conn,$query);

        $categories = mysqli_fetch_all($result,MYSQLI_ASSOC);

        $id = mysqli_real_escape_string($conn,$_GET['id']);

        $query = "SELECT * FROM posts WHERE id='$id'";
        $result = mysqli_query($conn,$query);

        $post = mysqli_fetch_all($result,MYSQLI_ASSOC);

        if(!empty($post)){
            $title = $post[0]['title'];
            $category = $post[0]['category'];
            $tags = $post[0]['tags'];
            $post_image = $post[0]['image'];
            $content = $post[0]['content'];

            if(isset($_POST['submit'])){
                $title = mysqli_real_escape_string($conn,$_POST['title']);
                $category = mysqli_real_escape_string($conn,$_POST['category']);
                $tags = mysqli_real_escape_string($conn,$_POST['tags']);
                $post_image = mysqli_real_escape_string($conn,$_FILES['image']['name']);
                $post_tmp_image = mysqli_real_escape_string($conn,$_FILES['image']['tmp_name']);
                $content = mysqli_real_escape_string($conn,$_POST['content']);
 
                move_uploaded_file($post_tmp_image, "../images/$post_image");
                
                if(empty($post_image)) {
                    $post_image = $post[0]['image'];
                }

                $query = "UPDATE posts SET title='$title', category='$category', tags='$tags', image='$post_image', content='$content' WHERE id=$id ";
                $result = mysqli_query($conn,$query);

                echo '<h3 class="alert alert-success">Post successfully Edited</h3>';
            }
            
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form_group">
        <label for="">title</label>
        <input type="text" class="form-control" name="title" value="<?php echo $title; ?>">
    </div>

    <div class="form-group" style="margin-top:1.5rem;">
        <select name="category" class="form-control">
            <?php 
                $query = "SELECT * FROM posts WHERE id='$id'";
                $result = mysqli_query($conn,$query);
        
                $post = mysqli_fetch_all($result,MYSQLI_ASSOC);
                foreach ($categories as $category) {
                    if($category['ctg_title'] === $post[0]['category']){
                        echo '<option value="'.$category['ctg_title'].'" selected>'.$category['ctg_title'].'</option>';
                    }else {
                        echo '<option value="'.$category['ctg_title'].'">'.$category['ctg_title'].'</option>';
                    }
                }
            ?>
        </select>
    </div>

    <div class="form_group">
        <label for="">tags</label>
        <input type="text" class="form-control"  name="tags" value="<?php echo $tags; ?>">
    </div>
    
    <div class="custom-file" style="margin:2rem 0">
        <img width="100" src="../images/<?php echo $post_image; ?>" alt="">
        <input  type="file" name="image">
    </div>
	
    
    <textarea name="content" id="editor" class="form-control" rows="10" style="margin-top:1.5rem"><?php echo $content; ?></textarea>
    
    <button class="btn btn-primary" type="submit" name="submit" style="margin-top: .8rem;">Edit Post</button>

</form>


<?php
        } else {
            echo '<h1 class="alert alert-danger">This Post Does Not Exist</h1>';
        }
    }
?>