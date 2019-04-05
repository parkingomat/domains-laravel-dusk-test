<?php

$csv = array_map('str_getcsv', file('url.csv'));

foreach ($csv as $key => $url) {
    ?>
    <h1><?php echo $url[0]; ?></h1>
    <img src="screenshots\<?php echo $filename = str_replace(['https', 'http', '/', ':', '.'], '_', $url[0]) . '.png' ?>" alt=""/>
    <?php
}
?>
