<?php
session_start();
$root = "";
require "structure/head.php";
print "<script>giveTitle('Katalog')</script>";
require "structure/nav.php";
?>
<main id="catalog" class="flex-box">
    <section class="view-width">
        <?php
        $result = dbQuery("SELECT * FROM datashop.products");
        foreach ($result as $row):
        ?>
            <div class="catalog-product">
                <div class="catalog-product-left">
                    <img src="<?php print $row["display_image_path"] ?>">
                </div>
                <div class="catalog-product-middle">
                    <h2><?php print $row["product_name"] ?></h2>
                    <div class="input-group">
                        <input type="button" value="-" class="button-minus" data-field="quantity">
                        <input type="number" step="1" max="" value="1" name="quantity" class="quantity-field">
                        <input type="button" value="+" class="button-plus" data-field="quantity">
                    </div>
                    <p class="amount"><?php print $row["product_amount"] ?> på lager</p>
                </div>
                <div class="catalog-product-right">
                    <h2 class="price"><?php print $row["product_price"] ?>,-</h2>
                    <button class="buy-button">Legg til i handlekurv</button>
                </div>
            </div>
        <?php endforeach ?>
    </section>
</main>
<?php
require "structure/footer.php";
?>