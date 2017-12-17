<?php
$texto=$send ['info'];

$option=array(
array(
$telegram->buildInlineKeyBoardButton(' 💁‍♂ Canal Desenvolvedor','https://t.me/httd1dev'))
);

$keyb = $telegram->buildInlineKeyBoard($option);

$content = array (
'chat_id' => $chat_id,
'text' => $texto,
'parse_mode' => 'html',
'disable_web_page_preview' => 'true',
'reply_markup' => $keyb
);

$telegram->sendMessage ($content);
?>