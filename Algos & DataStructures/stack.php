

<?php

/*
* Stack class to implement a basic stack data structure. Provides methods to
* push, pop, peek, get size, check if empty, search and get entire stack. Uses
* PHP arrays to store stack.
*/

class Stack {
    public $stack = [];

    public function Get(): array {
        return $this->stack;
    }

    public function Size(): int {
        return sizeOf($this->stack);
    }
    public function IsEmpty(): bool {
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

    public function Search($item): int {
        if (!in_array($item, $this->stack)) return -1;
        else return array_search($item, $this->stack);
    }
}



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

// var_export($stack->Search("item2"));
// echo "\n";
