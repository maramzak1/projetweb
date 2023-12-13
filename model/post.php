<?php 
class post {  
    private ?int $id;
    private ?string $title;
    private ?string $content;
    private ?string $date;
    private ?string $image;
    
    public function __construct(?int $id, ?string $title, ?string $content, ?string $date, ?string $image) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->date = $date;
        $this->image = $image;
    }

    function getId(){
        return $this->id;
    }
    function getTitle(){
        return $this->title;
    }

    function getContent(){
        return $this->content;
    }

    function getDate() {
        return $this->date;
    }

     
    function getImage(){
        return $this->image;
    }

   /* function getStatus(): int {
        return $this->status;
    }*/
    function setTitle(string $title){
        $this->title = $title;
    }

    function setContent(string $content){
        $this->content = $content;
    }

    function setDate(string $date) {
        $this->date = $date;
    }

    

    function setImage(string $image){
        $this->image = $image;
    }
    /*function setStatus(int $status): void{
        $this->status=$status;
    }*/
    
  
}
?>