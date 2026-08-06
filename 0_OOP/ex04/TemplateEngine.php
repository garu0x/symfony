<?php
require_once("Elem.php");

class TemplateEngine {
    public Elem $element;
    public function __construct(Elem $elem) {
        $this->element = $elem;
    }
    public function createFile(string $filename) {
        file_put_contents($filename, $this->element->getHTML());     
}
}
?>