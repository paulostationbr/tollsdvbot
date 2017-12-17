<?php

$option[][]=$telegram->buildInlineKeyBoardButton('❌ Cancelar!','','/cancelar');

$keyb = $telegram->buildInlineKeyBoard($option);

$content=array (
'chat_id' => $chat_id,
'text' => $send ['send'],
'parse_mode' => 'html',
'reply_markup' => $keyb
);

$telegram->sendMessage ($content);

mysqli_query ($c,"UPDATE sessao SET sessao='$guardar' WHERE id_telegram='$user_id' ");
?>