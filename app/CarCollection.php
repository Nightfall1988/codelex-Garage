<?php
namespace App;

use App\Car;
use JsonSerializable;

class CarCollection
{
    private array $carList;

    public function __construct(array $jsonList)
    {   
        foreach ($jsonList as $car => $att) {
            $name = $jsonList[$car]['name'];
            $expend = $jsonList[$car]['expend'];
            $model = $jsonList[$car]['model'];
            $price = intval($jsonList[$car]['price']);
            $status = $jsonList[$car]['status'];
            $this->carList[] = new Car($name, $expend,$model,$price,$status);        
        }
    }

    public function getCars(): array 
    {
        return $this->carList;
    }

    public function findCarByName(string $carName): Car
    {
        foreach($this->carList as $car) {
            if ($car->getName() == $carName) {
                return $car;
            }
        }
    }

    public function changeCarStatus(string $carName): void {
        $car = $this->findCarByName($carName);
        $index = array_search($car, $this->carList);
        if ($this->carList[$index]->getStatus() == false) {
            $this->carList[$index]->rentCar();
        } else {
            $this->carList[$index]->returnCar();
        }
        $list = [];
        $fp = fopen('app/storage/cars.json', 'w');
        foreach ($this->carList as $car) {
            $list[] = $car->jsonSerialize();
        }        
        foreach ($list as $car) {
            file_put_contents('app/storage/cars.json', json_encode($list));
        }
        fclose($fp);
    }
}
?>