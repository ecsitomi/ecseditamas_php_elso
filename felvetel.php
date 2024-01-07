<?php session_start(); ?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halak</title>
</head>
<body>
    <div class="container"> <!--adatbázis betöltése + navigáció containerbe kívülről betöltve-->
        <?php 
            require "bootstrap.php"; #bootstrap beolvasása
            require "navigacio.php"; #navigációs menü betöltése
            
            #hibaüzenet a form felett, feladat szerint bs alertben, ebben minimálisat csaltam a chatgpt-vel, hogy ilyen szépen legyen leírva
            if (isset($_SESSION['state'])) {
                switch ($_SESSION['state']) {
                    case 'success':
                        echo '<div class="alert alert-success" role="alert">';
                        echo $_SESSION['message'];
                        echo '</div>';
                        break;
                    case 'error':
                        echo '<div class="alert alert-danger" role="alert">';
                        echo $_SESSION['message'];
                        echo '<ul>';
                        foreach ($_SESSION['errors'] as $error) {
                            echo "<li>$error</li>";
                        }
                        echo '</ul>';
                        echo '</div>';
                        break;
                }
                unset($_SESSION['state']);
                unset($_SESSION['message']);
                unset($_SESSION['errors']);
            }
        ?>
    </div>
    
</body>
</html>