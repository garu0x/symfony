<?php
require_once("HotBeverage.php");

class Coffee extends HotBeverage {
    private string $description;
    private string $comment;

    public function __construct() {
        $this->name = "coffee";
        $this->price = 2.00;
        $this->resistence = 3;
        $this->description = "Nice coffee";
        $this->comment = "Not that nice actually";
    }

    public function get_description(): string {
        return $this->description;
    }

    public function get_comment(): string {
        return $this->comment;
    }
}
?>