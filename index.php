<?php /*
    function get_articles_with_category($cat, $dbc){
        $cat_select = "SELECT a.id, a.title, a.image_link FROM articles AS a JOIN category AS c ON a.category_id = c.id WHERE c.category = '$cat'";
        
        $articles = mysqli_query($dbc, $cat_select);

        return $articles;
    }

    function print_articles_with_category($cat_name, $dbc){
        
        $nightlife = get_articles_with_category($cat_name, $dbc);

        while($row = mysqli_fetch_array($nightlife)){
            echo '<a href="clanak.php?id=' . $row['id'] .'" class="home-link"><article>';
                echo '<img src="'. $row['image_link'] .'" alt="neka slika" class="home-article-img"/>';
                echo '<h3>'. $row["title"] .'</h3>';
            echo '</article></a>';
        }
                    
    }*/

    require 'PHP/article_retrieval.php';
    session_start();
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
            <section class ="nightlife">
                <div class="separator"><h2>Nightlife</h2></div>
                <div class="content-wrapper">

                    <?php print_articles_with_category("Nightlife", $dbc); ?>
                    

                    

                    <!--<a href="clanak.php" class="home-link"><article>    Testing articles used in the beginning
                        <img src="slike/placeholder.jpg" alt="neka slika" class="home-article-img"/>
                        <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                    </article></a>
                    <a href="#" class="home-link"><article>
                        <img src="slike/placeholder.jpg" alt="neka slika" class="home-article-img"/>
                        <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                    </article></a>
                    <a href="#" class="home-link"><article>
                        <img src="slike/placeholder.jpg" alt="neka slika" class="home-article-img"/>
                        <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                    </article></a>-->
                </div>
            </section>
            <section class ="Poslovi-u-struci">
                <div class="separator"><h2>IT work</h2></div>
                <div class="content-wrapper">

                    <?php print_articles_with_category("IT work", $dbc); ?>
                    

                    <!--<a href="#" class="home-link"><article>       Testing articles used in the beginning
                        <img src="slike/placeholder3.jpg" alt="neka slika" class="home-article-img"/>
                        <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                    </article></a>
                    <a href="#" class="home-link"><article>
                        <img src="slike/placeholder3.jpg" alt="neka slika" class="home-article-img"/>
                        <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                    </article></a>
                    <a href="#" class="home-link"><article>
                        <img src="slike/placeholder3.jpg" alt="neka slika" class="home-article-img"/>
                        <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                    </article></a>-->
                </div>
            </section>
            
        </div>
        <?php include 'PHP/footer.php'?>
    </body>
</html>

<?php 
    mysqli_close($dbc);
?>