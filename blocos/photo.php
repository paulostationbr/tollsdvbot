<?php
$file_id=$data['message']['photo'][1]['file_id'];

mysqli_query ($c,"INSERT INTO dv(id,id_usuario,file_id,message_id) VALUES('','".$user_id."','".$file_id."','".$msg_id."') ");

$busca_dv=mysqli_query ($c,"SELECT * FROM dv WHERE id_usuario='".$user_id."' AND file_id='".$file_id."' AND message_id='".$msg_id."' LIMIT 1");

$fetch=mysqli_fetch_array ($busca_dv);

$id_imagem=$fetch ['id'];

$content=array (
'chat_id' => $chat_id,
'text' => $send ['photo']
);

$telegram->sendMessage ($content);

if (mysqli_num_rows ($sessao) == 1){

mysqli_query ($c,"UPDATE sessao SET sessao='".$guardar."',id_imagem='".$id_imagem."' WHERE id_telegram='".$user_id."' ");

}else {

mysqli_query ($c,"INSERT INTO sessao(id_telegram,sessao,id_imagem) VALUES ('".$user_id."','".$guardar."','".$id_imagem."')");

}
?>