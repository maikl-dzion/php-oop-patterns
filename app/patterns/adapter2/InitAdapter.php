<?php
/**
 * Created by PhpStorm.
 * User: maikl
 * Date: 09.11.2020
 * Time: 18:18
 */

namespace App\Patterns\Adapter2;

class InitAdapter
{

    public function run()
    {
//        $jackal = new Jackal();
//        $jackalAdapter = new JackalAdapter($jackal);
//
//        $hunter = new Hunter();
//        $r = [];
//        $r[] = $hunter->hunt($jackalAdapter);
//        $r[] = $hunter->hunt(new AfricanLion);
//        $r[] = $hunter->hunt(new AsianLion);
//        return $r;
    }

}


interface TourInterface {
    public function name();
    public function price();
    public function tourInfo();
}

class TourService {

    protected $name;
    protected $price;
    protected $startDate;
    protected $duration;

}

class BusExcursion extends TourService implements TourInterface
{

    public function __construct()
    {
        $this->name      = 'Автобусная экскурсия по достопримечательностям города';
        $this->price     = '1500';
        $this->startDate = '12.00';
        $this->duration  = '3';
    }

    public function name()
    {
        return $this->name;
    }

    public function price()
    {
        return $this->price;
    }

    public function tourInfo()
    {
       return '
           
       ';
    }
}

class AsianLion implements LionInterface
{
    public function roar()
    {
        $text = 'Азиатский лев';
        return $text;
    }
}

class Hunter
{
    public function hunt(LionInterface $lion)
    {
        $text = 'Охотимся на : ' . $lion->roar();
        return $text;
    }
}

// Этот класс нужно добавить в игру
class Jackal
{
    public function bark()
    {
        return 'Шакал';
    }
}

// Создадим адаптер
class JackalAdapter implements LionInterface
{
    protected $dog;

    public function __construct(Jackal $dog)
    {
        $this->dog = $dog;
    }

    public function roar()
    {
        $this->dog->bark();
    }
}