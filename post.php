<?php 

  include('include/header.php');

  

  if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn,$_GET['id']);

    $query = "SELECT * FROM posts WHERE id='$id'";
    $result = mysqli_query($conn,$query);

    $post = mysqli_fetch_all($result,MYSQLI_ASSOC);

    if(!empty($post)){
      $title = $post[0]['title'];
      $tags = $post[0]['tags'];
      $date = substr($post[0]['post_date'],0,-3);
      $post_image = $post[0]['image'];
      $content = $post[0]['content'];

      $query = "SELECT * FROM comments WHERE post_id='$id'";
      $result = mysqli_query($conn,$query);

      $comments = mysqli_fetch_all($result,MYSQLI_ASSOC);

      
      if(isset($_POST['comment_submit'])) {
        include 'include/add_comment.php';
      }
?>
    

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8" style="margin-top: 8rem;">

        <!-- Title -->
        <h1 class="mt-4" style="color:#007bff;font-size:3rem;"><?php echo $title; ?></h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="#">User</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on January <?php echo $date; ?></p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="images/<?php echo $post_image; ?>" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead" style="font-size:2rem;"><?php echo $content; ?></p>

        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form action="post.php?id=<?php echo $id; ?>" method="post">  
              <div class="form-group">
                <label for="">name</label>
                <input class="form-control" type="text" name="name">
              </div>
              <div class="form-group">
                <label for="">email</label>
                <input class="form-control" type="teemailxt" name="email">
              </div>
              <textarea name="content" id="" class="form-control" rows="10" style="margin-top:1.5rem"></textarea>
              <button type="submit" name="comment_submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>

        <!-- Comments -->
            <?php 
              if(!empty($comments)) {
                foreach($comments as $comment) { 
            ?>
              <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                  <h5 class="mt-0"><?php echo $comment['author']; ?></h5>
                  <?php echo $comment['content']; ?>
                </div>
              </div>
            <?php 
                }
              } else {
                echo "<h3 class='alert'>there is not comments for this post</h3>";
              } 
            ?>

          </div>
          <!-- Sidebar Widgets Column -->
          <?php include 'include/sidebar.php' ?>
        </div>

      </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php include 'include/footer.php'; ?>

<?php
  }
}

?>
