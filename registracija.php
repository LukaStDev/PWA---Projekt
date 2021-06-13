<?php 
    

    require 'PHP/connect.php';
    require 'PHP/login_func.php'; //Funkcija provjere usernama u bazi
    if(isset($_POST['username'])){
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $username = $_POST['username'];
        $lozinka = $_POST['pass'];
        $hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
        $razina = 0;

        if(check_duplicate_username($dbc, $username) == 0){
        
            $sql = "INSERT INTO users (name, surname ,username, pass, permission)VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($dbc);
            
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username,
                $hashed_password, $razina);
                mysqli_stmt_execute($stmt);
                $registriranKorisnik = true;
            }
        }  else $msg = "To korisnicko ime već postoji, molim unesite drugo"; 
        
        mysqli_close($dbc);
    }
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
            <?php 
                if(isset($registriranKorisnik)){
                    if($registriranKorisnik)
                        header("Location: login.php?registriran=true");
                }
            ?>
            <form enctype="multipart/form-data" action="registracija.php" method="POST">

                <div class="form-item">
                    <span id="porukaIme" class="bojaPoruke"></span>
                    <label for="title">Ime: </label>
                    <div class="form-field">
                        <input type="text" name="ime" id="ime" class="form-field-textual">
                    </div>
                </div>

                <div class="form-item">
                    <span id="porukaPrezime" class="bojaPoruke"></span>
                    <label for="about">Prezime: </label>
                    <div class="form-field">
                        <input type="text" name="prezime" id="prezime" class="form-field-textual">
                    </div>
                </div>

                <div class="form-item">
                    <span id="porukaUsername" class="bojaPoruke"></span>
                    <label for="content">Korisničko ime:</label>
                    <!-- Ispis poruke nakon provjere korisničkog imena u bazi -->
                    <?php if(isset($msg)) echo '<br><span class="bojaPoruke">'.$msg.'</span>'; ?>
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
                    <span id="porukaPassRep" class="bojaPoruke"></span>
                    <label for="pphoto">Ponovite lozinku: </label>
                    <div class="form-field">
                        <input type="password" name="passRep" id="passRep" class="form-field-textual">
                    </div>
                </div>

                <div class="form-item">
                <button type="submit" value="Prijava"
                id="slanje">Prijava</button>
                </div>
            </form>
            <script src="JS/register_validate.js"></script>
        </div>
        <?php include 'PHP/footer.php'?>
    </body>
</html>

<?php 
mysqli_close($dbc);
?>