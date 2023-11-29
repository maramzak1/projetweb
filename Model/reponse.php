<?php
class reponse
{
    private ?int $idReponse = null;
 
    private $reponse = null;
    private $dateReponse = null;
    private ?int $idReclamation=null;
    
    public function __construct($idReponse , $reponse, $dateReponse,$idReclamation)
    {
        $this->idReponse = $idReponse;
        
        $this->reponse = $reponse;
        $this->dateReponse = $dateReponse;
        $this->idReclamation=$idReclamation;
       
    }
    
    public function setId($idReponse)
    {
        $this->idReponse = $idReponse;
    }
    public function getid()
    {
        return $this->idReponse;
    }
   
    public function getReponse()
    {
        return $this->reponse;
    }
    public function setReponse($reponse)
    {
        $this->reponse = $reponse;
    }
    public function getDateReponse()
    {
        return $this->dateReponse;
    }
    public function setDateReponse($dateReponse)
    {
        $this->dateReponse = $dateReponse;
    }
    public function getReclamation()
    {
        return $this->idReclamation;
    }
    public function setReclamation($idReclamation)
    {
        $this->dateReponse = $idReclamation;
    }
    
}
?>