<?php
class Hal {
   
    private $connection;

    public function __construct() {
        $this->connection=new mysqli ("localhost","root","","php_elso_dolgozat"); #kapcsolódás az adatbázishoz
    }

    function getAll() { #adatok lekérdezése
        $sql="SELECT*FROM halak";
        $result=$this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
        
    }

    public function __create($fishdata) {
        $sql="INSERT INTO halak (nev,suly,so,kifogva,megrendelo) VALUES (?,?,?,?,?)"; #adatbázis illesztés sql kódja
        $stmt=$this->connection->prepare($sql); #sql állítás előkészítése
        #sql php közötti fordítás következik
        $nev=$fishdata['nev'];
        $suly=$fishdata['suly'];
        $so=$fishdata['so'];
        $kifogva=$fishdata['kifogva'];
        $megrendelo=$fishdata['megrendelo'];
        $stmt->bind_param("sssss",$nev,$suly,$so,$kifogva,$megrendelo); #fordított értékek stringként hozzáadva az sql utasításhoz
        $stmt->execute(); #végrehajtás
    }


}
?>