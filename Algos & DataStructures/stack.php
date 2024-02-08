

<?php
/**
 * Stack class to implement a basic stack data structure.
 *
 * Provides methods to check if stack is empty, push items onto stack, pop items
 * off stack, peek at top item, and get full stack array.
 *
 * Uses PHP arrays to store stack data.
 */

class Stack {
    public $stack = [];

    public function GetStack(): array {
        return $this->stack;
    }
    public function Empty(): bool {
        return empty($this->stack);
    }

    public function Push($item): bool {
        return array_unshift($this->stack, $item);
    }

    public function Pop() {
        return array_shift($this->stack);
    }

    public function Peek() {
        return $this->stack[0] ? $this->stack[0] : null;
    }
}



$stack = new Stack();

// var_export($stack->Empty());
// echo "\n";

$stack->Push("item1");
$stack->Push("item2");
$stack->Push("item3");
$stack->Push("item4");

// var_export($stack->GetStack());
// echo "\n";

// var_export($stack->Pop());
// echo "\n";

// var_export($stack->GetStack());
// echo "\n";

// var_export($stack->Peek());
// echo "\n";

// var_export($stack->GetStack());
// echo "\n";
