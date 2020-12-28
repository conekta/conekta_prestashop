<?php

namespace PrestaShop\TranslationToolsBundle\Translation\Extractor\Visitor\Translation\FormType;

use PhpParser\Node;
use PrestaShop\TranslationToolsBundle\Translation\Extractor\Util\TranslationCollection;

/**
 * Extracts choices from a choice declaration.
 *
 * A choice declaration looks like this:
 *
 * ```php
 * ->add('default_order_way', ChoiceType::class, [
 *     'choices' => [
 *         'Ascending' => 0,
 *         'Descending' => 1,
 *     ],
 *     'required' => true,
 *     'choice_translation_domain' => 'Admin.Global',
 * ]);
 * ```
 */
class ChoiceExtractor
{
    const METHOD_NAME = 'add';

    const EXPECTED_ARG_COUNT = 3;

    const CLASS_ARG_INDEX = 1;

    const OPTIONS_ARG_INDEX = 2;

    const OPTION_NAME_CHOICES = 'choices';

    const OPTION_NAME_TRANSLATION_DOMAIN = 'choice_translation_domain';

    const CHOICE_CLASS_NAME = 'ChoiceType';

    /**
     * @var Node|Node\Expr\MethodCall
     */
    private $rootNode;

    /**
     * @var string
     */
    private $defaultTranslationDomain;


    public function __construct(Node $node, $defaultTranslationDomain = '')
    {
        $this->rootNode = $node;
        $this->defaultTranslationDomain = $defaultTranslationDomain;
    }

    /**
     * @return bool
     */
    public function isChoiceDeclaration()
    {
        $node = $this->rootNode;

        return (
            $node instanceof Node\Expr\MethodCall
            && $node->name === self::METHOD_NAME
            && count($node->args) >= self::EXPECTED_ARG_COUNT
            && $this->argIsChoiceType($node->args[self::CLASS_ARG_INDEX])
        );
    }

    /**
     * Returns the list of choices as translation items.
     *
     * Note: the translation domain is only
     *
     * @return array[] Translation items
     */
    public function getChoiceWordings()
    {
        $choices = [];

        try {
            $domain = $this->getTranslationDomain();
            $choicesNode = $this->getChoicesNode();

            foreach ($choicesNode->items as $optionItem) {
                if ($optionItem instanceof Node\Expr\ArrayItem
                    && $optionItem->key instanceof Node\Scalar\String_
                ) {
                    $choices[] = TranslationCollection::newTranslationItem(
                        $optionItem->key->value,
                        $optionItem->getLine(),
                        $domain
                    );
                }
            }
        } catch (\RuntimeException $e) {
            // choices not found
            return [];
        }

        return $choices;
    }

    /**
     * @return string
     */
    private function getTranslationDomain()
    {
        $options = $this->getOptionsNode();

        try {
            $translationDomainNode = $this->getOptionNodeByKey(self::OPTION_NAME_TRANSLATION_DOMAIN, $options);

            if (!$translationDomainNode instanceof Node\Scalar\String_) {
                throw new \RuntimeException("Translation Domain node is not a string");
            }

            return $translationDomainNode->value;
        } catch (\RuntimeException $e) {
            // translation domain is optional, return the default
            return $this->defaultTranslationDomain;
        }
    }

    /**
     * @return Node\Expr\Array_
     */
    private function getChoicesNode()
    {
        $options = $this->getOptionsNode();

        $choicesNode = $this->getOptionNodeByKey(self::OPTION_NAME_CHOICES, $options);

        if (!$choicesNode instanceof Node\Expr\Array_) {
            throw new \RuntimeException("Choices node is not an array");
        }

        return $choicesNode;
    }

    /**
     * @return Node\Expr\Array_
     */
    private function getOptionsNode()
    {
        $node = $this->rootNode;

        $arg = $node->args[self::OPTIONS_ARG_INDEX];
        if (!$arg->value instanceof Node\Expr\Array_) {
            throw new \RuntimeException("The options node is not an array");
        }

        return $arg->value;
    }

    /**
     * Look up option in the options node
     *
     * @param string $optionName Option name to look up
     * @param Node\Expr\Array_ $optionsNode
     *
     * @return Node\Expr Node
     */
    private function getOptionNodeByKey($optionName, Node\Expr\Array_ $optionsNode)
    {
        foreach ($optionsNode->items as $option) {
            if ($option instanceof Node\Expr\ArrayItem
                && $option->key instanceof Node\Scalar\String_
                && $option->key->value === $optionName
            ) {
                return $option->value;
            }
        }

        throw new \RuntimeException(sprintf('Could not the requested option "%s"', $optionName));
    }

    /**
     * @param Node\Arg $node
     *
     * @return bool
     */
    private function argIsChoiceType(Node\Arg $node)
    {
        return (
            $node->value instanceof Node\Expr\ClassConstFetch
            && $node->value->class instanceof Node\Name
            && in_array(self::CHOICE_CLASS_NAME, $node->value->class->parts)
        );
    }


}
