<?php

require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/functions.php');

$directedGraph = new Structures_Graph(true);

$nodes = [];
$values = [];

$rootIndex = 'n0';

$values[$rootIndex] = 0;
$nodes[$rootIndex] = new Structures_Graph_Node();
$nodes[$rootIndex]->setMetadata('points',$values[$rootIndex]);

$directedGraph->addNode($nodes[$rootIndex]);

generateNodes($nodes, $values, $directedGraph,0, $rootIndex);

$result =  calculateMinMax($nodes[$rootIndex], true);

echo "Wynik dla PROTAGONISTY to: " . $result . "\n";

$result =  calculateMinMax($nodes[$rootIndex], false);

echo "Wynik dla ANTAGONISTY to: " . $result;
