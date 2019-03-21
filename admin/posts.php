<?php 

    include 'functions.php';
    include 'include/admin_header.php';

?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome
                            <small>Writer</small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    
                    <?php
                        if(isset($_GET['source'])){
                            if($_GET['source'] === 'add_posts'){
                                include 'include/add_posts.php';
                            }else {
                                include 'include/all_posts.php';
                            }
                        }
                    ?>
                        
                </div>

            </div>
<?php  include 'include/admin_footer.php'; ?>
