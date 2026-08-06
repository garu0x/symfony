<?php
require_once("Text.php");

class TemplateEngine {
    public function createFile(string $fileName, Text $text) {
        $body = $text->readData();
        $content = <<<HTML
<!DOCTYPE html>
<html>
<body>
{$body}
</body>
</html>
HTML;
        file_put_contents($fileName, $content);
    }
}
?>