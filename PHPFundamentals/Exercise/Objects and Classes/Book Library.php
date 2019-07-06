<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/14/2018
 * Time: 03:49 AM
 */

class Book
{

    public $title;
    public $author;
    public $publisher;
    public $date;
    public $ISBN;
    public $price;

    public function __construct($title = null, $author = null, $publisher = null, $date = null, $ISBN = null, $price = null)
    {
        $this->title = $title;
        $this->author = $author;
        $this->publisher = $publisher;
        $this->date = $date;
        $this->ISBN = intval($ISBN);
        $this->price = floatval($price);
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author): void
    {
        $this->author = $author;
    }

    public function getPublisher()
    {
        return $this->publisher;
    }

    public function setPublisher($publisher): void
    {
        $this->publisher = $publisher;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date): void
    {
        $this->date = $date;
    }

    public function getISBN()
    {
        return $this->ISBN;
    }

    public function setISBN($ISBN): void
    {
        $this->ISBN = intval($ISBN);
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price): void
    {
        $this->price = floatval($price);
    }

    public function getBook()
    {
        return array($this->title, $this->author, $this->publisher, $this->date, $this->ISBN, $this->price);
    }


}


$book = new Book();

class Library
{
    public $name;
    public $listOfBooks;

    public function __construct($name = null, $listOfBooks = array())
    {
        $this->name = $name;
        $this->listOfBooks = $listOfBooks;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getListOfBooks()
    {
        return $this->listOfBooks;
    }

    public function setListOfBooks($listOfBooks): void
    {
        $this->listOfBooks = $listOfBooks;
    }

    public function addBook(array $book): void
    {
        $this->listOfBooks[$this->name][] = $book;
    }

    public function calculateProfit(array $books): float
    {
        $profit = 0.00;
        foreach ($books as $key => $data) {
            $profit += $data[5];
        }
        return $profit;
//        var_dump($books);
    }


    public function getBooks()
    {
        asort($this->listOfBooks);
        uasort($this->listOfBooks, function ($a, $b) {
            $profit_a = $this->calculateProfit($a);
            $profit_b = $this->calculateProfit($b);
            if ($profit_a == $profit_b) {
                return 0;
            }else{
                return $profit_a >  $profit_b ? -1 : 1 ;
            }

        });
        foreach ($this->getListOfBooks() as $author => $books) {
            printf('%s -> %.02f' . PHP_EOL, $author, $this->calculateProfit($books));
        }
    }


}

$library = new Library();
$rows = intval(readline());

for ($i = 0; $i < $rows; $i++) {
    list($title, $author, $publisher, $date, $ISBN, $price) = explode(' ', readline());

    $book->setTitle($title);
    $book->setAuthor($author);
    $book->setPublisher($publisher);
    $book->setDate($date);
    $book->setISBN($ISBN);
    $book->setPrice($price);

    $library->setName($book->getAuthor());
    $library->addBook($book->getBook());
//    var_dump($book->getBook());
}

//
//var_dump($library->listOfBooks);

$library->GetBooks();