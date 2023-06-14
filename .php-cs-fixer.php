<?php

$myRules = [
    '@PhpCsFixer' => true,
    '@PSR2' => true,
    'no_unused_imports' => false,
    'no_mixed_echo_print' => ['use' => 'print'],
    'echo_tag_syntax' => ['format' => 'short'],
    // 'general_phpdoc_annotation_remove' =>["author","autor"], //Removendo o comentario escrito author
    'increment_style' => ['style' => 'post'],
    'yoda_style' => false,
];

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
;

$config = new PhpCsFixer\Config();

return $config->setRules($myRules)->setFinder($finder);