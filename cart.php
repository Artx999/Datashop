<?php
session_start();
$root = "";
require "structure/head.php";
print "<script>giveTitle('Handlevogn')</script>";
require "structure/nav.php";
?>
<main class="flex-box">
    <section class="view-width">
        <div id="cart-content">
            <?php
            if (isset($_SESSION["cart"])):
                $cartContent = $_SESSION["cart"];
                $totalValue = 0;
                ?>
                <div id="cart-buttons">
                    <button id="empty-cart">Tøm handlekurv</button>
                    <button class="checkout">Klikk og hent!</button>
                </div>
                <?php
                foreach ($cartContent as $key => $value):
                    $result = dbQuery("SELECT * FROM datashop.products WHERE product_id = '$key'")->fetch_assoc();
                    $totalProductValue = ($result["product_price"] * $value);
                    $totalValue += $totalProductValue;
                    ?>
                    <div class="catalog-product">
                        <div class="catalog-product-left">
                            <img src="<?php print $result["display_image_path"] ?>">
                        </div>
                        <div class="catalog-product-middle">
                            <h2><?php print $result["product_name"] ?></h2>
                            <div class="input-group">
                                <p>Antall: <?php print $value ?></p>
                            </div>
                            <p class="amount"><?php print $result["product_amount"] ?> på lager</p>
                        </div>
                        <div class="catalog-product-right">
                            <h2 class="price"><?php print $result["product_price"] ?>,-</h2>
                            <h2 class="total-product-price">Totalt: <?php print $totalProductValue ?>,-</h2>
                        </div>
                    </div>
                <?php endforeach ?>
                <div id="cart-bottom">
                    <p>Sum å betale: <?php print $totalValue ?></p>
                    <button class="checkout">Klikk og hent!</button>
                </div>
            <?php
            endif;
            if (!isset($_SESSION["cart"]))
                print "<h1>Handlekurven er tom</h1>"
            ?>
        </div>
        <form id="checkout-page" action="backend/checkout.php" method="post">
            <h1>Checkout</h1>
            <i id="checkout-back" class="uil uil-angle-left"></i>
            <input name="customer-name" placeholder="Navn" onKeyPress="if(this.value.length==255) return false;" aria-label="">
            <input name="phone" type="number" onKeyPress="if(this.value.length==8) return false;" placeholder="Telefonnummer" aria-label="">
            <label for="pickup-time">Ønsket tid for å hente varene:</label>
            <input id="pickup-time" name="pickup-time" type="time">
            <button type="submit">Bestill</button>
        </form>
    </section>
</main>
<?php
require "structure/footer.php"
?>