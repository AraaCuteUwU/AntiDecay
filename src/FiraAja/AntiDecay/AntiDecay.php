<?php

namespace FiraAja\AntiDecay;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\block\LeavesDecayEvent;

class AntiDecay extends PluginBase implements Listener {
	
	public function onEnable(): void {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	
	public function onDecay(LeavesDecayEvent $event){
		$event->cancel();
	}
}