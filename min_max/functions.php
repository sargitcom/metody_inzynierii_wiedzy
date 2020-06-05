<?php

function generateNodes(&$nodes, &$values, &$graph, $points = 0, $currentNodeIndex = 'n0')
{
    if ($points > 21) {
        return;
    }

    //echo $currentNodeIndex . "\n";

    $index3 = $currentNodeIndex . '4';
    $index4 = $currentNodeIndex . '5';
    $index6 = $currentNodeIndex . '6';

    $index3value = $points + 4;
    $index4value = $points + 5;
    $index6value = $points + 6;

    $values[$index3] = $index3value;
    $values[$index4] = $index4value;
    $values[$index6] = $index6value;

    $nodes[$index3] = new Structures_Graph_Node();
    $nodes[$index3]->setMetadata('points', $values[$index3]);

    $nodes[$index4] = new Structures_Graph_Node();
    $nodes[$index4]->setMetadata('points', $values[$index4]);

    $nodes[$index6] = new Structures_Graph_Node();
    $nodes[$index6]->setMetadata('points', $values[$index6]);

    $graph->addNode($nodes[$index3]);
    $graph->addNode($nodes[$index4]);
    $graph->addNode($nodes[$index6]);

    $nodes[$currentNodeIndex]->connectTo($nodes[$index3]);
    $nodes[$currentNodeIndex]->connectTo($nodes[$index4]);
    $nodes[$currentNodeIndex]->connectTo($nodes[$index6]);

    generateNodes($nodes,$values, $graph, $index3value, $index3);
    generateNodes($nodes,$values, $graph, $index4value, $index4);
    generateNodes($nodes,$values, $graph, $index6value, $index6);
}

function calculateMinMax(Structures_Graph_Node $rootNode, bool $protagonistStarts = true)
{
    $value = (int)$rootNode->getMetadata('points');

    if (count($rootNode->getNeighbours()) === 0 || $value >= 21) {

        echo "Wybranie węzła końcowego przez: " . ($protagonistStarts ? "PROTAGONISTĘ" : "ANTAGONISTĘ") . "\n";

        return $value;
    }

    if ($protagonistStarts) {
        $maxEval = null;

        echo "Szukanie węzła o najniższej wartości przez: " . (!$protagonistStarts ? "PROTAGONISTĘ" : "ANTAGONISTĘ") . "\n";

        foreach ($rootNode->getNeighbours() as $neigbour) {
            $eval = calculateMinMax($neigbour, false);
            $maxEval = $maxEval === null ? $eval : max($maxEval, $eval);
        }

        echo "Wybrano węzeł o wartości: " . $maxEval . "\n";

        return $maxEval;
    } else {
        $maxEval = null;

        echo "Szukanie węzła o najwyższej wartości przez: " . (!$protagonistStarts ? "PROTAGONISTĘ" : "ANTAGONISTĘ") . "\n";

        foreach ($rootNode->getNeighbours() as $neigbour) {
            $eval = calculateMinMax($neigbour, true);
            $maxEval = $maxEval === null ? $eval : min($maxEval, $eval);
        }

        echo "Wybrano węzeł o wartości: " . $maxEval . "\n";

        return $maxEval;
    }
}