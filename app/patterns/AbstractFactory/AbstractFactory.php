<?php
/**
 * Created by PhpStorm.
 * User: maikl
 * Date: 05.10.2020
 * Time: 13:34
 */

namespace App\Patterns\AbstractFactory;

use App\BaseController;

class AbstractFactory extends BaseController
{

   public function run() {

       $ford = new FordFactory();
       $fordCar = $ford->createCar('sedan');

       echo $this->view->pre($fordCar->car);

   }

}


interface Car {
    public function setCarCase(string $carCase);
}

interface Bus {
    public function getMaxPassengers();
    public function getComfortability();
}

interface Truck {
    public function getCarrying();
}


interface TransportFactory {
    public function createCar(string $caseName): Car;
    public function createBus(): Bus;
    public function createTruck(): Truck;
}


class FordFactory implements TransportFactory
{
    public function createCar($caseName): Car {
        return new FordCar($caseName);
    }

    public function createBus(): Bus {
        return new FordBus();
    }

    public function createTruck(): Truck {
        return new FordTruck();
    }
}


/**
 * Class FordCar
 * Реализует интерфейс Car
 */
class FordCar implements Car
{
    protected $caseName;
    protected $caseTypes = array(
        'sedan' => 'Седан',
        'coupe' => 'Купе',
    );

    public $car = array();

    public function __construct($caseName) {
        $this->setCarCase($caseName);
        $this->make();
    }

    public function setCarCase($caseName) {
        $this->caseName = $caseName;
        if(isset($this->caseTypes[$caseName])) {
            $this->caseName = $this->caseTypes[$caseName];
        }
    }

    public function make() {

         $car = array(
             'name'  => 'Ford',
             'type'  => 'car',
             'case'  => $this->caseName,
             'model' => 'Focus',
         );

         $this->car = $car;
    }
}

/**
 * Class FordBus
 * Реализует интерфейс Bus
 */
class FordBus implements Bus
{
    public function getMaxPassengers()
    {
        // TODO: Implement getMaxPassengers() method.
    }

    public function getComfortability()
    {
        // TODO: Implement getComfortability() method.
    }
}

/**
 * Class FordTruck
 * Реализует интерфейс Truck
 */
class FordTruck implements Truck
{
    public function getCarrying()
    {
        // TODO: Implement getCarrying() method.
    }
}