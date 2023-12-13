
<?php

class Region
{
    private ?int $id_region = null;
    private ?string $nom = null;
    private ?string $description = null;
    private ?string $image = null;

    public function __construct($id = null, $n, $d, $i)
    {
        $this->id_region = $id;
        $this->nom = $n;
        $this->description = $d;
        $this->image = $i;
    }

    public function getIdRegion()  
    {
        return $this->id_region;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }



}
?>


