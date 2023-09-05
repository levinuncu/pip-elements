<?php

use PiP\ContaoElementsBundle\MegaMenuModel;

$GLOBALS['TL_CSS'][] = 'bundles/contaoelements/css/main.css|static';

$GLOBALS['TL_MODELS']['tl_mega_menu'] = MegaMenuModel::class;
$GLOBALS['BE_MOD']['design']['mega_menu'] = [
  'tables' => ['tl_mega_menu', 'tl_content'],
];

$GLOBALS['TL_WRAPPERS']['start'][] = 'content_box_start';
$GLOBALS['TL_WRAPPERS']['stop'][] = 'content_box_stop';