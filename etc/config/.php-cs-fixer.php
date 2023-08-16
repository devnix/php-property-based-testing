<?php

$finder = PhpCsFixer\Finder::create()
    ->in([
        __DIR__.'/../../src',
        __DIR__.'/../../tests'
    ])
;

return (new PhpCsFixer\Config())
    ->setRules([
        '@Symfony' => true,
        '@PSR2' => true,
        '@DoctrineAnnotation' => true,
        'array_syntax' => ['syntax' => 'short'],
        'php_unit_method_casing' => ['case' => 'snake_case'],
    ])
    ->setFinder($finder)
;
