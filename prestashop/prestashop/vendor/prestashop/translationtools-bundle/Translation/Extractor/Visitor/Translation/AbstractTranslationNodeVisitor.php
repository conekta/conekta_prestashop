<?php

namespace PrestaShop\TranslationToolsBundle\Translation\Extractor\Visitor\Translation;

use PhpParser\NodeVisitorAbstract;
use PrestaShop\TranslationToolsBundle\Translation\Extractor\Util\TranslationCollection;

abstract class AbstractTranslationNodeVisitor extends NodeVisitorAbstract implements TranslationVisitorInterface
{

    /**
     * @var TranslationCollection
     */
    protected $translations;

    public function __construct(TranslationCollection $collection)
    {
        $this->translations = $collection;
    }

    /**
     * @inheritDoc
     */
    public function getTranslationCollection()
    {
        return $this->translations;
    }

}
