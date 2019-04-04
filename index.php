<?php 
    include('include/header.php');

    $msg = '';
    if(isset($_POST['submit']) && !empty($_POST['search'])) {
        $search = $_POST['search'];
        
        $query = "SELECT * FROM posts WHERE tags LIKE '%$search%' OR title LIKE '%$search%'";

    }else {
        $query = "SELECT * FROM posts ORDER BY post_date DESC";
    }
    
    $result = mysqli_query($conn,$query);
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if(empty($posts)) {
        $msg = '<h1 class="alert alert-danger">Nothing Was Found</h1>';
    }else {
        $msg = '';
    }
    
    
    mysqli_free_result($result);


	
?>
    
    <section id="blog-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                <!--
                    <section id="latest-posts">
                        <h2>Latest Posts</h2>
                        <div class="top-posts">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="post-vertical">
                                        <h3 class="post-title"><a href="">Title one</a></h3>
                                        <h4>by <a href="" class="username">user</a></h4>
                                        <img src="images/proxy.duckduckgo.com.jpeg" alt="post image" id="post-img"
                                            class="img-fluid" style="border-radius:2px">
                                        <div class="post-date">
                                            <i class="fa fa-calendar"></i> <span id="date">March 25,2019</span>
                                        </div>
                                        
                                        <p class="post-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Dignissimos doloremque nesciunt iusto? Sint neque possimus numquam ex.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="post-vertical">
                                        <h3 class="post-title"><a href="">Title one</a></h3>
                                        <h4>by <a href="" class="username">user</a></h4>
                                        <img src="images/proxy.duckduckgo.com.jpeg" alt="post image" id="post-img"
                                            class="img-fluid" style="border-radius:2px">
                                        <div class="post-date">
                                            <i class="fa fa-calendar"></i> <span id="date">March 25,2019</span>
                                        </div>
                                        
                                        <p class="post-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Dignissimos doloremque nesciunt iusto? Sint neque possimus numquam ex.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="under-posts">
                            <div class="post-horizontal">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="images/proxy.duckduckgo.com.jpeg" alt="post image" id="post-img"
                                            class="img-fluid" style="border-radius:2px">
                                    </div>
                                    <div class="col-md-8">
                                        <h3 class="post-title"><a href="">Title one</a></h3>
                                        <h4>by <a href="" class="username">user</a></h4>
                                        <div class="post-date">
                                            <i class="fa fa-calendar"></i> <span id="date">March 25,2019</span>
                                        </div>
                                        <p class="post-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Dignissimos doloremque nesciunt iusto? Sint.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="post-horizontal">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="images/proxy.duckduckgo.com.jpeg" alt="post image" id="post-img"
                                            class="img-fluid" style="border-radius:2px">
                                    </div>
                                    <div class="col-md-8">
                                        <h3 class="post-title"><a href="">Title one</a></h3>
                                        <h4>by <a href="" class="username">user</a></h4>
                                        <div class="post-date">
                                            <i class="fa fa-calendar"></i> <span id="date">March 25,2019</span>
                                        </div>
                                        <p class="post-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Dignissimos doloremque nesciunt iusto? Sint.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                -->
                    <div id="posts">
                        <?php 
                            if(!empty($msg)) {
                                echo $msg;
                            } 
                        ?>
                        <?php foreach($posts as $post): ?>
                            <div class="post-vertical">
                                <h3 class="post-title"><a href="post.php?id=<?php echo $post['id'] ?>"><?php echo $post['title'] ?></a></h3>
                                <h4>by <a href="" class="username">user</a></h4>
                                <a href="post.php?id=<?php echo $post['id'] ?>"><img src="images/<?php echo $post['image'] ?>" alt="post image" id="post-img" class="img-full"
                                    style="border-radius:2px"></a>
                                <div class="post-date">
                                    <i class="fa fa-calendar"></i> <span id="date"><?php echo substr($post['post_date'],0,-3); ?></span>
                                </div>
                                <p class="post-desc"><?php echo $post['content'] ?></p>
                                <div class="btn btn-primary">Read More ></div>
                            </div>
                        <?php endforeach; ?>

                    </div>

                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul> 
                </div>
                <?php include 'include/sidebar.php' ?>
                
    </section>

<?php include('include/footer.php') ?>