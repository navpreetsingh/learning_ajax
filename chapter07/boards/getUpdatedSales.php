<?php

// Start with an arbitrary number of sales
$bootsSold = 1672;
$boardsSold = 312;
$bindingsSold = 82;

// Reflect new sales
srand((double)microtime() * 1000000);
$bootsSold = $bootsSold + rand(0,10);
$boardsSold = $boardsSold + rand(0,5);
$bindingsSold = $bindingsSold + rand(0,3);

$vailBoards = $boardsSold/4;
$vailBoots = $bootsSold/4;
$vailBindings = $bindingsSold/4;
$santaFeBoards = $boardsSold/4;
$santaFeBoots = $bootsSold/4;
$santaFeBindings = $bindingsSold/4;
$boulderBoards = $boardsSold/4;
$boulderBoots = $bootsSold/4;
$boulderBindings = $bindingsSold/4;
$denverBoards = $boardsSold/4;
$denverBoots = $bootsSold/4;
$denverBindings = $bindingsSold/4;

$json = new Services_JSON();
$vail = array('location'     => 'Vail', 
              'boardsSold'   => $vailBoards,
              'bootsSold'    => $vailBoots,
              'bindingsSold' => $vailBindings);
$santaFe = array('location'     => 'Santa Fe', 
                 'boardsSold'   => $santaFeBoards,
                 'bootsSold'    => $santaFeBoots,
                 'bindingsSold' => $santaFeBindings);
$boulder = array('location'     => 'Boulder', 
                 'boardsSold'   => $boulderBoards,
                 'bootsSold'    => $boulderBoots,
                 'bindingsSold' => $boulderBindings);
$denver = array('location'     => 'Denver', 
                'boardsSold'   => $denverBoards,
                'bootsSold'    => $denverBoots,
                'bindingsSold' => $denverBindings);
$totals = array('totals' => array($vail, $santaFe, $boulder, $denver));
$output = $json->encode($totals);
print($output);

?>
