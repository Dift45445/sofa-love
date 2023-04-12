<?php
$telegram_token = '6207217148:AAHBRBNbMKH4mg8ZZ4WgE3194Z8O4SGvOq0';
$chat_id = '203977324';

// Получение данных о геолокации
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

// Формирование запроса к Telegram API
$request_url = 'https://api.telegram.org/bot' . $telegram_token . '/sendlocation';
$request_params = [
    'chat_id' => $chat_id,
    'latitude' => $latitude,
    'longitude' => $longitude,
];

// Отправка запроса к Telegram API и обработка ответа
$ch = curl_init($request_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $request_params);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

if ($response) {
    echo 'Геолокация успешно отправлена через Telegram API';
} else {
    echo 'Произошла ошибка при отправке геолокации через Telegram API';
}