<?php 
class Views{
    private ?int $id;
    private ?int $member;
    private ?int $article;
    public function __construct()
    {
        
    }
    public function setId($id){
        $this->id =$id;
    }
    public function setAember($member){
        $this->member =$member;
    }
    public function setArticle($article){
        $this->article =$article;
    }
    public function getId(){
        $this->id ;
    }
    public function getAember(){
        $this->member ;
    }
    public function getArticle(){
        $this->article ;
    }
}
?>