<?php
class HotBeverage {
    protected string $name;
    protected float $price;
    protected int $resistence;

    public function get_name(): string {
        return $this->name;
    }

    public function get_price(): float {
        return $this->price;
    }

    public function get_resistence(): int {
        return $this->resistence;
    }
}
?>