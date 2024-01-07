<?php
class Hal {
    private $id; #id
    private $nev; #str
    private $suly; #float
    private $so; #bool
    private $kifogva; #date
    private $megrendelo; #email

    public function __construct($id,$nev,$suly,$so,$kifogva,$megrendelo) {
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