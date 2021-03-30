<?php
namespace App;
use App\CarCollection;

class App 
{
    public function run(): void
    {
        $this->getAllCars();
    }

    public function getAllCars(): CarCollection
    {
        $json = file_get_contents('app/storage/cars.json');
        $json = json_decode($json, true);
        $carColl = new CarCollection($json);
        return $carColl;
    }
}