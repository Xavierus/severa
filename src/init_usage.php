<?php

declare(strict_types=1);

require_once 'init.php';

$init = new init();
$results = $init->get();
var_dump($results);