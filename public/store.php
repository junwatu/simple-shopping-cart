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
                <nav class="top-bar">
                    <ul class="title-area">
                        <!-- Title Area -->
                        <li class="name">
                            <h1>
                                <a href="#">
                                    Simple Store
                                </a>
                            </h1>
                        </li>

                    </ul>

                    <section class="top-bar-section">
                        <!-- Right Nav Section -->
                        <ul class="right">
                            <li>
                                <div style="color: #ffffff;background-color: #111111;padding-right: 5px;">
                                    <i class="foundicon-cart"></i>
                                    <a href="?cart" style="color: #ffffff"><?php echo count($_SESSION['cart']) ?></a>
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

            <!-- Thumbnails -->

            <div class="large-12 columns">
                <div class="row">
                    <?php foreach ($items as $item): ?>
                        <div class="small-3 columns">
                            <img width="180" height="200" src="<?php $help->htmlout($item['cover']) ?>">

                            <div>
                                <h5><?php $help->htmlout($item['desc']); ?></h5>
                                <div>
                                    <h6 class="subheader"> $<?php echo number_format($item['price'], 2); ?></h6>

                                    <form action="" method="post">
                                        <div>
                                            <input name="id" type="hidden" value=<?php
                                            $help->htmlout($item['id']);
                                            ?>
                                                />
                                            <input type="submit" value="buy" name="action" class="small button"/>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- End Thumbnails -->

                </div>
            </div>
        </div>


        <!-- Footer -->
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
