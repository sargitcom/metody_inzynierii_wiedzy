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
/*
function minMax(Structures_Graph_Node $rootNode, bool $protagonistStarts = true)
{
    echo "Start MinMaxAlgorithm\n\n";

    $currentNode = $rootNode;

    $currentPoints = 0;
    $currentPlayer = $protagonistStarts ? "PROTAGONIST" : "ANTAGONIST";

    do {
        echo "Gracz: " . $currentPlayer . "\n";
        echo "Aktualne punkty: " . $currentPoints . "\n";

        $nodeNeighbours = $currentNode->getNeighbours();

            $selectedNeighbour = null;

            $selectedValue = null;

            foreach ($nodeNeighbours as $neighbour) {

                if ($currentPlayer === "PROTAGONIST") {
                    if ($selectedNeighbour === null || (int)$neighbour->getMetadata('points') > $selectedValue) {
                        $selectedNeighbour = $neighbour;
                        $selectedValue = (int)$selectedNeighbour->getMetadata('points');
                    }
                } else {
                    if ($selectedNeighbour === null || (int)$neighbour->getMetadata('points') < $selectedValue) {
                        $selectedNeighbour = $neighbour;
                    }
                }
            }

            $currentNode = $selectedNeighbour;

        $currentPoints = (int)$selectedNeighbour->getMetadata('points');

        $currentPlayer = $currentPlayer === "PROTAGONIST" ? "ANTAGONIST" : "PROTAGONIST";

    } while ($currentPoints <= 21);

    $finishValue = (int)$currentNode->getMetadata('points');

    echo "Gracz: " . $currentPlayer . "\n";
    echo "Aktualne punkty: " . $finishValue . "\n";
}
*/

function calculateMinMax(Structures_Graph_Node $rootNode, bool $protagonistStarts = true)
{
    if (count($rootNode->getNeighbours()) === 0) {
        $wartosc = (int)$rootNode->getMetadata('points');
        return $wartosc;
    }

    if ($protagonistStarts) {
        $maxEval = null;

        foreach ($rootNode->getNeighbours() as $neigbour) {
            $eval = calculateMinMax($neigbour, false);
            $maxEval = $maxEval === null ? $eval : max($maxEval, $eval);
        }

        echo "PROT: " . $maxEval . "\n";

        return $maxEval;
    } else {
        $maxEval = null;

        foreach ($rootNode->getNeighbours() as $neigbour) {
            $eval = calculateMinMax($neigbour, true);
            $maxEval = $maxEval === null ? $eval : min($maxEval, $eval);
        }

        echo "ANT: " . $maxEval . "\n";

        return $maxEval;
    }
}