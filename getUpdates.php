<?php


const TOKEN = '455972467:AAEIlZmWF1knu0dW45QKy1rkSnXkOK2FRDs';
$method = 'getUpdates';
$url = 'https://api.telegram.org/bot' . TOKEN . '/'. $method;

// getUpdate without `offset` send you all (100 last msg - default & max `limit`)
// with offset - all before this mark as confirmed/seen/read (it will not transfer again)
$last_update = 895120871;
$params = [
  'offset' => $last_update + 1,
];

$url = $url . '?' . http_build_query($params);

$response = json_decode(file_get_contents($url), JSON_OBJECT_AS_ARRAY);

var_dump($response);

if ($response['ok']) {
    foreach ($response['result'] as $update) {
        echo $update['message']['from']['username'].': '.$update['message']['text'];

    }
}

/** SendMessage
 *  from bot we can send msg only to created/existed chat (directly to user not allowed)
 */

$chat_id = 438881539;
