<?php

namespace PrestaShop\TranslationToolsBundle\Translation\Extractor\Visitor\Translation;

use PhpParser\Node;
use PhpParser\Node\Scalar\String_;
use PhpParser\NodeVisitorAbstract;
use PrestaShop\TranslationToolsBundle\Translation\Extractor\Util\TranslationCollection;

/**
 * This class looks for arrays like this:
 *
 * ```php
 * [
 *     'key' => 'This text is lonely',
 *     'parameters' => [],
 *     'domain' => 'Admin.Notifications.Error',
 * ]
 *
 * [
 *     'key' => 'This text is lonely',
 *     'domain' => 'Admin.Notifications.Error',
 * ]
 * ```
 *
 * Parameters can be in any order
 */
class ArrayTranslationDefinition extends AbstractTranslationNodeVisitor
{

    public function leaveNode(Node $node)
    {
        $this->translations->add($this->extractFrom($node));
    }

    /**
     * @param Node $node
     *
     * @return array Array of translations to add
     */
    public function extractFrom(Node $node)
    {
        if (!$this->appliesFor($node)) {
            return [];
        }

        /** @var $node Node\Expr\Array_ */

        $translation = [
            'source' => null,
            'domain' => null,
            'line'   => $node->getAttribute('startLine')
        ];

        $parametersFound = false;
        foreach ($node->items as $item) {
            if (!($item instanceof Node\Expr\ArrayItem && $item->key instanceof String_)) {
                return [];
            }

            switch($item->key->value) {
                case 'key':
                    if (!$item->value instanceof String_) {
                        return [];
                    }
                    $translation['source'] = $item->value->value;
                    continue 2;

                case 'domain':
                    if (!$item->value instanceof String_) {
                        return [];
                    }
                    $translation['domain'] = $item->value->value;
                    continue 2;

                case 'parameters':
                    $parametersFound = true;
                    continue 2;
            }

            // break if the key isn't one of the three above
            return [];
        }

        if ($translation['source'] === null
            || $translation['domain'] === null
            || (count($node->items) === 3 && !$parametersFound)
        ) {
            return [];
        }

        return [$translation];
    }

    /**
     * @param Node $node
     *
     * @return bool
     */
    private function appliesFor(Node $node)
    {
        return (
            $node instanceof Node\Expr\Array_
            && (in_array(count($node->items), [2, 3]))
        );
    }
}
