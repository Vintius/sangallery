<?php
// Получаем текущие курсы валют в rss-формате с сайта www.cbr.ru
$date = date("d/m/Y");
// Формируем ссылку
$link = "http://www.cbr.ru/scripts/XML_daily.asp?date_req=$date";
// Загружаем HTML-страницу
$fd = fopen($link, "r");
$text="";
if (!$fd) echo "Запрашиваемая страница не найдена";
else {
    // Чтение содержимого файла в переменную $text
    while (!feof ($fd)) $text .= fgets($fd, 4096);
}
// Закрыть открытый файловый дескриптор
fclose ($fd);

$content = $text;

// Разбираем содержимое, при помощи регулярных выражений
$pattern = "#<Valute ID=\"([^\"]+)[^>]+>[^>]+>([^<]+)[^>]+>[^>]+>[^>]+>[^>]+>[^>]+>[^>]+>([^<]+)[^>]+>[^>]+>([^<]+)#i";
preg_match_all($pattern, $content, $out, PREG_SET_ORDER);
$dollar = "";
$euro = "";

foreach($out as $cur) {
    if($cur[2] == 840) $dollar = str_replace(",",".",$cur[4]);
    if($cur[2] == 978) $euro   = str_replace(",",".",$cur[4]);
}
// echo "Доллар - ".$dollar."<br>";
// echo "Евро - ".$euro."<br>";

if ($dollar!="" && $dollar!="") {
    $somecontent = $dollar."\n".$euro."\n";
    $fp = fopen('currency/currency.txt', 'w'); // записываем курс в файл currency.txt
    fwrite($fp, $somecontent);
    fclose($fp);
}

$products = wc_get_products([]);
$lines = file($_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/currency/currency.txt');
error_log($lines[0]);

foreach($products as $product) {
    $currency_type = $product->get_meta('currency_type');
    $origin_price = $product->get_meta('origin_price');
    $origin_sale_price = $product->get_meta('origin_sale_price');
    if ($lines) {
        if ($currency_type == "USD") {
            $custom_price = $origin_price * $lines[0];
            $custom_sale_price = $origin_sale_price * $lines[0];
        }
        else if ($currency_type == "EUR") {
            $custom_price = $origin_price * $lines[1];
            $custom_sale_price = $origin_sale_price * $lines[1];
        }
        else {
            $custom_price = $origin_price;
            $custom_sale_price = $origin_sale_price;
        }
        $custom_price = round($custom_price, 2);
        $custom_sale_price = round($custom_sale_price, 2);
        update_post_meta($product->get_id(), '_regular_price', $custom_price);
        update_post_meta($product->get_id(), '_sale_price', $custom_sale_price ? $custom_sale_price : get_post_meta($product->get_id(), '_regular_price')[0]);
//        update_post_meta($product->get_id(), '_price', $custom_price);
//       		wc_delete_product_transients( $product->id );
    }
}
