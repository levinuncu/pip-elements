<?php

namespace PiP\PiPElementsBundle\Controller\ContentElement;

use Contao\ContentModel;
use Contao\BackendTemplate;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\ServiceAnnotation\ContentElement;
use Contao\Template;
use Contao\FilesModel;
use Contao\StringUtil;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @ContentElement("content_box_start", category="content_box", template="content_element/content_box_start.html.twig")
 */
class ContentBoxStart extends AbstractContentElementController
{
    protected function getResponse(
        Template $template,
        ContentModel $model,
        Request $request
    ): Response {
        if (
            $this->container
                ->get("contao.routing.scope_matcher")
                ->isBackendRequest($request)
        ) {
            $template = new BackendTemplate("be_wildcard");
            return $template->getResponse();
        }

        if (!empty($model->content_box_background_color_custom)) {
            $template->backgroundColor =
                "--bc: #" . $model->content_box_background_color_custom;
        } else {
            $template->backgroundColor =
                "--bc: #" . $model->content_box_background_color;
        }

        if ($model->addContentBoxImage && !empty($model->singleSRC)) {
            $file = FilesModel::findByUuid($model->singleSRC);

            $template->backgroundImagePath = $file->path;
        }
        return $template->getResponse();
    }
}
