<?php

$id_imagem=$get_sessao ['id_imagem'];

$text=str_replace ('@','',$text);

mysqli_query ($c,"UPDATE dv SET link_canal='".$text."',time='".time ()."',username='@".$username."' WHERE id_usuario='".$user_id."' AND id='".$id_imagem."' ");

$img=mysqli_query ($c,"SELECT * FROM dv WHERE id='".$id_imagem."' LIMIT 1");

$get_img=mysqli_fetch_array ($img);

$option [][]=$telegram->buildInlineKeyBoardButton($get_img['nome_canal'],'https://t.me/'.$get_img['link_canal']);

$keyb = $telegram->buildInlineKeyBoard($option);

$telegram->sendPhoto (
array(
'chat_id' => $chat_id,
'photo' => $get_img ['file_id'],
'caption' => $get_img ['caption'],
'reply_markup' => $keyb
));

$telegram->sendMessage (
array(
'chat_id' => $chat_id,
'text' => $send ['link_canal'],
'parse_mode' => 'html'
));

#Manda pro ADM

$option1=array (
array ($telegram->buildInlineKeyBoardButton($get_img['nome_canal'],'https://t.me/'.$get_img['link_canal'])),
array ($telegram->buildInlineKeyBoardButton(' 🚫 ','','/ncnf'),$telegram->buildInlineKeyBoardButton(' ✅ ','','/cnf_'.$id_imagem)),
array ($telegram->buildInlineKeyBoardButton(' ⚠️ Adv.  Divulgação','','/adv_'.$id_imagem))
);

$markup1 = $telegram->buildInlineKeyBoard($option1);

$content=array (
'chat_id' => $user_adm, 
'photo' => $get_img ['file_id'],
'caption' => $get_img ['caption'], 
'reply_markup' => $markup1
);

$telegram->sendPhoto ($content);

mysqli_query ($c,"UPDATE sessao SET sessao='',id_imagem='' WHERE id_telegram='".$user_id."' AND id_imagem='".$id_imagem."' ");

?>