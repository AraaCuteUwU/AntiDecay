<?php

namespace FiraAja\AntiDecay;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\block\LeavesDecayEvent;

class AntiDecay extends PluginBase implements Listener
{

    public function onEnable(): void
    {
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    /**
     * @param LeavesDecayEvent $event
     * @return void
     */
    public function onDecay(LeavesDecayEvent $event): void {
        $block = $event->getBlock();
        if (empty($this->getConfig()->get("worlds", [])))
            $event->cancel();
        else
            foreach ($this->getConfig()->getAll() as $key) {
                $from = $block->getPosition()->getWorld()->getFolderName();
                if ($key == $from)
                    $event->cancel();
            }
    }
}