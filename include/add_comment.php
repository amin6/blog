<?php

    $author = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $content = mysqli_real_escape_string($conn,$_POST['content']);

    $query = "INSERT INTO comments(author,email,content,post_id) VALUES ('$author','$email','$content','$id')";
    $result = mysqli_query($conn,$query);