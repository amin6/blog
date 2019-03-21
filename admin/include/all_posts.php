<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>title</th>
            <th>date</th>
            <th>tags</th>
            <th>image</th>
            <th>comments</th>
            <th>status</th>
        </tr>
    </thead>
    <tbody>    
    <?php 
        $query = "SELECT * FROM posts ORDER BY id DESC";

        $result = mysqli_query($conn,$query);
        $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach($posts as $post) {
            $id = $post['id'];
            $title = $post['title'];
            $image = $post['image'];
            $date = $post['post_date'];
            $tags = $post['tags'];
            $comments = $post['comment_count'];
            $status = $post['post_status'];
    ?>
    <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $title; ?></td>
        <td><?php echo $date; ?></td>
        <td><?php echo $tags; ?></td>
        <td style="width: 20%;"><img src="../images/<?php echo $image; ?>" alt="image" style="width: 100%;"></td>
        <td><?php echo $comments; ?></td>
        <td><?php echo $status; ?></td>
    </tr>
    <?php } ?>
    </tbody>
</table>