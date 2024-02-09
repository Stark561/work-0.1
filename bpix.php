<?php
// Получение данных из POST-запроса
$appId = urlencode($_POST['appId']);
$gaid = urlencode($_POST['gaid']);
$sid = urlencode($_POST['sid']);
$mappedIae = urlencode($_POST['mappedIae']);
$ad_ext = urlencode($_POST['ad_ext']);

// Скрытый appKey
$appKey = 'tspace_TBPXyI';

// Формирование URL для перенаправления запроса
$url = "https://attr.img-static.tech/attribution/apply/v2?appId=$appId&appKey=$appKey&gaid=$gaid&sid=$sid&mappedIae=$mappedIae&ad_ext=$ad_ext";

// Отправка запроса на целевой сервер
$response = file_get_contents($url);

// Возврат ответа от целевого сервера
echo $response;
?>
