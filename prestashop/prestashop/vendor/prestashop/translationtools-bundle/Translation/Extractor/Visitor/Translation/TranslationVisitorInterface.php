<?php

namespace PrestaShop\TranslationToolsBundle\Translation\Extractor\Visitor\Translation;

use PrestaShop\TranslationToolsBundle\Translation\Extractor\Util\TranslationCollection;

interface TranslationVisitorInterface
{
    /**
     * @return TranslationCollection
     */
    public function getTranslationCollection();
}
