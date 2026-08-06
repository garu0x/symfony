<?php
class Text {
    public array $arr;

    public function __construct(array $arr) {
        $this->arr = $arr;
    }
    
    public function append(string | array $str) {
        if (empty($this->arr))
            $this->arr = [$str];
        else 
            array_push($this->arr, $str);
    }

    public function readData() {
        $html = "";
        for ($i = 0; $i < count($this->arr); $i++) {
            $html .=<<<HTML
            <p>{$this->arr[$i]}</p>
            HTML;
        }
        return $html;
    }
}
?>