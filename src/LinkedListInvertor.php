<?php

declare(strict_types=1);

require_once 'Node.php';

class LinkedListInvertor
{
    public function invertLinkedList(Node $node): Node
    {
        if (($node->getNext() === null)) {
            return $node;
        }

        $nextNode = $node->getNext();
        $lastNode = $this->invertLinkedList($nextNode);
        $nextNode->setNext($node);
        $node->setNext(null);

        return $lastNode;
    }
}