<?php
/**
 * User: Equan Pr.
 * Date: 3/16/13
 * Time: 6:20 AM
 */

?>

<!DOCTYPE html>
<!--[if IE 8]>
<html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8"/>

    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width"/>

    <title>Welcome To Simple Store</title>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/general_foundicons.css">

    <!--[if lt IE 8]>
    <link rel="stylesheet" href="css/general_foundicons_ie7.css">
    <![endif]-->

    <script src="js/vendor/custom.modernizr.js"></script>

</head>
<body>
<div class="row">
    <div class="large-12 columns">
        <!-- Navigation -->
        <div class="row">
            <div class="large-12 columns">
                <!-- Start Top Bar -->
                <nav class="top-bar">
                    <ul class="title-area">
                        <!-- Title Area -->
                        <li class="name">
                            <h1 style="color: white"><a href="#">Shopping Cart</a></h1>
                        </li>
                    </ul>

                    <section class="top-bar-section">
                        <!-- Right Nav Section -->
                        <ul class="right">
                            <li>
                                <div style="padding-right: 5px;">
                                <a href="?" class="small button success">Continue Shopping</a>
                                </div>
                            </li>
                        </ul>
                    </section>
                </nav>
                <!-- End Top Bar -->
            </div>
        </div>
        <!-- End Navigation -->

        <div class="row">
            <div class="large-12 columns">
                <p>Your shopping cart contains <?php echo count($_SESSION['cart']) ?> items</p>

                <div class="large-12">
                    <?php if (count($cart) > 0): ?>
                        <table border="0" style="width: 100%;">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Item Description</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <td></td>
                            <td>Total:</td>
                            <td>$<?php echo number_format($total, 2); ?></td>
                            </tfoot>
                            <tbbody>
                                <?php foreach ($cart as $item): ?>
                                    <tr>

                                        <td><img width="103" height="135" src="<?php $help->htmlout($item['cover']) ?>"
                                                 alt=""/>
                                        </td>
                                        <td>
                                            <?php $help->htmlout($item['desc']); ?>
                                        </td>
                                        <td>
                                            $<?php echo number_format($item['price'], 2); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbbody>
                        </table>

                    <?php else: ?>
                        <p>Your cart is empty!</p>
                    <?php endif; ?>
                    <div class="row">
                        <div class="large-6 columns">
                            <form action="?" method="post">
                                <p>
                                    <input type="submit" name="action" value="empty_cart" class="small button alert"/>
                                </p>
                            </form>
                        </div>
                        <div class="large-6 columns">
                            <form action="?" method="post" class="right">
                                <p>
                                    <input type="submit" class="small button" name="action" value="checkout"/>
                                </p>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Footer -->
        </div>

        <!-- Begin Footer -->
        <footer class="row">
            <div class="large-12 columns">
                <hr/>
                <div class="row">

                    <div class="large-6 columns">
                        <p>&copy; Copyright JunWatu.Com</p>
                    </div>

                    <div class="large-6 columns">
                        <ul class="inline-list right">
                            <li><a href="#">Fork Me on Github</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </footer>
        <!-- End Footer -->
    </div>
</div>
<script>
    document.write('<script src=js/vendor/' +
        ('__proto__' in {} ? 'zepto' : 'jquery') +
        '.js><\/script>')
</script>
<script src="js/foundation.min.js"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>