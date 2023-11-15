<?php
class concert
{
    private ?int $id = null;
    private string $date;
    private string $lieu;
    private string $etat;

    public function __construct($id = null, $d, $l, $e)
    {
        $this->id = $id;
        $this->date = $d;
        $this->lieu = $l;
        $this->etat = $e;
    }
    public function getId()
    {
        return $this->id;
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



}
