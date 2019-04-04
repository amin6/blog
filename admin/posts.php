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
                            Posts
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    
                    <?php
                        if(isset($_GET['source'])){
                            if($_GET['source'] === 'add_posts'){
                                include 'include/add_posts.php';
                            } elseif($_GET['source'] === 'edit_posts') {
                                include 'include/edit_post.php';
                            } elseif($_GET['source'] === 'delete_posts') {
                                include 'include/delete_post.php';
                            } else {
                                include 'include/all_posts.php';
                            }
                        }else {
                            include 'include/all_posts.php';
                        }
                    ?>
                        
                </div>

            </div>
        <script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>
        <script>ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .then( editor => {
            console.log( 'Editor was initialized', editor );
        } )
        .catch( err => {
            console.error( err.stack );
        } );</script>
        
<?php  include 'include/admin_footer.php'; ?>
