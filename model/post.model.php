<?php 
class post
{
    private ?int $post_id= null;
    private string $title;
    private string $content;
    private string $topic;
    private string $date;
  
  

    public function __construct($id = null, $t, $c, $to,$d)
    {
        $this->post_id= $id; 
        $this->title= $t;
        $this->content= $c;
        $this->topic= $to;
        $this->date= $d;
       
    }


    public function getIdpost()
    {
        return $this->post_id;
    }


    public function gettitle()
    {
        return $this->title;
    }


    public function setcontent($content)
    {
        $this->content = $content;

        return $this;
    }


    public function gettopic()
    {
        return $this->topic;
    }


    public function settopic($topic)
    {
        $this->topic=$topic;

        return $this; 
    }


    public function getdate()
    {
        return $this->created_at;
    }


    public function setdate($date)
    {
        $this->date= $date;

        return $this;
    }

}
   