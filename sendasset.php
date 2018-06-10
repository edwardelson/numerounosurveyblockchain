<?php
echo "<h1> Numero Uno Blockchain</h1>";
$srcaddress = $_POST["srcaddress"];
$privkey = $_POST["privkey"];
$destaddress = $_POST["destaddress"];

//echo $srcaddress . "<br>";

// create raw send
$a = 'curl -s --user multichainrpc:7BRkyoKFvCXMVatF3vvtndHyUVqMcgy7e2VofDEQZ8xB --data-binary \'';
$b = '{"jsonrpc": "1.0", "id":"createrawsend", "method": "createrawsendfrom", "params": ["';
$c = '",{"';
$d = '":{"token":1}}';
$e = ']}\' -H "content-type: text/plain;" http://127.0.0.1:5752/';
$cmd = $a . $b . $srcaddress . $c . $destaddress . $d . $e;
$ret=exec($cmd);
$rets = json_decode($ret, true);

$rawHex = $rets['result'];
//echo $rawHex;

// sign raw transaction
$a = 'curl -s --user multichainrpc:7BRkyoKFvCXMVatF3vvtndHyUVqMcgy7e2VofDEQZ8xB --data-binary \'';
$b = '{"jsonrpc": "1.0", "id":"signrawtransaction", "method": "signrawtransaction", "params": ["';
$c = '",[],["';
$d = '"]]}\' -H "content-type: text/plain;" http://127.0.0.1:5752/';
$cmd = $a . $b . $rawHex . $c . $privkey . $d;
$ret=exec($cmd);
$rets = json_decode($ret, true);

$rawHex2 = $rets['result']['hex'];
//echo $ret;
//echo $rawHex2;

// send raw transaction
$a = 'curl -s --user multichainrpc:7BRkyoKFvCXMVatF3vvtndHyUVqMcgy7e2VofDEQZ8xB --data-binary \'';
$b = '{"jsonrpc": "1.0", "id":"sendrawtransaction", "method": "sendrawtransaction", "params": ["';
$c = '"]}\' -H "content-type: text/plain;" http://127.0.0.1:5752/';
$cmd = $a . $b . $rawHex2 . $c;
$ret = exec($cmd);
$rets = json_decode($ret, true);

//echo $cmd;
//echo $ret;
//echo $rets;

echo "<h3> you attempted to vote for " . '"' . $destaddress . '"' . ". Check your balance to see if the transaction was succesfully verified by the numerounochain. </h3>";

echo '<p><a href ="index.html"> Return to Main </a></p>';

?>
