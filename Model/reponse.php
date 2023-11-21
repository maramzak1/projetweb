<?php
class Reponse
{
    private $id = null;
    private $Numero_reclamation = null;
    private $Reponse = null;
    private $Date_reponse = null;
    private $admin = null;
    
    public function __construct($id , $Numero_reclamation, $Reponse, $Date_reponse,$admin)
    {
        $this->id = $id;
        $this->Numero_reclamation = $Numero_reclamation;
        $this->Reponse = $Reponse;
        $this->Date_reponse = $Date_reponse;
        $this->admin = $admin;
    }
    
    public function setid($id)
    {
        $this->id = $id;
    }
    public function getid()
    {
        return $this->id;
    }
    public function getNumero_reclamation()
    {
        return $this->Numero_reclamation;
    }
    public function setNumero_reclamation($Numero_reclamation)
    {
        $this->Numero_reclamation = $Numero_reclamation;
    }
    public function getReponse()
    {
        return $this->Reponse;
    }
    public function setReponse($Reponse)
    {
        $this->Reponse = $Reponse;
    }
    public function getDate_reponse()
    {
        return $this->Date_reponse;
    }
    public function setDate_reponse($Date_reponse)
    {
        $this->Date_reponse = $Date_reponse;
    }
    public function getadmin()
    {
        return $this->admin;
    }
    public function setadmin($admin)
    {
        $this->admin = $admin;
    }
}
?>