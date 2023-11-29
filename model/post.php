<?php 
class post {  
      
    private ?int $id = null;
    private ?string $content ;
    private ?string $date ;
    private ?string $title ;
    private ?string $image ;
   //private ?int $status;
   //private ?int $comment_id = null;
                                           
    

   public function __construct($content,$date,$title,$image) {
    
    $this->content = $content;
    $this->date = $date;
    $this->title = $title;
    $this->image = $image;
   // $this->status = $status;
    //$this->comment_id = $comment_id;
     
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
    
    /*function getCommentId(): int {
        return $this->comment_id;
    }

    function setCommentId(int $comment_id): void {
        $this->comment_id = $comment_id;
    }*/
     
}
?>
