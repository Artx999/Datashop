<?php
session_start();
if (!isset($_SESSION["orderConfirmation"]) || !isset($_SESSION["cart"])) header("Location: index.php");
$info = $_SESSION["orderConfirmation"];
$cart = $_SESSION["cart"];
session_unset();
$root = "";
require "structure/head.php";
print "<script>giveTitle('Ordrebekreftelse')</script>";
require "structure/nav.php";
?>
<main class="flex-box">
    <section class="view-width">
        <h1>Ordrebekreftelse</h1>
        <p>Ordrenummer: <?php print $info["orderId"] ?></p>
        <p>Ditt navn: <?php print $info["name"] ?></p>
        <p>Ditt telefonnummer: <?php print $info["phone"] ?></p>
        <p>Tidspunkt for å plukke opp varen: <?php print $info["pickupTime"] ?></p>
        <h2>Varer</h2>
        <?php foreach ($cart as $item => $amount): ?>
        <p><?php print dbQuery("SELECT product_name FROM datashop.products WHERE product_id = '$item'")->fetch_assoc()["product_name"]?>: <?php print $amount ?> stykk</p>
        <?php endforeach ?>
        <br/>
        <p>NB! Ikke gå ut av eller last inn siden på nytt før du er ferdig med ordrebekreftelsen. Dersom du gjør dette, vil den forsvinne.</p>
    </section>
</main>
<?php
require "structure/footer.php";
?>
