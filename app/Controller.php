<?php
namespace App;
use App\CarCollection;

class Controller
{
    public function home()
    {
        require 'view.php';        
    }

    public function rent()
    {
        $carName = $_POST['name'];
        $json = file_get_contents('app/storage/cars.json');
        $json = json_decode($json, true);
        $collection = new CarCollection($json);
        $collection->changeCarStatus($carName);
        require 'view.php';        

    }

    public function return()
    {
        $carName = $_POST['name'];
        $json = file_get_contents('app/storage/cars.json');
        $json = json_decode($json, true);
        $collection = new CarCollection($json);
        $collection->changeCarStatus($carName);
        require 'view.php';        

    }
}
?>