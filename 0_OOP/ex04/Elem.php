<?php
require("MyException.php");
class Elem {
    public string $element;
    public string $content;
    public array $children = [];
    public array $attributes = [];
    public function __construct(string $element, string $content = "", array $attributes = []) {
        if (!in_array($element, ["meta", "img", "hr", "br", "html", "head", "body", "title", "h1", "h2", "h3", "h4", "h5", "h6", "p", "span", "div",  "table", "tr", "th", "td", "ul", "ol", "li"]))
            throw new MyException("Invalid HTML tag: $element", 1);
        $this->element = $element;
        $this->content = $content;
        if (!empty($attributes) && !self::allStringKeys($attributes))
            throw new MyException("Invalid associative array",2);
        $this->attributes = $attributes;
    }

    private static function allStringKeys(array $arr): bool {
        foreach (array_keys($arr) as $key) {
            if (!is_string($key)) {
                return false;
            }
        }
        return true;
    }
    
        
    public function pushElement(Elem $elem): void {
        $this->children[] = $elem;
    }

    private function renderAttributes(): string {
        if (empty($this->attributes))
            return "";
        $parts = [];
        foreach ($this->attributes as $key => $value) {
            $parts[] = $key ."="."\"". htmlspecialchars((string)$value, ENT_QUOTES) ."\"";
        }
        return " ". implode(" ", $parts);
    }
    public function getHTML(): string {
        $html = "";
        $html .= <<<HTML
        <{$this->element}{$this->renderAttributes()}>{$this->content}
        HTML;
        for ($i = 0; $i < count($this->children); $i++) {
            $html .= $this->children[$i]->getHTML();
        }
        if (!in_array($this->element, ["br", "meta", "img", "hr"]))
            {
            $html .= <<<HTML
            </{$this->element}>
            HTML; }
        return $html;  
        }
}
?>