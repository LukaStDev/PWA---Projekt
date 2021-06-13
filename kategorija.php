<?php 
    require 'PHP/article_retrieval.php';
?>

<?php 
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
                <div class="separator"><h2><?php echo $_GET['naziv'] ?></h2></div>
                <div class="content-wrapper">

                <?php print_articles_with_category($_GET['naziv'], $dbc); ?>



                </div>
            </section>
        </div>
        <?php include 'PHP/footer.php'?>
    </body>
</html>

<?php 
    mysqli_close($dbc);
?>