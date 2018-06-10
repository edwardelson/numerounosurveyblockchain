<?php
//echo "<h1> View My Balance </h1>";
$address=$_POST["address"];

// echo $address;

// get balance
$a = 'curl -s --user multichainrpc:7BRkyoKFvCXMVatF3vvtndHyUVqMcgy7e2VofDEQZ8xB --data-binary \'';
$b = '{"jsonrpc": "1.0", "id":"get", "method": "getaddressbalances", "params": ["';
$c = '", 1';
$d = '] }\' -H "content-type: text/plain;" http://127.0.0.1:5752/';
$cmd = $a . $b . $address . $c . $d;
$ret=exec($cmd);
$rets = json_decode($ret, true);

//echo $ret;

echo "Your balance is " . $rets['result'][0]['qty'];

echo '<p><a href ="index.html"> Return to Main </a></p>';

?>
