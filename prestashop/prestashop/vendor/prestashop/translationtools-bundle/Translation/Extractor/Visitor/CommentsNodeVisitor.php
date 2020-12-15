<?php

namespace PrestaShop\TranslationToolsBundle\Translation\Extractor\Visitor;

use PhpParser\NodeVisitorAbstract;
use PhpParser\Node;

/**
 * Extracts comment information
 */
class CommentsNodeVisitor extends NodeVisitorAbstract
{
    protected $file;

    /**
     * @var array
     */
    protected $comments = [];

    /**
     * TranslationNodeVisitor constructor.
     *
     * @param $file
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * {@inheritdoc}
     */
    public function leaveNode(Node $node)
    {
        $this->tryExtractComments($node);
    }

    /**
     * @return array
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param Node $node
     */
    private function tryExtractComments(Node $node)
    {
        $comments = $node->getAttribute('comments');

        if (is_array($comments)) {
            foreach ($comments as $comment) {
                $this->comments[] = [
                    'line'    => $comment->getLine(),
                    'file'    => $this->file,
                    'comment' => trim($comment->getText(), " \t\n\r\0\x0B/*"),
                ];
            }
        }
    }
}
