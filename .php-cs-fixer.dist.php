<?php

// php-cs-fixer configuration for the hand-written PHP in this repo.
//   Check:  php-cs-fixer fix --dry-run --diff
//   Apply:  php-cs-fixer fix
//
// Vendored libraries, Composer dependencies, Blade templates and lecture
// material are excluded so only the coursework's own PHP is touched. The rules
// map onto the recurring Sonar findings: PSR-12 layout, no closing `?>` tag,
// a single blank line at end of file, no trailing whitespace, brace placement
// and `elseif` over `else if`.
$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->name('*.php')
    ->notName('*.blade.php')
    ->exclude(['vendor', 'node_modules', 'bower_components', 'courses'])
    ->notPath('#(pluto-1\.0\.0|ckeditor|polylang|Template/source|GiaoDien_Front|full-width-slider)#');

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(false)
    ->setRules([
        '@PSR12' => true,
        'no_closing_tag' => true,
        'single_blank_line_at_eof' => true,
        'no_trailing_whitespace' => true,
        'no_trailing_whitespace_in_comment' => true,
        'braces_position' => true,
        'control_structure_continuation_position' => true,
        'elseif' => true,
    ])
    ->setFinder($finder);
