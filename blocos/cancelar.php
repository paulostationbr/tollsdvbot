<?php

$content=array (
'chat_id' => $chat_id,
'text' => $send ['cancelar']
);

$telegram->sendMessage ($content);

mysqli_query ($c,"UPDATE sessao SET sessao='',id_imagem='' WHERE id_telegram='$user_id' ");

?>