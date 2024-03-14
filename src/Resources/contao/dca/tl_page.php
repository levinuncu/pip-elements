<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;

PaletteManipulator::create()
    ->addLegend(
        "megamenu_legend:hide",
        "layout_legend",
        PaletteManipulator::POSITION_AFTER
    )
    ->addField(
        "addMegaMenu",
        "megamenu_legend:hide",
        PaletteManipulator::POSITION_APPEND
    )
    ->applyToPalette("regular", "tl_page");

$GLOBALS["TL_DCA"]["tl_page"]["palettes"]["__selector__"][] = "addMegaMenu";
$GLOBALS["TL_DCA"]["tl_page"]["subpalettes"]["addMegaMenu"] = "megamenu_menu";

$GLOBALS["TL_DCA"]["tl_page"]["fields"]["addMegaMenu"] = [
    "inputType" => "checkbox",
    "eval" => ["submitOnChange" => true],
    "sql" => ["type" => "boolean", "default" => false],
];

$GLOBALS["TL_DCA"]["tl_page"]["fields"]["megamenu_menu"] = [
    "label" => &$GLOBALS["TL_LANG"]["tl_page"]["megamenu_menu"],
    "inputType" => "select",
    "foreignKey" => "tl_mega_menu.name",
    "eval" => ["tl_class" => "clr w50"],
    "sql" => "int(10) unsigned NOT NULL default '0'",
];
