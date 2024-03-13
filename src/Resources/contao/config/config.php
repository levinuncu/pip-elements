<?php

use PiP\PiPElementsBundle\MegaMenuModel;

$GLOBALS["TL_CSS"][] = "bundles/pipelements/css/main.css|static";

$GLOBALS["TL_MODELS"]["tl_mega_menu"] = MegaMenuModel::class;
$GLOBALS["BE_MOD"]["design"]["mega_menu"] = [
    "tables" => ["tl_mega_menu", "tl_content"],
];

$GLOBALS["TL_WRAPPERS"]["start"][] = "start";
$GLOBALS["TL_WRAPPERS"]["stop"][] = "stop";
