<?php
$files = glob(__DIR__ . '/../../Modules/*/module.json') ?: [];
foreach ($files as $f) {
    $j = json_decode(file_get_contents($f), true);
    echo ($j['name'] ?? '?') . ' -> ' . dirname($f) . PHP_EOL;
}
