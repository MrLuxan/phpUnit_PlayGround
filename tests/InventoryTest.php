<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

include('./src/Inventory.php');

final class InventoryTest extends TestCase
{
    public function testInventoryStartsEmpty()
    {
        $inventory = new Inventory;
        $this->assertEmpty($inventory->get());
    }

    public function testAddItem()
    {
        $inventory = new Inventory;
        $inventory->addItem('Sword');
        $this->assertEquals($inventory->get(), ['Sword']);
    }

    public function testAddItems()
    {
        $inventory = new Inventory;
        $inventory->addItems(['Sword','Pog']);
        $this->assertEquals($inventory->get(), ['Sword','Pog']);
    }

    public function testCheckCount()
    {
        $inventory = new Inventory;
        $inventory->addItems(['Sword','Pog']);
        $this->assertEquals(2, $inventory->itemCount());
    }

    public function testInventoryIsIterator()
    {
        $inventory = new Inventory;
        $this->assertInstanceOf(IteratorAggregate::class, $inventory);
        $this->assertInstanceOf(ArrayIterator::class, $inventory->getIterator());
    }

    public function testCanbeIterated()
    {
        $inventory = new Inventory;
        $inventory->addItems(['Sword','Pog']);

        $testArray = [];
        foreach($inventory as $item)
        {
            $testArray[] = $item;
        }

        $this->assertEquals($testArray, ['Sword','Pog']);
    }

    public function testInventoryHasItem()
    {
        $inventory = new Inventory;
        $inventory->addItems(['Sword','Pog']);
        $this->assertTrue($inventory->hasItem('Sword'));
    }

    public function testInventoryDoesntHaveItem()
    {
        $inventory = new Inventory;
        $inventory->addItems(['Sword','Pog']);
        $this->assertFalse($inventory->hasItem('Mace'));
    }

    public function testEncodesToJson()
    {
        $inventory = new Inventory;
        $inventory->addItems(['Sword','Pog']);

        $this->assertEquals('["Sword","Pog"]',$inventory->toJson());
    }

    public function testEncodesFromJson()
    {
        $inventory = new Inventory;
        $inventory->fromJson('["Sword","Pog"]');

        $this->assertEquals(['Sword','Pog'],$inventory->get());
    }

}