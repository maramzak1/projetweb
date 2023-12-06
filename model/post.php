<?php 
class post {  
      
    private ?int $id = null;
    private ?string $content ;
    private ?string $date ;
    private ?string $title ;
    private ?string $image ;
   //private ?int $status;
   private  $commentaire;
                                           
    

   public function __construct($content,$date,$title,$image,$commentaire) {
    
    $this->content = $content;
    $this->date = $date;
    $this->title = $title;
    $this->image = $image;
   // $this->status = $status;
    $this->commentaire = $commentaire;
     
}

    function getId(){
        return $this->id;
    }

    function getContent(){
        return $this->content;
    }

    function getDate() {
        return $this->date;
    }

    function getTitle(){
        return $this->title;
    }

    function getImage(){
        return $this->image;
    }

    /*function getStatus(): int {
        return $this->status;
    }*/

    function setContent(string $content){
        $this->content = $content;
    }

    function setDate(string $date) {
        $this->date = $date;
    }

    function setTitle(string $title){
        $this->title = $title;
    }

    function setImage(string $image){
        $this->image = $image;
    }
    /*function setStatus(int $status): void{
        $this->status=$status;
    }*/
    
    function getCommentaire(){
        return $this->commentaire;
    }

    function setCommentId($commentaire){
        $this->commentaire = $commentaire;
         
    }
     
}
?>