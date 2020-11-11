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
        $response[] = $this->show(new Book1());
        $response[] = $this->show(new Book2());
        return $response;
    }

    protected function show(BookInterface $book) {
        $div1 = '<div>';
        $div2 = '</div>';
        $content  = $div1 . 'Наименование :' . $book->getName() . $div2;
        $content .= $div1 . 'Автор :' . $book->getAuthor() . $div2;
        $content .= $div1 . 'Год выпуска :' . $book->getYear() . $div2;
        $content .= $div1 . 'Цена :' . $book->getPrice() . $div2;
        return $content;
    }
}


interface BookInterface
{
    public function getName();
    public function getAuthor();
    public function getYear();

}

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

/**
 * E-book has an other interface
 */
// class Kindle
//{
//    // do the same as open() in real book
//    public function turnOn()
//    {
//        return "Turn on the Kindle..\n";
//    }
//
//    // do the same as turnPage() in  real book
//    public function pressNextButton()
//    {
//        return "Press next button on Kindle..\n";
//    }
//}
//
//class KindleAdapter implements BookInterface
//{
//    protected $kindle;
//
//    // injecting
//    public function __construct(Kindle $kindle)
//    {
//        $this->kindle = $kindle;
//    }
//
//    public function open()
//    {
//        return $this->kindle->turnOn();
//    }
//
//    public function turnPage()
//    {
//        return $this->kindle->pressNextButton();
//    }
//}