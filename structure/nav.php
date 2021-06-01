<nav class="flex-box">
    <div class="view-width flex-box-space-between">
        <a href="http://localhost/Datashop"><svg id="logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 139.08 169.19"><defs><style>.cls-1{fill:#278ea6;}.cls-2{fill:#183141;}.cls-3{fill:#30c8d9;}.cls-4{fill:#f18322;}</style></defs><g id="Main-logo"><rect class="cls-1" x="64.08" y="69.13" width="12.27" height="12.27"/><rect class="cls-2" x="27.82" y="88.89" width="12.27" height="12.27"/><rect class="cls-3" x="100.34" y="78.6" width="12.27" height="12.27"/><path class="cls-4" d="M274.89,298.81H247.07V437.89h27.82V378.64h-8.78V348.8H296v29.84h-8.79v59.25h24v-79h-8.78V329.05H332.2v29.84h-8.78v79h48.95l-11.23-11.23-13.73-13.73V368.35h-8.79V338.51h29.84v29.84h-8.78v39.51h0l26.47,26.47V298.81H359.68V268.7H274.89Zm12.27,0V281h60.25v17.84Z" transform="translate(-247.07 -268.7)"/></g></svg></a>
        <ul>
            <li><a href="<?php print $root ?>catalog.php">Katalog</a></li>
            <li><a href="<?php print $root ?>orders.php">Ordreoversikt</a></li>
            <li><a id="cart" href="<?php print $root ?>cart.php"><i class="uil uil-shopping-cart"></i><?php if (isset($_SESSION["cart"])) print "<div id='cart-quantity'>" . array_sum($_SESSION["cart"]) . "</div>" ?></a></li>
        </ul>
    </div>
</nav>