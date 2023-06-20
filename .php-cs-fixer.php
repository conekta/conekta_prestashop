<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude(['storage', 'bootstrap/cache'])
    ->in(__DIR__);
$config = new PhpCsFixer\Config();
return $config->setRules([
    '@PSR12'                           => true,
    'array_syntax'                     => ['syntax' => 'short'],
    'concat_space'                     => ['spacing' => 'one'],
    'braces'                           => [
        'allow_single_line_anonymous_class_with_empty_body' => false,
        'allow_single_line_closure'                         => true,
        'position_after_functions_and_oop_constructs'       => 'next',
        'position_after_control_structures'                 => 'same',
        'position_after_anonymous_constructs'               => 'same'
    ],
    'no_unneeded_control_parentheses'  => [
        'statements' => [
            'break',
            'clone',
            'continue',
            'echo_print',
            'negative_instanceof',
            'others',
            'return',
            'switch_case',
            'yield',
            'yield_from',
        ]
    ],
    'phpdoc_annotation_without_dot'    => true,
    'increment_style'                  => ['style' => 'pre'],
    'phpdoc_scalar'                    => [
        'types' => [
            'boolean',
            'callback',
            'double',
            'integer',
            'real',
            'str'
        ]
    ],
    'phpdoc_no_alias_tag'              => [
        'replacements' => [
            'property-read'  => 'property',
            'property-write' => 'property',
            'type'           => 'var',
            'link'           => 'see'
        ]

    ],
    'phpdoc_no_package'                => true,
    'single_quote'                     => ['strings_containing_single_quote_chars' => true],
    'no_spaces_inside_parenthesis'     => true,
    'single_line_comment_spacing'      => true,
    'no_alias_language_construct_call' => true,
    'trailing_comma_in_multiline'      => [
        'after_heredoc' => true,
        'elements'      => ['arrays']
    ],
    'unary_operator_spaces'            => true,
    'short_scalar_cast'                => true,
    'phpdoc_separation'                => [
        'groups' => [
            ['deprecated', 'link', 'see', 'since'],
            ['author', 'copyright', 'license'],
            ['category', 'package', 'subpackage'],
            ['property', 'property-read', 'property-write']
        ]
    ],
    'cast_spaces'                      => ['space' => 'single'],
    'no_extra_blank_lines'             => [
        'tokens' => [
            'attribute',
            'break',
            'case',
            'continue',
            'curly_brace_block',
            'default',
            'extra',
            'parenthesis_brace_block',
            'return',
            'square_brace_block',
            'switch',
            'throw',
            'use',
            'use_trait'
        ]
    ],
    'blank_line_before_statement'      => [
        'statements' => [
            'break',
            'case',
            'continue',
            'declare',
            'default',
            'do',
            'exit',
            'for',
            'foreach',
            'goto',
            'if',
            'include',
            'include_once',
            'phpdoc',
            'require',
            'require_once',
            'return',
            'switch',
            'throw',
            'try',
            'while',
            'yield',
            'yield_from'
        ]
    ],
    'binary_operator_spaces'           => [
        'default' => 'single_space'
    ],
    'no_blank_lines_after_phpdoc'      => true,
    'class_attributes_separation'      => [
        'elements' => [
            'const'        => 'one',
            'method'       => 'one',
            'property'     => 'one',
            'trait_import' => 'none',
            'case'         => 'none'
        ]

    ],
    'ternary_operator_spaces'          => true,
    'no_whitespace_in_blank_line'      => true,
    'phpdoc_align'                     => [
        'tags'  => ['method', 'param', 'property', 'return', 'throws', 'type', 'var'],
        'align' => 'left'
    ],
    'single_space_after_construct'     => [
        'constructs' => [
            'abstract',
            'as',
            'attribute',
            'break',
            'case',
            'catch',
            'class',
            'clone',
            'comment',
            'const',
            'const_import',
            'continue',
            'do',
            'echo',
            'else',
            'elseif',
            'enum',
            'extends',
            'final',
            'finally',
            'for',
            'foreach',
            'function',
            'function_import',
            'global',
            'goto',
            'if',
            'implements',
            'include',
            'include_once',
            'instanceof',
            'insteadof',
            'interface',
            'match',
            'named_argument',
            'namespace',
            'new',
            'open_tag_with_echo',
            'php_doc',
            'php_open',
            'print',
            'private',
            'protected',
            'public',
            'readonly',
            'require',
            'require_once',
            'return',
            'static',
            'switch',
            'throw',
            'trait',
            'try',
            'type_colon',
            'use',
            'use_lambda',
            'use_trait',
            'var',
            'while',
            'yield',
            'yield_from'
        ]
    ],
    'phpdoc_indent'                    => true,
    'no_leading_import_slash'          => true,
    'phpdoc_to_comment'                => ['ignored_tags' => ['todo']],
    'single_line_comment_style'        => ['comment_types' => ['asterisk', 'hash']],
    'no_trailing_comma_in_singleline'  => [
        'elements' => [
            'arguments',
            'array_destructuring',
            'array',
            'group_import'
        ]
    ],
    'whitespace_after_comma_in_array'  => ['ensure_single_space' => true],

    'no_unused_imports'                           => true,
    'no_multiline_whitespace_around_double_arrow' => true,
    'single_line_throw'                           => true,
    'standardize_increment'                       => true,
    'native_function_casing'                      => true,
    'phpdoc_trim'                                 => true,
    'class_definition'                            => [
        'multi_line_extends_each_single_line' => false,
        'single_item_single_line'             => false,
        'single_line'                         => true,
        'space_before_parenthesis'            => true,
        'inline_constructor_arguments'        => true
    ],
    'ordered_imports'                             => ['sort_algorithm' => 'alpha']

    //'not_operator_with_successor_space'           => false,
    //'no_superfluous_elseif'                       => true,
    //'operator_linebreak'                          => true,
])
    ->setFinder($finder);




