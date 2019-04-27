<?php

class Inventory implements IteratorAggregate
{
    protected $items = [];

    public function get()
    {
        return $this->items;
    }

    public function itemCount()
    {
        return count($this->items);
    }

    public function addItem($item)
    {
        $this->items[] = $item;
        return $this->items;
    }

    public function addItems($items)
    {
        $this->items = array_merge($this->items, $items);
        return $this->items;
    }

    public function getIterator()
    {
        return new ArrayIterator($this->items);
    }

    public function hasItem($item)
    {
        return in_array($item,$this->items);
    }

    public function toJson()
    {
        return json_encode($this->items);
    }

    public function fromJson($json)
    {
        $this->items = json_decode($json);
    }
}


?>