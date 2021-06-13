<?php 
    session_start();
    if($_SESSION['level'] != 1){
        echo 'Niste administrator pa nemozete dodavati nove članke<br>';
        echo '<a href=index.php>Home</a>';
        die();
        
    } 


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Projektni zadatak - unos</title>
        
        <link rel="stylesheet" type="text/css" href="CSS/style.css"/>
        <?php include 'PHP/meta.php'?>
    </head>
    <body class="home-body">
    <?php include 'PHP/header.php'?>
        <div class="home-wrapper">
            <form enctype="multipart/form-data" action="PHP/skripta.php" method="POST" class="article-form">
                
                <div class="form-item">
                    <label for="title">Article title</label>
                    <div class="form-field">
                        <input type="text" name="title" id ="title" class="form-field-textual">
                    </div>
                    <span id ="porukaTitle"></span>
                </div>

                <div class="form-item">
                    <label for="about">Summary (up to 50 characters)</label>
                    <div class="form-field">
                        <textarea name="about" id="about" cols="30" rows="10" class="form-field-textual"></textarea>
                    </div>
                    <span id ="porukaAbout"></span>
                </div>

                <div class="form-item">
                    <label for="content">Article conent</label>
                    <div class="form-field">
                        <textarea name="content" id="content" cols="30" rows="10" class="form-field-textual"></textarea>
                    </div>
                    <span id ="porukaContent"></span>
                </div>

                <div class="form-item">
                    <label for="author">Author</label>
                    <div class="form-field">
                        <input type="text" name="author" class="form-field-textual">
                    </div>
                    
                </div>

                <div class="form-item">
                    <label for="pphoto">Image: </label>
                    <div class="form-field">
                    <input type="file" class="input-text" id="pphoto" value="" name="pphoto"/>
                    </div>
                    <span id ="porukaSlika"></span>
                </div>

                <div class="form-item">
                    <label for="category">News Category</label>
                    <div class="form-field">
                        <select name="category" id="category" class="form-field-textual">

                        <?php //Getting the cateogries from the database to print as options in dropdown

                                $sql = "SELECT c.category FROM category AS c";

                                $result = mysqli_query($dbc, $sql);

                                if($result){
                                    
                                    while($row = mysqli_fetch_array($result)){
                                        echo('<option value="'. $row['category'] . '">'. $row['category'] . '</option>');
                                    }
                                }

                            ?>
                            
                        </select>
                        <span id ="porukaKategorija"></span>
                    </div>
                </div>

                <div class="form-item">
                    <label for="archive">Archive:</label>
                        <div class="form-field">
                            <input type="checkbox" name="archive">
                        </div>
                </div>

                <div class="form-item">
                    <button type="reset" value="Poništi" id="clear">Clear</button>
                    <button type="submit" value="Prihvati" id="accept">Accept</button>
                    <i>By clicking on the accept button you will be redirected to your article</i>
                </div>

                </form>
                <script src="JS/validation.js"></script>
            </div>
            <?php include 'PHP/footer.php'?>
    </body>
</html>

<?php 
    mysqli_close($dbc);
?>