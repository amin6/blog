<?php 
    
    ob_start();

    $query = "SELECT ctg_title FROM categories ORDER BY ctg_id LIMIT 3";

    $result = mysqli_query($conn,$query);

    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);
    
?>
<header>
    <nav class="navbar navbar-expand-md fixed-top">
        <a class="navbar-brand" href="index.php">
            <h1 style="font-size:32px">PHPBlog</h1>
        </a>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="">Posts</a>
            </li>
            <?php 
                foreach ($categories as $category){
            ?>
            <li class="nav-item">
                <a class="nav-link" href=""><?php echo $category['ctg_title'] ?></a>
            </li>
            <?php
                }
            ?>
            </ul>

            <form class="form-inline my-2 my-lg-0" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" id="search-input" name="search">
                <button id="navbar-btn" class="btn btn-success my-2 my-sm-0" type="submit" name="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>

            <ul class="navbar-nav my-2 my-lg-0">
                <li class="nav-item">
                    <a type="button" class="nav-link" data-toggle="modal" data-target="#myModal" href="#profile" role="tab" id="login">Login</a>
                </li>
                <li class="nav-item">
                    <a type="button" class="nav-link" data-toggle="modal" data-target="#myModal"  href="#buzz" role="tab" id="register">Register</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Modal HTML Markup -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">Login / Register</h1>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="btn-login" href="#profile" role="tab" data-toggle="tab">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="btn-register" href="#buzz" role="tab" data-toggle="tab">Register</a>
                    </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active show" id="profile">
                            <form role="form" method="POST" action="">
                                <input type="hidden" name="_token" value="">
                                <div class="form-group">
                                    <label class="control-label">E-Mail Address</label>
                                    <div>
                                        <input type="email" class="form-control input-lg" name="email" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Password</label>
                                    <div>
                                        <input type="password" class="form-control input-lg" name="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <button type="submit" class="btn btn-success btn-lg">Login</button>
                                        <a class="btn btn-link btn-lg" href="">Forgot Your Password?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="buzz">
                            <form role="form" method="POST" action="">
                                <input type="hidden" name="_token" value="">
                                <div class="form-group">
                                    <label class="control-label">Username</label>
                                    <div>
                                        <input type="text" class="form-control input-lg" name="name" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">E-Mail Address</label>
                                    <div>
                                        <input type="email" class="form-control input-lg" name="email" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Password</label>
                                    <div>
                                        <input type="password" class="form-control input-lg" name="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Confirm Password</label>
                                    <div>
                                        <input type="password" class="form-control input-lg" name="password_confirmation">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <button type="submit" class="btn btn-success btn-lg">
                                            Register
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <!--
               Tab panes 
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active show" id="login">
                        <form role="form" method="POST" action="">
                            <input type="hidden" name="_token" value="">
                            <div class="form-group">
                                <label class="control-label">E-Mail Address</label>
                                <div>
                                    <input type="email" class="form-control input-lg" name="email" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Password</label>
                                <div>
                                    <input type="password" class="form-control input-lg" name="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-success">Login</button>
        
                                    <a class="btn btn-link" href="">Forgot Your Password?</a>
                                </div>
                            </div>
                        </form>
                    </div>

                
                    <div role="tabpanel" class="tab-pane fade" id="register">
                        <form role="form" method="POST" action="">
                            <input type="hidden" name="_token" value="">
                            <div class="form-group">
                                <label class="control-label">Username</label>
                                <div>
                                    <input type="text" class="form-control input-lg" name="name" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">E-Mail Address</label>
                                <div>
                                    <input type="email" class="form-control input-lg" name="email" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Password</label>
                                <div>
                                    <input type="password" class="form-control input-lg" name="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Confirm Password</label>
                                <div>
                                    <input type="password" class="form-control input-lg" name="password_confirmation">
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-success">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            -->
                
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</header>