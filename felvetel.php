<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halak</title>
</head>
<body>
    <div class="container"> <!--adatbázis betöltése + navigáció containerbe kívülről betöltve-->
        <?php 
            require "bootstrap.php"; #bootstrap beolvasása
            require "navigacio.php"; #navigációs menü betöltése

            require_once "Hal.php"; #hal osztály beolvasása
            $datebase=new Hal(); #az új adatbázis a halak osztály szerint
            $halak=$datebase->getAll(); #lekér minden adatot-
        ?>
    </div>
    
</body>
</html>