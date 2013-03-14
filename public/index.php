<?php
session_start();
/**
 *  Simple Shopping Chart
 *
 *
 *  Equan Pr.
 *  www.junwatu.com
 *  2013
 */

use Symfony\Component\HttpFoundation\Request;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

require '../vendor/autoload.php';

$log = new Logger('Watushop');
$log->pushHandler(new StreamHandler('../log/watushop.log'));

$request = Request::createFromGlobals();

if(!isset($_SESSION[''])){
    $_SESSION['cart'] = array();
}



?>
<!DOCTYPE html>
<html>
<head>
    <title>Simple Shopping Cart</title>
</head>
<body>
<h1>Simple Shopping Cart</h1>
<p>Your shopping cart contains <?php echo count($_SESSION['cart'])?> items</p>
</body>
</html>
