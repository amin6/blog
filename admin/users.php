<?php
    
    include 'include/admin_header.php';
    include 'functions.php';
    include 'include/db.php';

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
                            if($_GET['source'] === 'add_users'){
                                include 'include/add_users.php';
                            } elseif($_GET['source'] === 'edit_users') {
                                include 'include/edit_user.php';
                            } elseif($_GET['source'] === 'delete_users') {
                                include 'include/delete_user.php';
                            } else {
                                include 'include/all_users.php';
                            }
                        }else {
                            include 'include/all_users.php';
                        }
                    ?>
                        
                </div>

            </div>
<?php  include 'include/admin_footer.php'; ?>
