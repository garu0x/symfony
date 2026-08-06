<?php
require_once "TemplateEngine.php";
require_once "Elem.php";
try {
$elem = new Elem('html');
$engine = new TemplateEngine($elem);
$body = new Elem('body');
$body->pushElement(new Elem('br', 'Lorem ipsum'));
} catch (InvalidArgumentException $e) {
    echo $e->getMessage();
}
$elem->pushElement($body);
echo $elem->getHTML();
$engine->createFile("test.html");
?>