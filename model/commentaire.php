<?php 
class commentaire 
{
    private ?int $comment_id= null;
    private string $comment_text;
    private string $author;
    private string $created_at;
  

    public function __construct($id = null, $t, $a, $d)
    {
        $this->comment_id= $id; 
        $this->comment_text= $t;
        $this->author= $a;
        $this->created_at= $d;
       
    }


    public function getIdcomment()
    {
        return $this->comment_id;
    }


    public function getComment_text()
    {
        return $this->comment_text;
    }


    public function setComment_text($comment_text)
    {
        $this->comment_text = $comment_text;

        return $this;
    }


    public function getAuthor()
    {
        return $this->author;
    }


    public function setAuthor($Author)
    {
        $this->author=$author;

        return $this; 
    }


    public function getCreated_at()
    {
        return $this->created_at;
    }


    public function setCreated_at($created_at)
    {
        $this->created_at= $created_at;

        return $this;
    }

}
   