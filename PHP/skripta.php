<?php 
    require 'connect.php';

    
    if(isset($_POST["category"])){ //Unos kategorije
        $cat_unos = $_POST["category"];
    }

    if(isset($_POST["author"])){ //Unos autora
        $author = $_POST["author"];
    }
    
    if(isset($_POST["title"])){ //Unos titla
        $title = $_POST["title"];
    }
    
    if(isset($_POST["about"])){ //Unos opisa
        $summary = $_POST["about"];
    }
    
    
    $picture = 'slike/'.$_FILES['pphoto']['name'];
    $target_dir = '../'.$picture;
    move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);

    if(isset($_POST["content"])){ //Unos članka
        $content = $_POST["content"];
    }
    
    if(isset($_POST["archive"])){ //Unos članka
        $archive = 1;
    } else $archive = 0;

    

    $select_cat = "SELECT id FROM category AS c WHERE c.category = '$cat_unos'";

    $result = mysqli_query($dbc, $select_cat);

    if($result){
        if($row = mysqli_fetch_array($result)){
            $cat_fetched = $row["id"];

            $insert_article = "INSERT INTO articles (author, title, summary, content, image_link, category_id, archive) values (?, ?, ?, ?, ?, ?, ?)";
    
            $stmt_art = mysqli_stmt_init($dbc);

            if(mysqli_stmt_prepare($stmt_art, $insert_article)){
                    mysqli_stmt_bind_param($stmt_art, "sssssii",  
                                                $author, $title, $summary, $content, $picture, $cat_fetched, $archive);

                    mysqli_stmt_execute($stmt_art);
            } else error_handler("Prepared statement failed");

        } else error_handler("Category not found");

    }else error_handler("SQL query not succsessful");

    mysqli_close($dbc);

    header('Location: ../clanak.php?name='.$title);
    die();

?>


