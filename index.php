<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halak</title>
</head>
<body>
    
<?php
    require_once "bootstrap.php"; #bootstrap beolvasása
    require_once "Hal.php"; #hal osztály beolvasása
    $datebase=new Hal(); #az új adatbázis a halak osztály szerint
    $halak=$datebase->getAll(); #lekér minden adatot
?>

</body>
</html>