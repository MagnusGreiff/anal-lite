<?php
 $details = $app->url->create("details")
?>
<h1>Om Kursen</h1>
<div class="text_content">
 <p class="text">Denna webbsidan är en del av kursen <a href="http://www.dbwebb.se/kurser/oophp">oophp</a> som lärs ut på Blekinge Tekniska Högskola.</p>
 <p class="text">Länk till anax-lite på github: <a href="https://github.com/MagnusGreiff/anal-lite">Anax-lite</a></p>
 <p class="text">Information: <a href="<?= $details ?>">Klicka Här</a></p>
</div>
<img class="image" src="../../htdocs/img/php_image.png" alt="Bild på PHP">