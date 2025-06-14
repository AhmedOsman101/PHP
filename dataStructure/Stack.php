<?php

declare(strict_types=1); // Enables strict type checking


/**
 * Stack data structure.
 * A Stack is a linear data structure following the Last In, First Out (LIFO) principle.
 * This class provides methods to manipulate the stack, including adding and removing elements, checking if the stack is empty, and searching
 * for an element in the stack. The stack is implemented using a PHP array.
 * @property array $stack Holds the elements of the stack.
 */
class Stack {

    public array $stack;

    /**
     * Stack constructor.
     *
     * @param array $stack An optional array to initialize the stack. Defaults to an empty array.
     */
    public function __construct(array $stack = []) {
        $this->stack = $stack;
    }

    /**
     * Returns the stack.
     *
     * @return array The stack.
     */
    public function Get(): array {
        return $this->stack;
    }

    /**
     * Returns the size of the stack.
     *
     * @return int The size of the stack.
     */
    public function Size(): int {
        return sizeOf($this->stack);
    }

    /**
     * Checks if the stack is empty.
     *
     * @return bool True if the stack is empty, false otherwise.
     */
    public function IsEmpty(): bool {
        return empty($this->stack);
    }

    /**
     * Adds an item to the top of the stack.
     *
     * @param mixed $item The item to add.
     * @return int The new number of elements in the stack after the item is
     * added.
     */
    public function Push($item): int {
        return array_unshift($this->stack, $item);
    }

    /**
     * Removes an item from the top of the stack.
     *
     * @return mixed The removed item, or -1 if the stack is empty.
     */
    public function Pop() {
        return $this->IsEmpty() ? -1 : array_shift($this->stack);
    }

    /**
     * Returns the item at the top of the stack without removing it.
     *
     * @return mixed The item at the top of the stack, or -1 if the stack is
     * empty.
     */
    public function Peek() {
        return $this->IsEmpty() ? -1 : $this->stack[0];
    }

    /**
     * Searches for an item in the stack.
     *
     * @param mixed $item The item to search for.
     * @return int The index of the item in the stack, or -1 if the item is not
     * found.
     */
    public function Search($item): int {
        if (!in_array($item, $this->stack)) return -1;
        else return array_search($item, $this->stack);
    }
}




// $stack = new Stack(["item0"]);
$stack = new Stack();

// var_export($stack->IsEmpty());
// echo "\n";

$stack->Push("item1");
$stack->Push("item2");
$stack->Push("item3");
$stack->Push("item4");

// var_export($stack->Get());
// echo "\n";

// var_export($stack->Size());
// echo "\n";

// var_export($stack->Pop());
// echo "\n";

// var_export($stack->Get());
// echo "\n";

// var_export($stack->Peek());
// echo "\n";

// var_export($stack->Get());
// echo "\n";

// var_export($stack->Search("item5"));
// echo "\n";

// var_export($stack->Search("item4"));
// echo "\n";
