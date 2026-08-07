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
    
    public function validPage(): bool {
    return $this->element === "html" && $this->checkNode();
    }

    private function checkNode(): bool {
        $childTags = array_map(fn(Elem $c) => $c->element, $this->children);

        switch ($this->element) {
            case "html":
                if ($childTags !== ["head", "body"]) return false;
                break;
            case "head":
                $counts = array_count_values($childTags);
                if (count($childTags) !== 2) return false;
                if (($counts["title"] ?? 0) !== 1) return false;
                if (($counts["meta"] ?? 0) !== 1) return false;
                foreach ($this->children as $c) {
                    if ($c->element === "meta" && !isset($c->attributes["charset"]))
                        return false;
                }
                break;
            case "p":
                if (!empty($this->children)) return false;
                break;
            case "table":
                if (array_diff($childTags, ["tr"])) return false;
                break;
            case "tr":
                if (array_diff($childTags, ["th","td"])) return false;
                break;
            case "ul":
            case "ol":
                if (array_diff($childTags, ["li"])) return false;
                break;
            }
            foreach ($this->children as $child) {
                if (!$child->checkNode()) return false;
            }
            return true;
        }
}
?>