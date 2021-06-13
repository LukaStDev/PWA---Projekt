<?php 
        function check_duplicate_username($dbc, $uname){
            $sql = "SELECT EXISTS(SELECT * FROM users WHERE username = ?)";

            $stmt = mysqli_stmt_init($dbc);

            if(mysqli_stmt_prepare($stmt, $sql)){
                mysqli_stmt_bind_param($stmt, 's', $uname);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
            }
            
            mysqli_stmt_bind_result($stmt, $exists);
            mysqli_stmt_fetch($stmt);
            return $exists;
        }

        function login($dbc, $uname, $upass){
            
            if(check_duplicate_username($dbc, $uname)){

                $sql = "SELECT name, username, pass, permission FROM users WHERE username = ?";
                
                $stmt = mysqli_stmt_init($dbc);
                
                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, 's', $uname);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                }

                mysqli_stmt_bind_result($stmt, $name, $user, $pass, $permission);
                mysqli_stmt_fetch($stmt);

                //Provjera lozinke
                if (password_verify($upass, $pass) && mysqli_stmt_num_rows($stmt) > 0) {
                    $uspjesnaPrijava = true;
                    
                    echo 'User uspijesno prijavljen';
                    $_SESSION['username'] = $user;
                    $_SESSION['level'] = $permission;
                    
                } else {
                    $uspjesnaPrijava = false;
                    echo 'krivi password';
                }
            }
            
        }

?>



