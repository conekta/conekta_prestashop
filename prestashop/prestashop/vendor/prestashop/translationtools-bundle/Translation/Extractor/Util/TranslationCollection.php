<?php

namespace PrestaShop\TranslationToolsBundle\Translation\Extractor\Util;

class TranslationCollection
{

    private $translations = [];

    /**
     * Creates a new translation item. Note that it is not added to the collection.
     *
     * @param string $source Wording
     * @param int $line
     * @param string $domain
     *
     * @return array Translation item
     */
    public static function newTranslationItem($source, $line, $domain = '')
    {
        $translation = [
            'source' => $source,
            'line' => $line,
            'domain' => $domain,
        ];

        return  $translation;
    }

    /**
     * Adds an array of translations to the collection.
     *
     * @param array[] $translations Array of translation items
     */
    public function add(array $translations)
    {
        if (!empty($translations)) {
            $this->translations = array_merge($this->translations, $translations);
        }
    }

    /**
     * Applies the provided translation domain for all translation items that don't specify a domain
     * @param string $domain
     */
    public function applyDefaultTranslationDomain($domain)
    {
        foreach ($this->translations as &$translation) {
            if (empty($translation['domain'])) {
                $translation['domain'] = $domain;
            }
        }
    }

    /**
     * Returns all the translations as an array.
     *
     * @return array[]
     */
    public function getTranslations()
    {
        return $this->translations;
    }

}
