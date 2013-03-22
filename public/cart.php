<?php
/**
 * User: Equan Pr.
 * Date: 3/16/13
 * Time: 6:20 AM
 */

?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
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
<header>
    <h1>Your Shopping Cart</h1>
</header>

<p>Your shopping cart contains <?php echo count($_SESSION['cart'])?> items</p>
<?php if (count($cart) > 0): ?>
    <table border="1">
        <thead>
        <tr>
            <th>Item Description</th>
            <th>Price</th>
        </tr>
        </thead>
        <tfoot>
        <td>Total:</td>
        <td>$<?php echo number_format($total, 2);?></td>
        </tfoot>
        <tbbody>
            <?php foreach ($cart as $item): ?>
                <tr>
                    <td>
                        <?php htmlout($item['desc']);?>
                    </td>
                    <td>
                        $<?php echo number_format($item['price'], 2);?>
                    <td>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbbody>
    </table>
<?php else: ?>
    <p>Your cart is empty!</p>
<?php endif;?>
<form action="?" method="post">
    <p>
        <a href="?">Continue Shopping</a>
        <input type="submit" name="action" value="empty_cart"/>
    </p>
</form>
<footer>
    <p>Simple Shopping Cart <?php echo $info::$APP_VERSION ?></p>
</footer>
</body>
</html>