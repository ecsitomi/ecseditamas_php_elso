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
        <!--Form az adatok feltöltéséhez, a szépségben szintén picit csaltam a chatgpt-vel-->
        <form action="feldolgozas.php" method="post">
            <div class="form-group">
                <label for="nev">Név:</label>
                <input type="text" class="form-control" id="nev" name="nev" required>
            </div>
            <div class="form-group">
                <label for="suly">Súly:</label>
                <input type="number" step="0.1" class="form-control" id="suly" name="suly" required>
            </div>
            <div class="form-group">
                <label for="so">Só:</label>
                <input type="checkbox" class="form-check-input" id="so" name="so">
                <label class="form-check-label" for="so">Sósvízi?</label>
            </div>
            <div class="form-group">
                <label for="kifogva">Kifogva:</label>
                <input type="date" class="form-control" id="kifogva" name="kifogva" required>
            </div>
            <div class="form-group">
                <label for="megrendelo">Megrendelő:</label>
                <input type="email" class="form-control" id="megrendelo" name="megrendelo" required>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
    
</body>
</html>