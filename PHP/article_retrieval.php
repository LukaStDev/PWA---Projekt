<?php 

    //--------------------------------------Index.php, Kategorija.php-------------------------------
    function get_articles_with_category($cat, $dbc){
        $cat_select = "SELECT a.id, a.date, a.title, a.image_link, a.archive FROM articles AS a JOIN category AS c ON a.category_id = c.id WHERE c.category = '$cat' AND a.archive = 0 ORDER BY a.date ASC LIMIT 3";
        
        $articles = mysqli_query($dbc, $cat_select);

        return $articles;
    }

    function print_articles_with_category($cat_name, $dbc){
        
        $nightlife = get_articles_with_category($cat_name, $dbc);

        while($row = mysqli_fetch_array($nightlife)){
            if($row['archive'] == 0){
                echo '<a href="clanak.php?id=' . $row['id'] .'" class="home-link"><article>';
                    echo '<img src="'. $row['image_link'] .'" alt="neka slika" class="home-article-img"/>';
                    echo '<h3>'. $row["title"] .'</h3>';
                echo '</article></a>';
            }
        }
                    
    }


    //--------------------------------Clanak.php-----------------------------------

    function get_article_by_id($id, $dbc){ //Secure against sql injections with prepared statements
        $id_select = "SELECT a.*, c.category FROM articles AS a JOIN category AS c ON a.category_id = c.id WHERE a.id = $id";

        $article = mysqli_query($dbc, $id_select);

        return $article;
    }

    function get_article_by_name($name, $dbc){
        $name_select = "SELECT a.*, c.category FROM articles AS a JOIN category AS c ON a.category_id = c.id WHERE a.title = '$name'";

        $article = mysqli_query($dbc, $name_select);

        return $article;
    }

    function print_article($db_result){
        if($row = mysqli_fetch_array($db_result)){
            echo '<p class="category">'. $row['category'] .'</p>';
            echo '<h2>'. $row['title'] .'</h2>';
            echo '<p class="description">' . $row['summary'] . '</p>';
            echo '<img class="article-img" src ="'. $row['image_link'] .'"/>';
            echo '<p class="paragraf">' . $row['content'] . '</p>';
        } else die();
    }
?>