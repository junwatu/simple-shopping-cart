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

/**
 * custom Functions
 */
function html($text){
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

function htmlout($text){
    echo html($text);
}

//sample data
$items = array(
    array('id' => '1', 'desc' => 'Learning PHP Design Patterns', 'price' => 15.81),
    array('id' => '2', 'desc' => 'Effortless E-Commerce PHP and MySQL', 'price' => 23.09),
    array('id' => '3', 'desc' => 'Secret of the JavaScript Ninja', 'price' => 22.31),
    array('id' => '4', 'desc' => 'Simply JavaScript (SitePoint)',   'price' => 39.95));


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// add items to cart
if (isset($_POST['action']) and $_POST['action'] == 'buy') {

    //add item id to $_SESSION['cart'] array
    $_SESSION['cart'][] = $_POST['id'];

    //log it
    $log->addInfo("data:\n".$_POST['id']);

    header('Location:.');
    exit();
}

// clear item from cart


?>
<!DOCTYPE html>
<html>
<head>
    <title>Simple Shopping Cart</title>
    <style>
        table {
            border-collapse: collapse;
        }
        td, th {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<h1>Simple Shopping Cart/h1>

<p>Your shopping cart contains <?php echo count($_SESSION['cart'])?> items</p>

<p><a href="?cart">View your cart</a></p>
<table border="1">
    <thead>
    <tr>
        <th>Item Description</th>
        <th>Price</th>
    </tr>
    </thead>
    <tbbody>
        <?php foreach($items as $item):?>
        <tr>
            <td>
                <?php htmlout($item['desc']);?>
            </td>
            <td>
                $<?php echo number_format($item['price'],2);?>
            <td>
            </td>
            <td>
            <form action="" method="post">
                <div>
                    <input name="id" type="hidden" value=<?php
                        htmlout($item['id']);
                        ?>
                    />
                    <input type="submit" value="buy" name="action"/>
                </div>
            </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbbody>
</table>
</body>
</html>