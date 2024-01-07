<?php
class Hal {
    private $id; #id
    private $nev; #str
    private $suly; #float
    private $so; #bool
    private $kifogva; #date
    private $megrendelo; #email

    private $connection;

    public function __construct() {
        $this->connection=new mysqli ("localhost","root","","php_elso_dolgozat"); #kapcsolódás az adatbázishoz
    }

    function getAll() {
        $sql="SELECT*FROM halak";
        $result=$this->connection->query($sql);
        return $result->fetch_all(MSQLI_ASSOC);
    }

    public function __creatRow($id,$nev,$suly,$so,$kifogva,$megrendelo) {
        $this->id=$id;
        $this->nev=$nev;
        $this->suly=$suly;
        $this->so=$so;
        $this->kifogva=$kifogva;
        $this->megrendelo=$megrendelo;
    }

    public function __toString() {
        return "$this->id;$this->nev;$this->suly;$this->so;$this->kifogva;$this->megrendelo";
    }
}
?>