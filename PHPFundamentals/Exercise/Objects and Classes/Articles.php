<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/14/2018
 * Time: 15:28 PM
 */

class Articles{

    public $title;
    public $content;
    public $author;

    public function __construct($title, $content, $author)
    {
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->getTitle().' - '.$this->getContent().': '.$this->getAuthor();
    }


    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content): void
    {
        $this->content = $content;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author): void
    {
        $this->author = $author;
    }

    public function rename(string $name){
        $this->setTitle($name);
    }

    public function edit(string $content){
        $this->setContent($content);
    }

    public function changeAuthor(string $author){
        $this->setAuthor($author);
    }

//    public function showArticle(){
//        printf('%s - %s: %s', $this->getTitle(), $this->getContent(), $this->getAuthor());
//    }

}

list($title, $content, $author) = explode(', ', readline());
$n = intval(readline());

$article = new Articles($title, $content, $author);

for ($i = 0; $i < $n; $i++){
    list($cmd, $content) = explode(': ', readline());
    if($cmd == 'Edit'){
        $article->edit($content);
    }elseif($cmd == 'ChangeAuthor'){
        $article->changeAuthor($content);
    }elseif($cmd == 'Rename'){
        $article->rename($content);
    }
}

//$article->showArticle();

print $article;