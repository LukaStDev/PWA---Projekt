<?php 
    session_start();
    require 'PHP/admin_func.php';
    require 'PHP/connect.php';

    if(isset($_POST['delete'])){
        delete_article($dbc, $_POST['id']);
    }

    

    if(isset($_POST['update'])){
        $picture = $_FILES['pphoto']['name'];
        $title=$_POST['title'];
        $about=$_POST['about'];
        $content=$_POST['content'];
        if(isset($_POST['archive'])){
        $archive=1;
        }else{
        $archive=0;
        }

        $target_dir = 'slike/'.$picture;
        move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
        $id=$_POST['id'];
        
        $query = "UPDATE articles SET title=?, summary=?, content=?, image_link=?, archive=? WHERE id=? ";

        $stmt_upd = mysqli_stmt_init($dbc);

        if(mysqli_stmt_prepare($stmt_upd, $query)){
                mysqli_stmt_bind_param($stmt_upd, "ssssii", $title, $about, $content, $target_dir, $archive, $id);

                mysqli_stmt_execute($stmt_upd);
                //echo'Uspijesan query';
        } else echo'Neuspijesan query ||' . mysqli_error($dbc);

        /*if(mysqli_query($dbc, $query)){
           echo 'Uspijean query'; 
        } else echo'Neuspijesan query' . mysqli_error($dbc);*/
        
    }

    mysqli_close($dbc);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Projektni zadatak</title>
        <link rel="stylesheet" type="text/css" href="CSS/style.css"/>
        <?php include 'PHP/meta.php'?>
        
    </head>
    <body class="home-body">
        <?php include 'PHP/header.php'?>
        <div class="home-wrapper">
                <h3 class="admin-title">Administration</h3>
                <div class="separator"></div>
                <h4 class="admin-title">Article editing</h4>

                <?php 
                    if(isset($_POST['edit'])){
                        print_article_edit_form($dbc, $_POST['id']);
                    }
                ?>

                <?php
                    if(isset($_SESSION['username']) & $_SESSION['level'] == 1 && !isset($_POST['edit'])){
                        $query = "SELECT id, title FROM articles";
                        $result = mysqli_query($dbc, $query);

                        while($row = mysqli_fetch_array($result)) {
                            echo    '<form action="administracija.php" method="POST">'.
                                        '<div class="form-item" id="aa-wrap">' .
                                            '<p class="admin-article">' . $row['title'] . '</p>' .
                                            '<input type="hidden" name="id" class="form-field-textual" value="'.$row['id'].'">'.
                                            '<button class="admin-control type="submit" name="delete" value="Delete">Delete</button>'.
                                            '<button class="admin-control type="submit" name="edit" value="Edit">Edit</button>' . 
                                        '</div>'.
                                    '</form>';
                        }       

                        echo '<a href="unos.php" class="add">Add new article</a>';
                    } else if($_SESSION['level'] == 0)
                        echo'You are not an administrator and so cannot add, edit or delete articles';
                ?>
        
                
            </div>
        </div>
        <?php include 'PHP/footer.php'?>
    </body>
</html>

<?php 
    mysqli_close($dbc);
?>