<?php
/**
 * User: Equan Pr.
 * Date: 3/16/13
 * Time: 6:21 AM
 */

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
<header>
    <h1>Shopping Cart</h1>
</header>

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
<footer>
    <p>Simple Shopping Cart <?php echo $info::$APP_VERSION ?></p>
</footer>
</body>
</html>