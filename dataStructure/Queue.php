<?php

declare(strict_types=1); // Enables strict type checking

class Queue
{
  public array $queue = [];

  /**
   * Queue constructor.
   *
   * @param array $queue An optional array to initialize the queue. Defaults to an empty array.
   */
  public function __construct(array $queue = [])
  {
    $this->queue = $queue;
  }


  public function isEmpty(): bool
  {
    return empty($this->queue);
  }

  public function get(): array
  {
    return $this->queue;
  }
  public function size(): int
  {
    return  $this->isEmpty() ? -1 : sizeof($this->queue);
  }

  public function enqueue($item): int
  {
    return array_push($this->queue, $item);
  }
}

$queue = new Queue();

var_export($queue->enqueue("item1"));
var_export($queue->enqueue("item2"));
var_export($queue->enqueue("item3"));
var_export($queue->enqueue("item4"));
