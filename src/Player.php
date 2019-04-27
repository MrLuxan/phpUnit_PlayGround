<?php

class Player
{
    private $Name;
    private $Xp = 0;
    private $Level = 0;
    private $Gold = 0;
    private $Inventory;

    function __construct()
    {
        $this->Inventory = new Inventory;
    }

    public function getInventory()
    {        
        return $this->Inventory;
    }

    public function setName($name)
    {        
        $this->Name = $name;
    }

    public function getName() 
    { 
        return $this->Name;
    } 

    public function setLevel($level)
    {
        $this->Level = $level;
    }

    public function getLevel() 
    { 
        return $this->Level;
    }

    public function setXp($Xp)
    {
        $this->Xp = $Xp;
    }

    public function getXp() 
    { 
        return $this->Xp;
    }

    public function addXP($xp)
    {
        $this->Xp += $xp;
    }

    public function setGold($gold)
    {
        $this->Gold = $gold;
    }

    public function getGold() 
    { 
        return $this->Gold;
    }

    public function GoldChange($gold)
    {
        $this->Gold += $gold;
    }
}