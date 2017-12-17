<?php
$message_id=substr ($text,5);

$retorno= $telegram->deleteMessage (
array (
'chat_id' => $canal,
'message_id' => $message_id
));

if ($retorno ['ok']){

$telegram->deleteMessage (
array (
'chat_id' => $chat_id,
'message_id' => $msg_id
));

$telegram->answerCallbackQuery(array(
'callback_query_id' => $callback_id,
'text' => ' 🚮 Divulgação Deletada do Canal.',
'show_alert' => 'true'
));

}else {

$telegram->answerCallbackQuery(array(
'callback_query_id' => $callback_id,
'text' => ' 🚮 Desculpe uma divulgação só pode ser apagada 48h antes da sua divulgação.',
'show_alert' => 'true'
));

}
?>