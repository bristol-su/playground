<?php
/**
 * Project: doxygen-php-filters
 * User:    Alex Schickedanz (AbcAeffchen)
 * Date:    05.03.2015
 * License: GPL v2.0
 */

// Input
$source = file_get_contents($argv[1]);

// make traits to classes
$regexp = '#trait([\s]+[\S]+[\s]*){#';
$replace = 'class$1{';
$source = preg_replace($regexp, $replace, $source);

// use traits by extending them (classes that not extending a class)
$regexp = '#class([\s]+[\S]+[\s]*){[\s]+use([^;]+);#';
$replace = 'class$1 extends $2 {';
$source = preg_replace($regexp, $replace, $source);

// use traits by extending them (classes that already extending a class)
$regexp = '#class([\s]+[\S]+[\s]+extends[\s]+[\S]+[\s]*){[\s]+use([^;]+);#';
$replace = 'class$1, $2 {';
$source = preg_replace($regexp, $replace, $source);

// replace TO DO (one word) with to do (one word)
$regexp = '/TODO/';
$replace = '\todo';
$source = preg_replace($regexp, $replace, $source);


// Output
echo $source;
