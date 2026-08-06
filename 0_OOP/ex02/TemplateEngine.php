<?php
require_once("HotBeverage.php");
require_once("Coffee.php");
require_once ("Tea.php");

class TemplateEngine {
    public function createFile(HotBeverage $text) {
        $myfile = file_get_contents("template.html");
    $reflection = new ReflectionClass($text);
    $properties = array_merge($reflection->getProperties(), $reflection->getParentClass()->getProperties());
    foreach ($properties as $property) {
        $name = $property->getName();
        $getter = "get_".$name;
        if (method_exists($text, $getter)) {
            $value = $text->$getter();
            $myfile = str_replace("{" . $name . "}", (string)$value, $myfile);
        }
    }
    $className = $reflection->getName();
        file_put_contents($className.".html", $myfile); 
    }
}
?>