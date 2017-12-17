<?php

$id_imagem=$get_sessao ['id_imagem'];

$img=mysqli_query ($c,"SELECT * FROM dv WHERE id='".$id_imagem."' ");

$get_img=mysqli_fetch_array ($img);

mysqli_query ($c,"UPDATE dv SET caption='".$text."' WHERE id_usuario='".$user_id."' AND id='".$id_imagem."' ");

$telegram->sendMessage (
array(
'chat_id' => $chat_id,
'text' => $send ['descricao'],
'parse_mode' => 'html'
));


mysqli_query ($c,"UPDATE sessao SET sessao='".$guardar."' WHERE id_telegram='".$user_id."' AND id_imagem='".$id_imagem."' ");

?>