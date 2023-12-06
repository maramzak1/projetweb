<?php
class ticket
{
    private ?int $id_ticket = null;
    private ?string $date=null;
    private ?int $prix=null;
    private ?string $date_limite=null;
    private ?int $quantite=null;
    private ?int $heure=null;
    private ?string $lieu=null;
    private ?int $concert=null;
   
   
     
    public function __construct($id = null,$d, $p, $dl , $q,$h, $l,$c  )
    {
        $this->id_ticket = $id;
        $this->date = $d;
        $this->prix = $p;
        $this->date_limite = $dl;
        $this->quantite = $q;
        $this->heure = $h;
        $this->lieu = $l;
        $this->concert = $c;
        
        
        
    }
    
    public function getId()
    {
        return $this->id_ticket;
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
    public function getprix()
    {
        return $this->prix;
    }


    public function setprix($prix)
    {
        $this->prix = $prix;

        return $this;
    }
    
    
    public function getdate_limite()
    {
        return $this->date_limite;
    }


    public function setdate_limite($date_limite)
    {
        $this->date_limite = $date_limite;

        return $this;
    }
    public function getquantite()
    {
        return $this->quantite;
    }


    public function setquantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    


   
    public function getheure()
    {
        return $this->heure;
    }


    public function setheure($heure)
    {
        $this->heure = $heure;

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
    public function getconcert()
    {
        return $this->concert;
    }


    public function setconcert($concert)
    {
        $this->concert = $concert;

        return $this;
    }


}









