<?php 
    function delete_article($dbc, $id){
        $query = "DELETE FROM articles WHERE id=$id";
        $result = mysqli_query($dbc, $query);
    }

    function print_article_edit_form($dbc, $id){
        $query = "SELECT a.*, c.category, c.id AS cat_id FROM articles AS a JOIN category AS c 
            ON a.category_id = c.id
        WHERE a.id = $id";
        $result = mysqli_query($dbc, $query);

        if($row = mysqli_fetch_array($result)){


            echo '<form enctype="multipart/form-data" action="administracija.php" method="POST">
            
                <div class="form-item">
                <label for="title">Naslov vjesti:</label>
                <div class="form-field">
                <input type="text" name="title" class="form-field-textual"
                value="'.$row['title'].'">
                </div>
                </div>

                <div class="form-item">
                <label for="about">Kratki sadržaj vijesti (do 50
                znakova):</label>
                <div class="form-field">
                <textarea name="about" id="" cols="30" rows="10" class="form-
                field-textual">'.$row['summary'].'</textarea>
                </div>
                </div>
                <div class="form-item">
                <label for="content">Sadržaj vijesti:</label>
                <div class="form-field">
                <textarea name="content" id="" cols="30" rows="10" class="form-
                field-textual">'.$row['content'].'</textarea>
                </div>
                </div>

                <div class="form-item">
                <label for="pphoto">Slika:</label>
                <div class="form-field">
                <input type="file" class="input-text" id="pphoto"
                name="pphoto"/> <br><img src="'.
                $row['image_link'] . '" width=100px>
                </div>
                </div>

                <div class="form-item">
                <label for="category">Kategorija vijesti:</label>
                <div class="form-field">
                <select name="category" id="" class="form-field-textual" value="'. $row['category'] . '">

                ';
                $sql = "SELECT c.category, c.id FROM category AS c";

                $result_cat = mysqli_query($dbc, $sql);

                if($result_cat){
                    
                    while($row_cat = mysqli_fetch_array($result_cat)){
                        echo('<option ');
                        if($row_cat['id'] === $row['cat_id'])
                            echo('selected ');
                        echo('value="'. $row_cat['id'] . '">'. $row_cat['category'] . '</option>');
                    }
                }

                echo '

                </select>
                </div>
                </div>

                <div class="form-item">
                    <label>Spremiti u arhivu:
                    <div class="form-field">';
                    if($row['archive'] == 0) {
                    echo '<input type="checkbox" name="archive" id="archive"/>
                    Arhiviraj?';
                    } else {
                    echo '<input type="checkbox" name="archive" id="archive"
                    checked/> Arhiviraj?';
                    }
                    echo '
                    </label>
                    </div>
                </div>
                
                <div class="form-item">
                <input type="hidden" name="id" class="form-field-textual"
                value="'.$id.'">
                <button type="reset" value="Poništi">Clear</button>
                <button type="submit" name="cancel" value="Cancel">Poništi</button>
                <button type="submit" name="update" value="Prihvati">Izmjeni</button>
                </div>
            </form>';
        }
    }
?>