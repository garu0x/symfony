<?php
$lines = file("ex06.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$element = [];
for ($i = 0; $i < count($lines); $i++) {
    $parts = explode("=", $lines[$i], 2);
    if (count($parts) < 2)
        continue;
    $one = ['name' => trim($parts[0])];
    $fields = explode(",", $parts[1]);
    for ($j = 0; $j < count($fields); $j++) {
        $temp = explode(":", $fields[$j], 2);
        if (count($temp) < 2)
            continue;
        $one[trim($temp[0])] = trim($temp[1]);
    }
    $element[] = $one;
}

$myfile = fopen("mendeleiev.html", "w");
$opening_html = <<<HTML
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Periodic table</title>
<style>
.table {
    display: grid;
    grid-template-columns: repeat(18, 1fr);
    gap: 2px;
}
.cell {
    border: 1px solid black;
    padding: 10px;
}
.cell h4 { margin: 0; }
.cell ul { margin: 0; padding-left: 1em; }
</style>
</head>
<body>
<div class="table">
HTML;
$closing_html = <<<HTML
</div>
</body>
</html>
HTML;
fwrite($myfile, $opening_html);
for ($i = 0; $i < count($element); $i++) {
    $current = $element[$i];
    $shells = explode(" ", $current['electron']);
    $row = count($shells);
    $col = $current['position'] + 1;
    $valence = $shells[$row - 1];
    $plural = ($valence == 1) ? "electron" : "electrons";
    $add = <<<HTML

    <div class="cell" style="grid-column: {$col}; grid-row: {$row};">
        <h4>{$current['name']}</h4>
        <ul>
        <li>No {$current['number']}</li>
        <li>{$current['small']}</li>
        <li>{$current['molar']}</li>
        <li>{$valence} {$plural}</li>
        </ul>
    </div>
HTML;
    fwrite($myfile, $add);
}
fwrite($myfile, $closing_html);
fclose($myfile);

?>

<!-- <table>
<tr>
<td style="border: 1px solid black; padding:10px">
<h4>Hydrogen</h4>
<ul>
<li>No 42</li>
<li>H</li>
<Li> 1.00794 </ li>
<li>1 electron</li>
<ul>
</td> -->