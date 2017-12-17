<?php
$telegram->deleteMessage (
array (
'chat_id' => $chat_id,
'message_id' => $msg_id
));

$telegram->answerCallbackQuery(array(
'callback_query_id' => $callback_id,
'text' => ' 🚫 Divulgação Rejeitada.'
));
?>