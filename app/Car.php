<?php
namespace App;

use JsonSerializable;

class Car implements JsonSerializable
{
    private string $name;

    private string $model;

    private bool $isrentedOut;

    private float $expend;

    private int $price;

    public function __construct(string $name, string $expend, string $model, int $price, bool $status)
    {
        $this->name = $name;

        $this->model = $model;

        $this->expend = $expend;
        
        $this->price = $price;

        $this->isrentedOut = $status;

    }
    
    public function getName(): string
    {
        return $this->name;
    }

    public function getExpend(): float
    {
        return $this->expend;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getStatus(): bool {

        return $this->isrentedOut;
    }

    public function rentCar(): void {

        $this->isrentedOut = true;
    } 

    public function returnCar(): void {

        $this->isrentedOut = false;
    }

     public function jsonSerialize(): array
    {
        return 
        [
            'name' => $this->getName(),
            'model' => $this->getModel(),
            'expend' => $this->getExpend(),
            'price' => $this->getPrice(),
            'status' => $this->getStatus()
        ];
    }

}

?>