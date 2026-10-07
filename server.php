<?php

/**
 * Local PHP built-in server router for this project.
 * Uses public/index.php when present; otherwise root index.php.
 */

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/');

$publicFile = __DIR__ . '/public' . $uri;
$rootFile = __DIR__ . $uri;

if ($uri !== '/' && $uri !== '' && file_exists($publicFile) && ! is_dir($publicFile)) {
    return false;
}

if ($uri !== '/' && $uri !== '' && file_exists($rootFile) && ! is_dir($rootFile)) {
    return false;
}

if (file_exists(__DIR__ . '/public/index.php')) {
    require_once __DIR__ . '/public/index.php';
} elseif (file_exists(__DIR__ . '/index.php')) {
    require_once __DIR__ . '/index.php';
} else {
    http_response_code(500);
    echo 'No application entry point found.';
    exit(1);
}
