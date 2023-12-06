<?php
class concert
{
    private ?int $id_concert = null;
    private ?string $date=null;
    private ?string $lieu=null;
    private ?string $etat=null;
    private ?string $image=null;


    public function __construct($id = null, $d, $l, $e,$i)
    {
        $this->id_concert = $id;
        $this->date = $d;
        $this->lieu = $l;
        $this->etat = $e;
        $this->image = $i;
    }
    public function getId()
    {
        return $this->id_concert;
    }


    public function getdate()
    {
        return $this->date;
    }


    public function setdate($date)
    {
        $this->date = $date;

        return $this;
    }


    public function getlieu()
    {
        return $this->lieu;
    }


    public function setlieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }


    public function getEtat()
    {
        return $this->etat;
    }


    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }
    public function getimage()
    {
        return $this->image;
    }


    public function setimage($image)
    {
        $this->image = $image;

        return $this;
    }



}









