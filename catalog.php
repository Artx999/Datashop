<?php
$root = "";
require "structure/head.php";
print "<script>giveTitle('Katalog')</script>";
require "structure/nav.php";
?>
<main id="catalog" class="flex-box">
    <section class="view-width">
        <div class="catalog-product">
            <div class="catalog-product-left">
                <img src="images/gigabyte-vision-rtx-3070.png">
            </div>
            <div class="catalog-product-middle">
                <h1>Produktnavn</h1>
                <div class="input-group">
                    <input type="button" value="-" class="button-minus" data-field="quantity">
                    <input type="number" step="1" max="" value="1" name="quantity" class="quantity-field">
                    <input type="button" value="+" class="button-plus" data-field="quantity">
                </div>
                <p class="amount">n på lager</p>
            </div>
            <div class="catalog-product-right">
                <h2 class="price">Pris</h2>
                <button class="buy-button">Kjøp</button>
            </div>
        </div>
    </section>
</main>
<?php
require "structure/footer.php"
?>
