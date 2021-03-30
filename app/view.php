
<?php
use App\App;
use App\Viewbox;
$app = new App;
$app->run();
$collection = $app->getAllCars();
$car_array = $collection->getCars();
foreach ($car_array as $car)
{
    $product = new Viewbox($car);

    if ($car->getStatus() == true) {
        $product->color = 'red';
    } else {
        $product->color = 'green';
    }
    echo $product->createBox();
}
?>