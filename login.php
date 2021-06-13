<?php 
    session_start();
    require 'PHP/connect.php';
    require 'PHP/login_func.php'; //Funkcija provjere usernama u bazi

    if(isset($_POST['username'])){
        login($dbc, $_POST['username'], $_POST['pass']);
    }
    if(isset($_SESSION['username'])){
        header("Location: index.php");
    }

    mysqli_close($dbc);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Projektni zadatak - registracija</title>
        <link rel="stylesheet" type="text/css" href="CSS/style.css"/>
        <?php include 'PHP/meta.php'?>
    </head>
    <body class="home-body">
        <?php include 'PHP/header.php'?>
        <div class="home-wrapper">
            <form enctype="multipart/form-data" action="login.php" method="POST">
                <div class="form-item">
                    <span id="porukaUsername" class="bojaPoruke"></span>
                    <label for="content">Korisničko ime:</label>
                    <div class="form-field">
                        <input type="text" name="username" id="username" class="form-field-textual">
                    </div>
                </div>

                <div class="form-item">
                    <span id="porukaPass" class="bojaPoruke"></span>
                    <label for="pphoto">Lozinka: </label>
                    <div class="form-field">
                        <input type="password" name="pass" id="pass" class="form-field-textual">
                        </div>
                </div>

                <div class="form-item">
                <button type="submit" value="Prijava"
                id="slanje">Prijava</button>
                </div>
            </form>
        <script src="JS/login_validate.js"></script>
        </div>
        <?php include 'PHP/footer.php'?>
    </body>
</html>

<?php 
mysqli_close($dbc);
?>