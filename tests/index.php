<?php

$csv = array_map('str_getcsv', file('Browser\url.csv'));

$list = '';
$txt = '';
$html = 'index.html';
file_put_contents($html, '');

foreach ($csv as $key => $url) {



//    $url = $this->getUrl() . '/' . $url;

    $page_url = $url[0];

    $filename = str_replace(['https', 'http', '/', ':', '.'], '_', $url[0]) . '.png';

    $img_file = 'Browser/screenshots/' . $filename;
//    var_dump($url, $img_file);

    try {
        // Read image path, convert to base64 encoding
        if (file_exists($img_file)) {
            $imgData = base64_encode(file_get_contents($img_file));

            // Format the image SRC:  data:{mime};base64,{data};
            $src = 'data: ' . mime_content_type($img_file) . ';base64,' . $imgData;

            // Echo out a sample image
            $txt = '';
            $txt .= '<br><h2>' . $key . ' <a href="' . $page_url . '">' . $page_url . '</a><h2/>';
            $txt .= '<img src="' . $src . '"/><br>';

            echo $txt . PHP_EOL;

//            $txt = '<img src="screenshots\local_' . $key . '.png" alt=""/>';
            $myfile = file_put_contents($html, $txt . PHP_EOL, FILE_APPEND | LOCK_EX);
        }
    } catch (\Exception $e) {
        echo $e->getMessage();
    }


//    $list .= "<h1>" . $url[0] . "</h1>";
//    $filename = str_replace(['https', 'http', '/', ':', '.'], '_', $url[0]) . '.png';
//    $path = 'screenshots\\' . $filename;
//    $list .= ' <img src = "' . $path . '" alt="" />';
}

//file_put_contents('index.html', $list);
?>
