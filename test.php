<?php
define('TOKEN', '5107756870:AAEQLcAB1AIapc_VaMi-24cHNcVIbHrChuA');
function dump($what)
{
    echo '<pre>';
    print_r($what);
    echo '</pre>';
};

function bot($method, $params = [])
{
    $url = "https://api.telegram.org/bot" . TOKEN . "/" . $method;

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query($params)
    ]);

    $res = curl_exec($curl);
    curl_close($curl);
    if (!curl_error($curl)) return json_decode($res, true);
};

dump(bot("getMe", []));
$hi_text = "hello";

// dump(bot('sendmessage', [
//     'chat_id' => "153588895",
//     'text' => $hi_text,
//     'disable_web_preview'=>true,
//     'reply_markup'=>json_encode([
//         'inline_keyboard'=>[
//             [['text'=>'go', 'callback_data'=>'btn1'],['text'=>'go2', 'callback_data'=>'btn2']],[['text' => "textbtn1", 'url'=>'http://www.example.com']],
//             ]
//         ])
// ]));

// keyboard
dump(bot('sendmessage', [
    'chat_id' => "153588895",
    'text' => $hi_text,
    'disable_web_preview' => true,
    'reply_markup' => json_encode([
        "resize_keyboard"=>true,
        // "one_time_keyboard"=>true,
        "input_field_placeholder"=>"choose",
        'keyboard' => [
            [['text' => 'go🏃‍♂️', 'callback_data' => 'btn1'], ['text' => 'go2', 'callback_data' => 'btn2']], [['text' => "textbtn1", 'url' => 'http://www.example.com']],
            [
                [
                    'text' => 'request_contact',
                    "request_contact" => true

                ],
                [
                    'text' => 'request_location',
                    "request_location" => true

                ],
            ],
        ]
    ])
]));
