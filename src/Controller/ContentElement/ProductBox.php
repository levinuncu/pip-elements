<?php

namespace PiP\PiPElementsBundle\Controller\ContentElement;

use Contao\ContentModel;
use Contao\BackendTemplate;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\ServiceAnnotation\ContentElement;
use Contao\Template;
use Contao\StringUtil;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Contao\CoreBundle\Image\Studio\Studio;

/**
 * @ContentElement("product_box_single", category="product_box")
 */
class ProductBox extends AbstractContentElementController
{
  public function __construct(private readonly Studio $studio)
  {
  }
  protected function getResponse(Template $template, ContentModel $model, Request $request): Response
  {
    if ($this->container->get('contao.routing.scope_matcher')->isBackendRequest($request)) {
      $template = new BackendTemplate('be_wildcard');
      return $template->getResponse();
    }

    $template->ID = StringUtil::deserialize($model->cssID)[0];
    $template->CLASS = StringUtil::deserialize($model->cssID)[1];
    $template->h1 = StringUtil::deserialize($model->headline)['unit'];
    $template->headline = StringUtil::deserialize($model->headline)['value'];
    $template->text = $model->text;

    $template->addLink = $model->addGlobalLink;
    $template->addImage = $model->addProduktImage;

    if ($template->addImage && !empty($model->singleSRC)) {
      $figureBuilder = $this->studio->createFigureBuilder();
      $figureBuilder
        ->from($model->singleSRC)
        ->setSize($model->size);

      $template->image = $figureBuilder->build();
    }

    return $template->getResponse();
  }
}
