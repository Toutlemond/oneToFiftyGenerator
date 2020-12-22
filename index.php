<?php
/* V.Bespalov
 * 15.12.2020
 * One To Fifty Generators
 * 1 - Simple one class
 * 2 - Chain Of Responsibility
 *
 *
 */

include 'oneToFiftyGenerator.php';

$view = new oneToFiftyGenerator();
$view->setMaxValue(50);
$view->generate();


echo("<BR><HR>");

include 'OneToFiftyChainOfResponsibility.php';
$chain = new  OneToFiftyChainOfResponsibility();
$chain->generate();



