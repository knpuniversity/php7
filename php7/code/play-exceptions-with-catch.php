<?php
declare(strict_types = 1);

try {
    undefinedFunction();
} catch (Throwable $error) {
    echo 'Now if you write bad code, you can catch it! ' . $error->getMessage();
}

echo "\n\nContinue processing file...";
