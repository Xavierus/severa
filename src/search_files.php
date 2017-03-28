<?php

declare(strict_types=1);

require_once 'FileSearcher.php';

const PATH = '/datafiles';
const REGEX = '/[0-9a-zA-Z]*\.ixt$/';

$fileSearcher = new FileSearcher(PATH);
$files = $fileSearcher->findByRegex(REGEX);
sort($files);
foreach ($files as $file) {
    echo $file . PHP_EOL;
}