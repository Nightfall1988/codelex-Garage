<?php namespace App;
?>
<table>
<?php

class Viewbox
{
    private $car;

    public $color;

    public function __construct($car)
    {
        $this->car = $car;
    }

    public function createBox(): void
    {
        require ('template.php');
    }
}
?>

</table>