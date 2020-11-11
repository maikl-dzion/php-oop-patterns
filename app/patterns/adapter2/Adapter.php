<?php
/**
 * Created by PhpStorm.
 * User: maikl
 * Date: 09.11.2020
 * Time: 18:18
 */

namespace App\Patterns\Adapter2;

class Adapter
{

    public function run()
    {
        $jackal = new Jackal();
        $jackalAdapter = new JackalAdapter($jackal);

        $hunter = new Hunter();
        $r = [];
        $r[] = $hunter->hunt($jackalAdapter);
        $r[] = $hunter->hunt(new AfricanLion);
        $r[] = $hunter->hunt(new AsianLion);
        return $r;
    }

}


interface LionInterface
{
    public function roar();
}

class AfricanLion implements LionInterface
{
    public function roar()
    {
        $text = 'Африканский лев';
        return $text;
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