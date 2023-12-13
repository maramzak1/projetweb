 <?php 
 class Commentaire 
{
    private ?int $comment_id = null;
    private string $comment_text;
    private string $author;
    private   $post;
    private string $created_at;

    public function __construct($id = null, $t, $a, $d,$post)
    {
        $this->comment_id = $id; 
        $this->comment_text = $t;
        $this->author = $a;
        $this->post = $post;
        $this->created_at = $d;
    }

    public function getIdComment()
    {
        return $this->comment_id;
    }

    public function getCommentText()
    {
        return $this->comment_text;
    }

    public function setCommentText($comment_text)
    {
        $this->comment_text = $comment_text;
        return $this;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
        return $this; 
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
        return $this;
    }
    function getPost() {
        return $this->post;
    }

    function setPost($post) {
        $this->post= $post;
    }
}
