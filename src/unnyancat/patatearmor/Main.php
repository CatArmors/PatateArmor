<?php

namespace unnyancat\patatearmor;

use pocketmine\item\ArmorTypeInfo;
use pocketmine\item\ItemIdentifier;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use Refaltor\Natof\CustomItem\CustomItem;

class Main extends PluginBase {
    public static Main $instance;

    protected function onEnable(): void
    {
        $this->getServer()->getLogger()->info("§gPatate Armor §fget §aInjected");
    }

    public function loadItems() {
        if (Server::getInstance()->getPluginManager()->getPlugin("CustomItem") != null) {

            $helmet = CustomItem::createHelmetItem(new ItemIdentifier(2012, 0), new ArmorTypeInfo(10, 500, 0), "patate helmet");
            $helmet->setTexture('patate_helmet');

            $chestplate = CustomItem::createChesPlateItem(new ItemIdentifier(2013, 0), new ArmorTypeInfo(10, 500, 1), "patate chestplate");
            $chestplate->setTexture('patate_chestplate');

            $leggings = CustomItem::createLeggingsItem(new ItemIdentifier(2014, 0), new ArmorTypeInfo(10, 500, 2), "patate leggings");
            $leggings->setTexture('patate_leggings');

            $boots = CustomItem::createBootsItem(new ItemIdentifier(2015, 0), new ArmorTypeInfo(10, 500, 3), "patate boots");
            $boots->setTexture('patate_boots');

            $items = [$chestplate, $helmet, $leggings, $boots];
            foreach ($items as $item) {
                CustomItem::registerItem($item);
            }
        }
    }

    protected function onDisable(): void
    {
        $this->getServer()->getLogger()->info("§cLe test de unnyancat s'arrête");
    }

    protected function onLoad(): void {
        $this->loadItems();
    }
}