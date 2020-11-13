<?php
/**
 * Created by PhpStorm.
 * User: maikl
 * Date: 10.11.2020
 * Time: 17:11
 */

namespace App\Patterns\Adapter;

class InitAdapter
{

    public function __construct()
    {

    }

    public function run() {
        $response = [];
        $response[] = $this->show(new Book1()); // Стандартный класс
        $response[] = $this->show(new Book2()); // Стандартный класс
        $response[] = $this->show(new BookAdapter()); // Адаптируем класс NewBook
        return $response;
    }

    protected function show(BookInterface $book) {
        $div1 = '<div>';
        $div2 = '</div>';
        $content  = $div1 . 'Наименование :' . $book->getName()   . $div2;
        $content .= $div1 . 'Автор :'        . $book->getAuthor() . $div2;
        $content .= $div1 . 'Год выпуска :'  . $book->getYear()   . $div2;
        $content .= $div1 . 'Цена :'         . $book->getPrice()  . $div2;
        return $content;
    }
}


interface BookInterface
{
    public function getName();
    public function getAuthor();
    public function getYear();

}

// Базовый класс
class BookService {

    protected $name;
    protected $author;
    protected $year;
    protected $price;

    public function getName()
    {
        return $this->name;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function getPrice()
    {
        return $this->price;
    }

}

////////////////////////////////////////////////////////////
// Стандартные классы
// (используют базовый класс BookService
// и соответствуют интерфейсу BookInterface)
///////////////////////////////////////////////////////////
class Book1 extends BookService implements BookInterface
{

    public function __construct()
    {
        $this->name   = 'Государево дело';
        $this->author = 'Оченков Иван Валерьевич';
        $this->year   = '2018';
        $this->price  = '560';
    }

}

class Book2 extends BookService implements BookInterface
{

    public function __construct()
    {
        $this->name   = 'Тайна лесной поляны';
        $this->author = 'Тобоева Майя';
        $this->year   = '2019';
        $this->price  = '458';
    }

}


////////////////////////////////////////////////////
/// Адаптер который оборачивает класс  NewBook
/// и приводит его к общему интерфейсу
///////////////////////////////////////////////////
class BookAdapter extends BookService implements BookInterface {

    public function __construct()
    {
        $book = new NewBook();

        $this->name   = $book->getBookName();
        $this->author = $book->getBookAuthor();
        $this->year   = $book->createYear();
        $this->price  = $book->getPrice();
    }

}

////////////////////////////////////////////////////
/// Нестандартный класс который надо адаптировать //
///////////////////////////////////////////////////
class NewBook
{
    private $bookName;
    private $bookAuthor;
    private $createBookYear;
    private $price;

    public function __construct()
    {
        $this->bookName   = 'Чапаев и пустота';
        $this->bookAuthor = 'Виктор Пелевин';
        $this->createBookYear   = '2005';
        $this->price  = '795';
    }

    public function getBookName()
    {
        return $this->bookName;
    }

    public function getBookAuthor()
    {
        return $this->bookAuthor;
    }

    public function createYear()
    {
        return $this->createBookYear;
    }

    public function getPrice()
    {
        return $this->price;
    }

}
