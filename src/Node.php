<?php

declare(strict_types=1);

class Node
{
    /**
     * @var mixed
     */
    private $value;

    /**
     * @var Node
     */
    private $next;

    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return Node
     */
    public function getNext()
    {
        return $this->next;
    }

    /**
     * @param Node|null $next
     */
    public function setNext($next)
    {
        $this->next = $next;
    }
}