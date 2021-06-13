<?php 
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

<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <title>Projektni zadatak - clanak</title>
        <link rel="stylesheet" type="text/css" href="CSS/style.css"/>
        <?php include 'PHP/meta.php'?>
    </head>
    <body class="article-color">
        <?php include 'PHP/header.php'?>

        <section class="article-wrapper">
            <article>

                <?php 
                    if(isset($_GET['id'])){
                        print_article(get_article_by_id($_GET['id'], $dbc));
                    } elseif(isset($_GET['name'])){
                        print_article(get_article_by_name($_GET['name'], $dbc));
                    }
                ?>


                <!--
                <p class="category">Menze</p>
                <h2>Lorem Ipsum Sid Dolor Amet</h2>
                <p class="description">
                    Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...
                    There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...
                </p>
                <img class="article-img" src ="slike/placeholder.jpg"/>
                <p class="img-desc">Ovo opisuje placeholder sliku koju sam nasao na internetu</p>
                <p class="paragraf">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
                <p class="paragraf">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
                <p class="paragraf">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
                <p class="paragraf">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
                <p class="paragraf">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
                <p class="paragraf">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
                <p class="paragraf">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>-->
            </article>
        </section>
        <?php include 'PHP/footer.php'?>
    </body>

</html>

<?php 
    mysqli_close($dbc);
?>