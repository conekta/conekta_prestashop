<?php
$finder = PhpCsFixer\Finder::create()
    ->exclude(['storage', 'bootstrap/cache'])
    ->in(__DIR__);
$config = new PhpCsFixer\Config();
return $config->setRules([
    '@PSR12'                            => true,
    'array_syntax'                      => ['syntax' => 'short'],
    'concat_space'                      => ['spacing' => 'one'],
    'binary_operator_spaces'            => true,
    'not_operator_with_successor_space' => true,
    'no_superfluous_elseif'             => true,
    'single_quote'                      => true,
    'operator_linebreak'                => true,
    'no_unneeded_control_parentheses'   => true,
    'braces'                            => true,
    'phpdoc_annotation_without_dot'     => true,
    'increment_style'                   => true,
    'phpdoc_scalar'                     => true,
    'phpdoc_no_alias_tag'               => true,
    'phpdoc_no_package'                 => true,
    'no_spaces_inside_parenthesis'      => true,
    'single_line_comment_spacing'       => true,
    'no_alias_language_construct_call'  => true,
    'trailing_comma_in_multiline'       => true,
    'unary_operator_spaces'             => true,
    'short_scalar_cast'                 => true,
    'phpdoc_separation'                 => true,
    'cast_spaces'                       => true,
    'no_extra_blank_lines'              => true,
    'blank_line_before_statement'       => true
])
    ->setFinder($finder);




