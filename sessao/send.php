<?php

$users=mysqli_query ($c,"SELECT DISTINCT id_telegram FROM sessao ORDER BY RAND ()");

while ($get_users=mysqli_fetch_array ($users)){

$telegram->sendMessage (
array(
'chat_id' => $get_users ['id_telegram'],
'text' => $text,
'parse_mode' => 'html',
'disable_web_page_preview' => 'true'
));

   }

$telegram->sendMessage (
array(
'chat_id' => $user_adm,
'text' => 'Ok,enviado',
'parse_mode' => 'html',
'disable_web_page_preview' => 'true'
));

mysqli_query ($c,"UPDATE sessao SET sessao='',id_imagem='' WHERE id_telegram='$user_id' ");

?>