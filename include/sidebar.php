<div class="col-md-4" style="margin-top: 10rem;">
    <div class="most-popular">
        <h2>Most Popular</h2>
        <div class="post-horizontal">
            <div class="row">
                <div class="col-md-4">
                    <img src="images/proxy.duckduckgo.com.jpeg" alt="post image" id="post-img" class="img-fluid" style="border-radius:2px">
                </div>
                <div class="col-md-8">
                    <h3 class="post-title"><a href="">Title one</a></h3>
                    <div class="row">
                        <div class="col-md-6">
                            <h4>by <a href="" class="username">user</a></h4>
                        </div>  
                        <div class="col-md-6">
                            <div class="post-date">
                                <i class="fa fa-calendar"></i> <span id="date">March 25,2019</span>
                            </div>
                        </div>
                    </div>
                    <p class="post-desc">Lorem ipsum dolor sit amet ipsum dolor sit...</p>
                </div>
            </div>
        </div>

        <div class="post-horizontal">
            <div class="row">
                <div class="col-md-4">
                    <img src="images/proxy.duckduckgo.com.jpeg" alt="post image" id="post-img" class="img-fluid" style="border-radius:2px">
                </div>
                <div class="col-md-8">
                    <h3 class="post-title"><a href="">Title one</a></h3>
                    <div class="row">
                        <div class="col-md-6">
                            <h4>by <a href="" class="username">user</a></h4>
                        </div>  
                        <div class="col-md-6">
                            <div class="post-date">
                                <i class="fa fa-calendar"></i> <span id="date">March 25,2019</span>
                            </div>
                        </div>
                    </div>
                    <p class="post-desc">Lorem ipsum dolor sit amet ipsum dolor sit...</p>
                </div>
            </div>
        </div>

        <div class="post-horizontal">
            <div class="row">
                <div class="col-md-4">
                    <img src="images/proxy.duckduckgo.com.jpeg" alt="post image" id="post-img" class="img-fluid" style="border-radius:2px">
                </div>
                <div class="col-md-8">
                    <h3 class="post-title"><a href="">Title one</a></h3>
                    <div class="row">
                        <div class="col-md-6">
                            <h4>by <a href="" class="username">user</a></h4>
                        </div>  
                        <div class="col-md-6">
                            <div class="post-date">
                                <i class="fa fa-calendar"></i> <span id="date">March 25,2019</span>
                            </div>
                        </div>
                    </div>
                    <p class="post-desc">Lorem ipsum dolor sit amet ipsum dolor sit...</p>
                </div>
            </div>
        </div>
    </div>

    <div class="categories">
        <h2>Categories</h2>
        <ul>
        <?php 
            foreach($categories as $categ) {
                echo '<li><a href="" class="btn btn-primary"><h3>' . $categ['ctg_title'] . '</h3></a></li>';
            } 
        ?>
        <!--
            <li>
                <a href="" class="btn btn-primary">
                    <h3>Sports</h3>
                </a>
            </li>
            <li>
                <a href="" class="btn btn-primary">
                    <h3>Tech</h3>
                </a>
            </li>
            <li>
                <a href="" class="btn btn-primary">
                    <h3>Fashion</h3>
                </a>
            </li>
        -->
        </ul>
    </div>
</div>
</div>
</div>