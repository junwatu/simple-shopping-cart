<?php
/**
 *  Simple Shopping Chart
 *
 *
 *  Equan Pr.
 *  www.junwatu.com
 *  2013
 */

require '../vendor/autoload.php';
include 'data.php';

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
use Symfony\Component\ClassLoader\UniversalClassLoader;
use Symfony\Component\HttpFoundation\Request;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$loader = new UniversalClassLoader();
$loader->useIncludePath(true);

/**
 * Register custom library
 */
$loader->registerNamespaces(array(
    'Watushop' => __DIR__ . '/../lib'
));

$loader->register();

use Watushop\Version;


/**
 * Start Session
 */
$cart_oders = new AttributeBag('cart');
$cart_oders->setName('Shopping Orders');


$session = new Session(null,$cart_oders);
$session->start();

$info = new Version();

$log = new Logger('Watushop');
$log->pushHandler(new StreamHandler('../log/watushop.log'));

$request = Request::createFromGlobals();

/**
 * custom Functions
 */
function html($text)
{
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

function htmlout($text)
{
    echo html($text);
}

if (!$_SESSION['cart']) {
    $_SESSION['cart'] = array();
}

var_dump($_SESSION);

// Add items to cart
if ($request->request->has('action') and $request->request->get('action') == 'buy') {

    $array_orders = $cart_oders->getIterator();
    $order_count = $array_orders->count();

    $cart_oders->set($order_count,$_POST['id']);

    header('Location:.');
    exit();
}

// Clear cart
if($request->request->has('action') and $request->request->get('action') == 'empty_cart'){
    $cart_oders->clear();
    header('Location:?cart');
    exit();
}


// Detail cart
if (isset($_GET['cart'])) {
    $cart = array();
    $total = 0;
    foreach ($_SESSION['cart'] as $id) {
        foreach ($items as $product) {
            if ($product['id'] == $id) {
                $cart[] = $product;
                $total += $product['price'];
                break;
            }
        }
    }
    include 'cart.php';
    exit();
}

include 'catalog.php';
?>