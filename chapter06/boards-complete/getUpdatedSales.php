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

header("Content-Type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
?>

<totals>
 <boards-sold><? echo $boardsSold; ?></boards-sold>
 <boots-sold><? echo $bootsSold; ?></boots-sold>
 <bindings-sold><? echo $bindingsSold; ?></bindings-sold>
</totals>
