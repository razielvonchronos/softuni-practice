<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/14/2018
 * Time: 15:28 PM
 */

class Articles2
{

    public $title;
    public $content;
    public $author;
    public $order;
    public $listOfArticles;

    public function __construct($title, $content, $author, $order, $listOfArticles)
    {
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->order = $order;
        $this->listOfArticles = $listOfArticles;
    }

    public function __toString()
    {
        return $this->listOfArticles;
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

    public function getOrder()
    {
        return $this->order;
    }

    public function setOrder($order): void
    {
        $this->order = $order;
    }

    public function getListOfArticles()
    {
        return $this->listOfArticles;
    }

    public function saveArticle()
    {

        $this->listOfArticles[] = array('title' => $this->getTitle(), 'content' => $this->getContent(), 'author' => $this->getAuthor());
    }

}

$n = intval(readline());

$articles2 = new Articles2(null, null, null, null, null);

for ($i = 0; $i < $n; $i++) {
    list($title, $content, $author) = explode(', ', readline());
    $articles2->setTitle($title);
    $articles2->setContent($content);
    $articles2->setAuthor($author);
    $articles2->saveArticle();
}
//set order for article list
$articles2->setOrder(readline());
//print the articles
//$articles2->showArticles();

uasort($articles2->listOfArticles, function ($a, $b)use ($articles2) {
//    if($a[$articles2->order] == $b[$articles2->order]){
//        return 0;
//    }else{
//        return $a > $b ? -1 : 1;
//    }
    return $a[$articles2->order] <=> $b[$articles2->order];
});

foreach ($articles2->getListOfArticles() as $key => $article) {
    printf("%s - %s: %s" . PHP_EOL, $article['title'], $article['content'], $article['author']);
}

//var_dump($articles2->listOfArticles);

//echo $articles2;