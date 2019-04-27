<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

include('./src/player.php');


final class PlayerTest extends TestCase
{
    public function testNameGetSet()
    {
        $player = new player;
        $player->setName('Luxan');
        $this->assertEquals($player->getName(), 'Luxan');
    }

    public function testLevelGetSet()
    {
        $player = new player;
        $player->setLevel(1);
        $this->assertEquals($player->getLevel(), 1);
    }

    public function testXPGetSet()
    {
        $player = new player;
        $player->setXp(10);
        $this->assertEquals($player->getXp(), 10);
    }

    public function testAddXp()
    {
        $player = new player;
        $player->setXp(10);
        $player->AddXp(15);
        $this->assertEquals($player->getXp(), 25);
    }

    public function testGetSetGold()
    {
        $player = new player;
        $player->setGold(250);
        $this->assertEquals($player->getGold(), 250);
    }

    public function testGoldChange()
    {
        $player = new player;
        $player->setGold(250);
        $this->assertEquals($player->getGold(), 250);
        $player->GoldChange(50);
        $this->assertEquals($player->getGold(), 300);
        $player->GoldChange(-100);
        $this->assertEquals($player->getGold(), 200);
    }
    
    public function testPlayInventorySetInConstructor()
    {
        $player = new player();
        $this->assertInstanceOf(Inventory::class, $player->getInventory());
    }

}
