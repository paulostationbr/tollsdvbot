<?php
$texto=$send ['block'];

$content = array (
'chat_id' => $chat_id,
'text' => $texto,
'parse_mode' => 'html',
'disable_web_page_preview' => 'true'
);

$telegram->sendMessage ($content);
?>