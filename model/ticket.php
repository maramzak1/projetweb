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
    private $concert;
    private ?string $image=null;
    private ?int $quantite_ticket=null;
   
   
     
    public function __construct($id = null,$d, $p, $dl , $q,$h, $l,$c,$i,$qt )
    {
        $this->id_ticket = $id;
        $this->date = $d;
        $this->prix = $p;
        $this->date_limite = $dl;
        $this->quantite = $q;
        $this->heure = $h;
        $this->lieu = $l;
        $this->concert = $c;
        $this->image = $i;
        $this->quantite_ticket = $qt;
        
        
        
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
    public function getimage()
    {
        return $this->image;
    }


    public function setimage($image)
    {
        $this->image = $image;

        return $this;
    }
    public function getquantite_ticket()
    {
        return $this->quantite_ticket;
    }


    public function setquantite_ticket($quantite_ticket)
    {
        $this->quantite_ticket = $quantite_ticket;

        return $this;
    }

}









