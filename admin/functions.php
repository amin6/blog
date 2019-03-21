<?php
    ob_start();

    include 'include/db.php';

    function escape($input) {
        global $conn;
        return mysqli_real_escape_string($conn, $input);
    } 

    /* ----------------------------------*/
    /* CATEGORIES FUNCTIONS */
    /* ----------------------------------*/

    function addCategory() {
        if(isset($_POST['submit'])){

            if(empty($_POST['categ'])){
                echo "<p class='alert-danger'>this field is required</p>";
            }else {
                $categ = escape($_POST['categ']);

                global $conn;
                
                $query = "INSERT INTO categories(ctg_title) VALUES ('$categ')";
                $result = mysqli_query($conn,$query);
            }
        }
    }

    function dispayCategories() {
        global $conn;
        
        $query = "SELECT * FROM categories ORDER BY ctg_id";
        $result = mysqli_query($conn,$query);

        $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach ($categories as $category) {
            $ctg_id = $category['ctg_id'];
            $ctg_title = $category['ctg_title'];

            echo "<tr>
                <td>$ctg_id</td>
                <td>$ctg_title</td>
                <td><a style='display:block' class='btn btn-danger' href='categories.php?delete=$ctg_id'>Delete</a></td>
                <td><a style='display:block' class='btn btn-primary' href='categories.php?edit=$ctg_id'>Edit</a></td>
            </tr>";
        }
    }

    function deleteCategory() {
        global $conn;
        
        if(isset($_GET['delete'])) {

            $id = escape($_GET['delete']);

            $query = "DELETE FROM categories WHERE ctg_id='$id';";
            $result = mysqli_query($conn,$query);

            header("Location: categories.php");

        }
        
    }

    function editCategory($id) {
        global $conn;
        
        if(isset($_GET['edit'])) {
            if(isset($_POST['new_categ'])) {
                if(empty($_POST['new_categ'])) {
                    echo "<p class='alert-danger'>this field is required</p>";
                }else {
                    $title = escape($_POST['new_categ']);
                    $id = escape($id);
    
                    $query = "UPDATE categories SET ctg_title = '$title' WHERE ctg_id = '$id'";
                    $result = mysqli_query($conn,$query);

                    header("Location: categories.php");
                }
            }    
        }
        
    }

    /* ----------------------------------*/
    /* POSTS FUNCTIONS */
    /* ----------------------------------*/

    

