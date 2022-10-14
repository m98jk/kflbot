<?php
    define('TOKEN', '5420752066:AAEF6JV_BT1BL4hQqqb9-tZflE3txcj9S40');


    $data = json_decode(file_get_contents("php://input"));
    $message = $data->message;
    $chat_id = $message->chat->id;
    $user_id = $message->from->id;
    $text = $message->text;
    $img_id = $message->photo->file_id;

    function sendMsg($tx, $chat_id)
    {

        $url = "https://api.telegram.org/bot" . TOKEN . "/sendMessage?chat_id=$chat_id&text=$tx";
        return file_get_contents($url);
    }

    // send chat id
    if ($text == '/chatid') {
        $txt = "your chat id : $chat_id";
        sendMsg($txt, $chat_id);
        $txt = "your user id : $user_id";
        sendMsg($txt, $user_id);
    }
    // send user id
    elseif ($text == '/test') {
        sendMsg($img_id, $user_id);

        // send file
    } elseif ($text == '/file') {
        sendMsg("loading ...", $chat_id);
        $path = 'https://alkafeel.edu.iq/kflbot/kafeel.png';
        $url = "https://api.telegram.org/bot" . TOKEN . "/sendDocument?chat_id=$chat_id&document=$path";
        file_get_contents($url);

        // send  keyboard
    } else {
        sendMsg($text, $user_id);
    }
