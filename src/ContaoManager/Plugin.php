<?php

namespace PiP\ContaoElementsBundle\ContaoManager;

use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\CoreBundle\ContaoCoreBundle;
use PiP\ContaoElementsBundle\ContaoElementsBundle;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(ContaoElementsBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}