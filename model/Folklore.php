
<?php
class Folklore
{
    private ?int $id_folklore = null;
    private ?string $nom = null;
    private ?string $histoire = null;
    private ?string $chanson = null;

   
    private ?string $banner = null;

    private $region;
    private $artiste;



    public function __construct($id = null,$n,$h,$c,$b,$r,$a)
    {
        $this->id_folklore = $id;
        $this->nom = $n;
        $this->histoire = $h;
        $this->chanson= $c;
        
        $this->banner= $b;
        $this->region= $r;
        $this->artiste= $a;

    }


    public function getIdfolklore()  
    {
        return $this->id_folklore;
    }


    public function getNom() //pour recuprer
    {
        return $this->nom;
    }


    public function setNom($nom) //pour remplir
    {
        $this->nom = $nom;

        return $this;
    }


    public function getHistoire()
    {
        return $this->histoire;
    }


    public function setHistoire($histoire)
    {
        $this->histoire = $histoire;

        return $this;
    }
    public function getChanson()
    {
        return $this->chanson;
    }


    public function setChanson($chanson)
    {
        $this->chanson = $chanson;

        return $this;
    }

    public function getRegion()
    {
        return $this->region;
    }


    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    public function getBanner()
    {
        return $this->banner;
    }


    public function setBanner($banner)
    {
        $this->banner = $banner;

        return $this;
    }

    public function getArtiste()
    {
        return $this->artiste;
    }

    public function setArtiste($artiste)
    {
        $this->artiste = $artiste;
        return $this;
    }









}
