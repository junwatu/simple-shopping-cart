<?php
/**
 *  Simple Shopping Chart
 *
 *
 *  Equan Pr.
 *  www.junwatu.com
 *  2013
 */

include_once 'register.php';
include 'data.php';

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
use Symfony\Component\HttpFoundation\Request;

use SimpleStore\Version;
use SimpleStore\Helper;

$info = new Version();
$help = new Helper();

$cart_orders = new AttributeBag('cart');
$cart_orders->setName('Shopping Orders');

/**
 * Start Session
 */
$session = new Session(null,$cart_orders);
$session->start();

$request = Request::createFromGlobals();

// Add items to cart
if ($request->request->has('action') and $request->request->get('action') == 'buy') {

    $array_orders = $cart_orders->getIterator();
    $order_count = $array_orders->count();

    $cart_orders->set($order_count,$request->request->get('id'));

    header('Location:.');
    exit();
}

// Clear cart
if($request->request->has('action') and $request->request->get('action') == 'empty_cart'){
    $cart_orders->clear();
    header('Location:?cart');
    exit();
}

// Detail cart
if ($request->query->has('cart')) {
    $cart = array();
    $total = 0;

    //var_dump($cart_orders->all());

    foreach ($cart_orders->all() as $id) {
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

include 'store.php';