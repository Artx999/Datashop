<?php
$root = "";
require "structure/head.php";
print "<script>giveTitle('Formater')</script>";
require "structure/nav.php";
?>
<main class="flex-box">
    <section id="formats-table" class="view-width">
        <div>
            <h1>.ai</h1>
            <p>Et Format for å lagre "Adobe Illustrator"-prosjekter. I dette programmet kan man lage vektorgrafikk og eksportere til andre filformater.</p>
        </div>
        <div>
            <h1>.svg</h1>
            <p>Et XML-basert filformat som brukes til å beskrive/lagre vektorbaserte figurer. Dette formatet passer bra til vektorfigurer.</p>
        </div>
        <div>
            <h1>.jpg</h1>
            <p>Kanskje det vanligste filformatet brukt til lagring av bilder. Dette brukes til lagring av punktpasert grafikk, og komprimerer bildene slik at de tar liten plass.</p>
        </div>
        <div>
            <h1>.png</h1>
            <p>Dette filformatet brukes også til å lagre punktgrafikk, men tar som oftest mer plass enn .jpg. Denne støtter også transparente bilder.</p>
        </div>
    </section>
</main>
<?php
require "structure/footer.php"
?>
