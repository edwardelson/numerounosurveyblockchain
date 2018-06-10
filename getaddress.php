<?php
echo "<h1>Welcome to Numero Uno Blockchain</h1>";
echo "<h2>This is Your New Address. Keep It Safe!</h2>";

$a = 'curl -s --user multichainrpc:7BRkyoKFvCXMVatF3vvtndHyUVqMcgy7e2VofDEQZ8xB --data-binary \'';
$b = '{"jsonrpc": "1.0", "id":"createnewaccount", "method": "createkeypairs", "params": [1]';
$c = '}\' -H "content-type: text/plain;" http://127.0.0.1:5752/';
$cmd = $a . $b . $c;
$ret=exec($cmd);

// parse json
$rets = json_decode($ret, true);

// get address and token
$address = $rets['result'][0]['address'];
$privkey = $rets['result'][0]['privkey'];
echo "address =" . $address . "<br>";
echo "private key =" . $privkey . "<br>";

// import address to the blockchain
$a = 'curl -s --user multichainrpc:7BRkyoKFvCXMVatF3vvtndHyUVqMcgy7e2VofDEQZ8xB --data-binary \'';
$b = '{"jsonrpc": "1.0", "id":"importaddress", "method": "importaddress", "params": ["';
$c = '"]}\' -H "content-type: text/plain;" http://127.0.0.1:5752/';
$cmd = $a . $b . $address . $c;
$ret=exec($cmd);

// grant send and receive to the address
$a = 'curl -s --user multichainrpc:7BRkyoKFvCXMVatF3vvtndHyUVqMcgy7e2VofDEQZ8xB --data-binary \'';
$b = '{"jsonrpc": "1.0", "id":"grant", "method": "grant", "params": ["';
$c = '", "send,receive"';
$d = '] }\' -H "content-type: text/plain;" http://127.0.0.1:5752/';
$cmd = $a . $b . $address . $c . $d;
$ret=exec($cmd);

// give 1 asset from poll server to client address
$polladdress = "1tZR5tZwbwynnBRmAWQiHR5cBgBhNjjETmmb3";

$a = 'curl -s --user multichainrpc:7BRkyoKFvCXMVatF3vvtndHyUVqMcgy7e2VofDEQZ8xB --data-binary \'';
$b = '{"jsonrpc": "1.0", "id":"sendassetfrom", "method": "sendassetfrom", "params": ["';
$c = '" ';
$d = '", "token", 1';
$e = '] }\' -H "content-type: text/plain;" http://127.0.0.1:5752/';
$cmd = $a . $b . $polladdress . $c . ',"' . $address . $d . $e;
$ret=exec($cmd);

echo '<p><a href ="index.html"> Return to Main </a></p>';

?>

