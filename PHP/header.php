<?php
    $sql = "SELECT c.category FROM category AS c";
?>


<header>
    <h1 class="header-text">Life of a TVZ student</h1>
    <nav class="nav-bar">
        <a href="index.php">Home</a>
        <?php 
        require 'connect.php';

        $result = mysqli_query($dbc, $sql);

        if($result){
            
            while($row = mysqli_fetch_array($result)){
                echo('<a href = "kategorija.php?naziv=' . $row['category'] .'">'. $row['category'] .'');
            }
        }

        ?>

        <?php 
            if(isset($_SESSION['username'])){
                if($_SESSION['level'] == 1){
                    echo '<a href="administracija.php">Admin</a>';
                }
                echo    '<div class="login-wrapper">
                            <a href="PHP/logout.php">Logout</a>
                            <p>'. $_SESSION['username'] .'
                        </div>';
            } else echo '<div class="login-wrapper">
            <a href="login.php">Log in</a>
            <a href="registracija.php">Sign up</a>
        </div>';
        ?>

        
        
    </nav>
    
</header>

