<?php

namespace PiP\PiPElementsBundle;

use Contao\Model;
use Contao\FrontendTemplate;
use Contao\ContentModel;
use Contao\Controller;


class MegaMenuModel extends Model
{
  protected static $strTable = 'tl_mega_menu';

  public static function create($menuId)
  {
    $menu = MegaMenuModel::findByPk($menuId);


    $template = new FrontendTemplate($menu->template);
    $contentModels = ContentModel::findPublishedByPidAndTable($menuId, self::$strTable);

    $content = [];

    if ($contentModels !== null) {
      foreach ($contentModels as $contentModel) {
        $content[] = Controller::getContentElement($contentModel);
      }
    }

    $template->content = implode('', $content);

    return $template->parse();
  }
}
