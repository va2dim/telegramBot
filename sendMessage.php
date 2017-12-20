<?php

/** SendMessage
 *  from bot we can send msg only to created/existed chat (directly to user not allowed)
 */

const TOKEN = '455972467:AAEIlZmWF1knu0dW45QKy1rkSnXkOK2FRDs';
$method = 'sendMessage';
$url = 'https://api.telegram.org/bot' . TOKEN . '/'. $method;

$params = [
  'chat_id' => 438881539,
  'text' => 'Я - бот!',
];

$url = $url . '?' . http_build_query($params);

$response = json_decode(file_get_contents($url), JSON_OBJECT_AS_ARRAY);

var_dump($response);

/*
if ($response['ok']) {
    foreach ($response['result'] as $update) {
        echo $update['message']['from']['username'].': '.$update['message']['text'];

    }
}
*/