<?php
require_once("HotBeverage.php");

class Tea extends HotBeverage {
    private string $description;
    private string $comment;

    public function __construct() {
        $this->name = "tea";
        $this->price = 1.00;
        $this->resistence = 1;
        $this->description = "Nice tea";
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