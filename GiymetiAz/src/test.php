<?php

    $url = "https://qiymeti.net/wp-content/themes/qiymeti-theme/images/companies/almali.png?v=1.02";
    file_put_contents("assets/".basename(strtok($url, "?")), file_get_contents($url))
?>