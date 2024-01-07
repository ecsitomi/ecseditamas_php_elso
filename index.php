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

            require_once "Hal.php"; #hal osztály beolvasása
            $datebase=new Hal(); #az új adatbázis a halak osztály szerint
            $halak=$datebase->getAll(); #lekér minden adatot 
        ?>
    </div>
    <div class="container mt-3"> <!--zebra táblázat a listázáshoz-->          
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Név</th>
                    <th>Súly</th>
                    <th>Sós vízi?</th>
                    <th>Kifogva</th>
                    <th>Megrendelő</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($halak as $hal): ?> <!--halak lista külön halakra bontásba foreachben-->
                    <tr>
                        <td><?php echo $hal['id']?></td>
                        <td><?php echo $hal['nev']?></td>
                        <td><?php echo $hal['suly']?></td>
                        <td><?php echo $hal['so']?></td>
                        <td><?php echo $hal['kifogva']?></td>
                        <td><?php echo $hal['megrendelo']?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</div>

</body>
</html>