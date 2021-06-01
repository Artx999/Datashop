<?php
$root = "";
require "structure/head.php";
print "<script>giveTitle('Ordeoversikt')</script>";
require "structure/nav.php";
?>
<main class="flex-box">
    <section class="view-width">
        <div id="orders-input">
            <h1>Ordreoversikt</h1>
            <p>Skriv inn ditt telefonnummer</p>
            <input id="orders-phone"  type="number" onKeyPress="if(this.value.length==8) return false;" placeholder="Telefonnummer" aria-label="">
            <button id="orders-button">Sjekk dine ordre</button>
        </div>
        <div id="orders-output"></div>
    </section>
</main>
<?php
require "structure/footer.php"
?>
