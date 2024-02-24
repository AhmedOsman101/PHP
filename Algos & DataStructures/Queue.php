<?php

declare(strict_types=1); // Enables strict type checking

class Queue {
    public array $queue = [];

    public function IsEmpty(): bool {
        return empty($this->queue);
    }

    public function Get(): array {
        return $this->queue;
    }
    public function Size(): int {
        return  $this->IsEmpty() ? -1 : sizeOf($this->queue);
    }

    public function Enqueue($item): int {
        return array_push($this->queue, $item);
    }
}

$queue = new Queue();

var_export($queue->Enqueue("item1"));
var_export($queue->Enqueue("item2"));
var_export($queue->Enqueue("item3"));
var_export($queue->Enqueue("item4"));
