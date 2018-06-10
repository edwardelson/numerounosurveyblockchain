<?php
$a = 'curl -s --user multichainrpc:7BRkyoKFvCXMVatF3vvtndHyUVqMcgy7e2VofDEQZ8xB --data-binary \'';
$b = '{"jsonrpc": "1.0", "id":"listaddresses", "method": "listaddresses", "params": []';
$c = '}\' -H "content-type: text/plain;" http://127.0.0.1:5752/';
$cmd = $a . $b . $c;
$ret=exec($cmd);
$rets = json_decode($ret, true);

echo "<h1>Numero Uno Chain Voting</h1>";
echo "<h2>View Candidates</h2>";

//echo $cmd;
echo $ret . "<br>";
//echo $rets['result'][0];
//print_r($rets['result']->address);

echo file_get_contents('vote.html');
?>
