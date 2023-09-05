<?php

use Contao\DC_Table;
use Contao\Controller;

$GLOBALS['TL_DCA']['tl_mega_menu'] = [
  'config' => [
    'dataContainer'     => DC_Table::class,
    'enableVersioning'  => true,
    'switchToEdit'      => true,
    'ctable'            => ['tl_content'],
    'sql'               => [
      'keys'            => [
        'id'            => 'primary',
      ],
    ],
  ],
  'list' => [
    'sorting'           => [
      'mode'            => 1,
      'flag'            => 1,
      'fields'          => ['name'],
      'panelLayout'     => 'filter;search',
    ],
    'label'             => [
      'fields'          => ['name'],
      'format'          => '%s',
    ],
    'global_operations' => [
      'all'             => [
        'href'          => 'act=select',
        'class'         => 'header_edit_all',
        'attributes'    => 'onclick="Backend.getScrollOffset()" accesskey="e"'
      ],
    ],
    'operations'        => ['edit', 'children', 'copy', 'delete'],
  ],
  'fields' => [
    'id'                => [
      'sql'             => "int(10) unsigned NOT NULL auto_increment",
    ],
    'tstamp'            => [
      'sql'             => "int(10) unsigned NOT NULL default 0"
    ],
    'name'              => [
      'label'           => &$GLOBALS['TL_LANG']['tl_mega_menu']['name'],
      'inputType'       => 'text',
      'search'          => true,
      'eval'            => ['mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50'],
      'sql'             => "varchar(255) NOT NULL default ''"
    ],
    'template' => [
      'label'            => &$GLOBALS['TL_LANG']['tl_mega_menu']['template'],
      'inputType'        => 'select',
      'default'          => 'mega_menu_default',
      'options_callback' => static function () {
        return Controller::getTemplateGroup('mega_menu_');
      },
      'eval'             => ['tl_class' => 'w50'],
      'sql'              => "text NULL"
    ],
  ],
  'palettes' => [
    'default'           => '{name_legend},name,template',
  ],
];
