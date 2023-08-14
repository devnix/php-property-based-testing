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
    ])
    ->setFinder($finder)
;
