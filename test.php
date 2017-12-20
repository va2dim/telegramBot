<?php

const TOKEN = '455972467:AAEIlZmWF1knu0dW45QKy1rkSnXkOK2FRDs'; // Bot token
const BASE_URL = 'https://api.telegram.org/bot' . TOKEN . '/'; // bot api url without method pointing

/**
 * sendMessage restriction - from bot we can send msg only to created/existed chat (directly to user not allowed)
 * getUpdate without `offset` send you all (100 last msg - default & max `limit`)
 * with offset - all before this mark as confirmed/seen/read (it will not transfer again)
 *
 * @param $method getUpdates|sendMessage
 * @param array $params
 * @return mixed json_decode() as array
 */
function sendRequest($method, $params = [])
{

    if (!empty($params)) {
        $url = BASE_URL . $method . '?' . http_build_query($params);
    } else {
        $url = BASE_URL . $method;
    }

    $response = json_decode(file_get_contents($url), JSON_OBJECT_AS_ARRAY);

    return $response;
}

$updates = sendRequest('getUpdates');

// Answer to all unread msg
foreach ($updates['result'] as $update) {
    echo $chat_id = $update['message']['chat']['id'];
    sendRequest('sendMessage', ['chat_id' => $chat_id, 'text' => 'Answer]);
}

//var_dump(sendRequest('getUpdates'));
//sendRequest('sendMessage', ['chat_id' => 438881539, 'text' => 'Ф-цион. тест']);