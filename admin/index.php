<?php include 'include/admin_header.php'; ?>

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
                    <div class="col-md-6">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="form-group">
                                <label for="cat_input">Add category</label>
                                <input type="text" class="form-control" id="cat_input" name="categ">
                                <button class="btn btn-primary" type="submit" name="submit" style="margin-top: .8rem;">Add Category</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>category</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>5</td>
                                    <td>TECH</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>FASHION</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>SPORTS</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

<?php include 'include/admin_footer.php'; ?>
