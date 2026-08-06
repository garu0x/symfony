<?php
class Elem {
    public string $element;
    public string $content;
    public array $children = [];
    public function __construct(string $element, string $content = "") {
        if (!in_array($element, ["meta", "img", "hr", "br", "html", "head", "body", "title", "h1", "h2", "h3", "h4", "h5", "h6", "p", "span", "div"]))
            throw new InvalidArgumentException("Invalid HTML tag: $element", 1);
        $this->element = $element;
        $this->content = $content;
    }
    
        
    public function pushElement(Elem $elem): void {
        $this->children[] = $elem;
    }
    public function getHTML(): string {
        $html = "";
        $html .= <<<HTML
        <{$this->element}>{$this->content}
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