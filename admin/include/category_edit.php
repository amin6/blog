<?php 
    editCategory($_GET['edit']);
?>
<form action="" method="post">
    <div class="form-group">
        <label for="cat_input">Edit category</label>
        <input type="text" class="form-control" id="cat_input" name="new_categ">
        <button class="btn btn-primary" type="submit" style="margin-top: .8rem;">Edit Category</button>
    </div>
</form>