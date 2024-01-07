<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halak</title>
</head>
<body>
    <div class="container">
        <?php 
            require "bootstrap.php"; #bootstrap beolvasása
            require "navigacio.php"; #navigációs menü betöltése
            require_once "Hal.php";

            session_start(); #elindul a session
            $error=[]; #hibalista
            
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
        <form method="post" action="felvetel.php">
            <div class="form-group">
                <label for="nev">Név:</label>
                <input type="text" class="form-control" id="nev" name="nev" required>
            </div>
            <div class="form-group">
                <label for="suly">Súly:</label>
                <input type="number" step="0.1" class="form-control" id="suly" name="suly" required>
            </div>
            <div class="form-group">
                <label for="so">Sósvízi? </label>
                <input type="checkbox" class="form-check-input" id="so" name="so">
                <label class="form-check-label" for="so">Igen</label>
            </div>
            <div class="form-group">
                <label for="kifogva">Kifogva:</label>
                <input type="date" class="form-control" id="kifogva" name="kifogva" required>
            </div>
            <div class="form-group">
                <label for="megrendelo">Megrendelő:</label>
                <input type="email" class="form-control" id="megrendelo" name="megrendelo" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Beküldés</button>
        </form>
        <?php #beküldendő adatok feldolgozása
            if ($_SERVER["REQUEST_METHOD"] == "POST") { #minden mező ki van e töltve?
                if (empty($_POST['nev']) || empty($_POST['suly']) || empty($_POST['kifogva']) || empty($_POST['megrendelo'])) {
                    $error[] = "Minden kötelező mezőt ki kell tölteni."; #ha nincs az hiba, lehetne pontonként is részletezni...
                }
                if (empty($error)) { #ha nincs hiba
                    $hal=new Hal(); #akkor új hal objektumot hozunk létre
                    $fishdata=[ #mint egy szótár a form és az objektum között összerakjuk az adatokat
                        'nev'=>$_POST['nev'],
                        'suly'=>$_POST['suly'],
                        'so'=>isset($_POST['so']) ? 1 : 0,
                        'kifogva'=>$_POST['kifogva'],
                        'megrendelo'=>$_POST['megrendelo'],
                    ];
                    #megpróbáljuk beküldeni
                    try {
                        $hal->__create($fishdata);
                        $_SESSION['state']='success';
                        $_SESSION['message']='A felvétel sikeres.';
                    } catch (Exception $e) { #ha nem sikerült beküldeni
                        $_SESSION['state'] = 'error';
                        $_SESSION['message'] = 'Hiba történt a felvétel során.';
                    }
                } else { #rendszerhiba ha nem indul a beküldés
                    $_SESSION['state'] = 'error';
                    $_SESSION['message'] = 'Hiba a beküldés során.';
                    $_SESSION['errors'] = $error;
                }
                header("Location: felvetel.php");
            }
        ?>
    </div>
</body>
</html>