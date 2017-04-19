<?php

declare(strict_types=1);

require_once 'Node.php';
require_once 'LinkedListInvertor.php';

function printLinkedList(Node $node)
{
    do {
        echo $node->getValue() . ' ';
        $node = $node->getNext();
    } while ($node !== null);
    echo PHP_EOL;
}

$node = new Node(1);
$node2 = new Node(2);
$node3 = new Node(3);
$node4 = new Node(4);
$node5 = new Node(5);

$node->setNext($node2);
$node2->setNext($node3);
$node3->setNext($node4);
$node4->setNext($node5);

echo 'Input list' . PHP_EOL;
printLinkedList($node);

$node = (new LinkedListInvertor())->invertLinkedList($node);

echo 'Output list' . PHP_EOL;
printLinkedList($node);