<?php

namespace PrestaShop\TranslationToolsBundle\Translation\Extractor\Visitor\Translation\FormType;

use PhpParser\Node;
use PrestaShop\TranslationToolsBundle\Translation\Extractor\Util\TranslationCollection;
use PrestaShop\TranslationToolsBundle\Translation\Extractor\Visitor\Translation\AbstractTranslationNodeVisitor;

/**
 * Extracts wordings from FormType classes
 *
 * Only supports wordings in ChoiceType for now
 */
class FormTypeDeclaration extends AbstractTranslationNodeVisitor
{

    /**
     * FQCN to symfony form AbstractType, separated into parts
     */
    const SUPPORTED_FORM_TYPES = [
        ['Symfony', 'Component', 'Form', 'AbstractType'],
        ['PrestaShopBundle', 'Form', 'Admin', 'Type', 'TranslatorAwareType']
    ];

    /**
     * Types of nodes that we are interested in inspecting
     */
    const INTERESTING_NODE_TYPES = [
        Node\Stmt\Use_::class,
        Node\Stmt\Class_::class,
        Node\Stmt\ClassMethod::class,
        Node\Expr\MethodCall::class,
    ];

    /**
     * @var bool Indicates if a Use statement for Symfony\Component\Form\AbstractType has been found
     */
    private $useSfFormAbstractTypeFound = false;
    /**
     * @var string Alias used for AbstractType class in the Use statement (if found)
     */
    private $sfFormAbstractTypeAlias = '';

    /**
     * @var bool Indicates if the we have identified a class that should be inspected by this visitor
     */
    private $classIsKnownToBeFormType = false;
    /**
     * @var bool Indicates if we should keep continue to inspect nodes in this file
     */
    private $continueVisiting = true;

    private $defaultTranslationDomain = '';

    private $defaultTranslationDomainExtractor;

    public function __construct(TranslationCollection $collection)
    {
        parent::__construct($collection);

        $this->defaultTranslationDomainExtractor = new DefaultTranslationDomainExtractor();
    }


    public function enterNode(Node $node)
    {
        if ($this->shouldTryToExtractWordings($node)) {
            $this->tryToExtractDefaultTranslationDomain($node);
            $this->tryToExtractChoiceWordings($node);
        }
    }

    public function afterTraverse(array $nodes)
    {
        if ($this->needsPostProcessing()) {
            $this->translations->applyDefaultTranslationDomain($this->defaultTranslationDomain);
        }
    }

    private function needsPostProcessing()
    {
        return (
            $this->classIsKnownToBeFormType
            && !empty($this->defaultTranslationDomain)
        );
    }

    /**
     * @param Node $node
     *
     * @return bool
     */
    private function shouldTryToExtractWordings(Node $node)
    {
        return (
            $this->continueVisiting
            && $this->isAnInterestingNode($node)
            && $this->checkIfClassIsFormType($node)
        );
    }

    /**
     * @param Node $node
     *
     * @return bool
     */
    private function checkIfClassIsFormType(Node $node)
    {
        if (!$this->classIsKnownToBeFormType) {
            $this->checkIfUseSfAbstractTypeIsPresent($node);
            $this->checkIfClassDeclarationExtendsSfAbstractType($node);
        }

        return $this->classIsKnownToBeFormType;
    }

    /**
     * Check if this node should be inspected
     *
     * @param Node $node
     *
     * @return bool
     */
    private function isAnInterestingNode(Node $node)
    {
        foreach (self::INTERESTING_NODE_TYPES as $nodeType) {
            if ($node instanceof $nodeType) {
                return true;
            }
        }
        return false;
    }

    /**
     * Find out if this node is a Use for a supported form type
     *
     * @param Node $node
     */
    private function checkIfUseSfAbstractTypeIsPresent(Node $node)
    {
        if ($node instanceof Node\Stmt\Use_ && !$this->useSfFormAbstractTypeFound) {
            foreach ($node->uses as $useData) {
                if ($useData instanceof Node\Stmt\UseUse
                    && $useData->name instanceof Node\Name
                    && in_array($useData->name->parts, self::SUPPORTED_FORM_TYPES)
                ) {
                    $this->useSfFormAbstractTypeFound = true;
                    $this->sfFormAbstractTypeAlias = $useData->alias;
                }
            }
        }
    }

    /**
     * Find out if this node is a Class node which extends AbstractType
     *
     * @param Node $node
     */
    private function checkIfClassDeclarationExtendsSfAbstractType(Node $node)
    {
        if ($node instanceof Node\Stmt\Class_) {
            if (!$this->useSfFormAbstractTypeFound) {
                // no Use statement for AbstractType was found, no need to continue
                return;
            }

            if ($node->extends instanceof Node\Name) {
                $this->classIsKnownToBeFormType = in_array($this->sfFormAbstractTypeAlias, $node->extends->parts);
            }
        }
    }

    /**
     * @param Node $node
     */
    private function tryToExtractChoiceWordings(Node $node)
    {
        if ($node instanceof Node\Expr\MethodCall) {
            $choiceExtractor = new ChoiceExtractor($node, $this->defaultTranslationDomain);
            if ($choiceExtractor->isChoiceDeclaration()) {
                $translations = $choiceExtractor->getChoiceWordings();
                $this->translations->add($translations);
            }
        }
    }

    private function tryToExtractDefaultTranslationDomain($node)
    {
        $extractor = $this->defaultTranslationDomainExtractor;
        if ($extractor->lookForDefaultTranslationDomain($node)) {
            $this->defaultTranslationDomain = $extractor->getDefaultTranslationDomain();
        }
    }
}
