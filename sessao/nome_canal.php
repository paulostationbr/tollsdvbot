<?php

$id_imagem=$get_sessao ['id_imagem'];

mysqli_query ($c,"UPDATE dv SET nome_canal='".$text."' WHERE id_usuario='".$user_id."' AND id='".$id_imagem."' ");

$telegram->sendMessage (
array(
'chat_id' => $chat_id,
'text' => $send ['nome_canal'],
'parse_mode' => 'html'
));


mysqli_query ($c,"UPDATE sessao SET sessao='".$guardar."' WHERE id_telegram='".$user_id."' AND id_imagem='".$id_imagem."' ");

?>