<?php

$canal_url='https://t.me/'.substr ($canal,1).'/';

$id_imagem=substr ($text,5);

$select_dv=mysqli_query ($c,"SELECT * FROM dv WHERE id='".$id_imagem."' ");

$dv=mysqli_fetch_array ($select_dv);

#Envia para o canal

$option [][]=$telegram->buildInlineKeyBoardButton($dv['nome_canal'],'https://t.me/'.$dv['link_canal']);

$keyb = $telegram->buildInlineKeyBoard($option);

$content = array (
'chat_id' => $canal, 
'photo' => $dv ['file_id'],
'caption' => $dv ['caption'],
'reply_markup' => $keyb
);

$data_send=$telegram->sendPhoto ($content);

##Retorna confirmação

$option=array (
array ($telegram->buildInlineKeyBoardButton($dv['nome_canal'],'https://t.me/'.$dv['link_canal'])),
array ($telegram->buildInlineKeyBoardButton(' 👍 Divulgação Publicada!',$canal_url.$data_send ['result']['message_id'])),
array ($telegram->buildInlineKeyBoardButton(' 🚮 Apagar Divulgação','','/dlt_'.$data_send ['result']['message_id']))
);

$keyb=$telegram->buildInlineKeyBoard($option);

$content0=array (
'chat_id' => $chat_id,
'message_id' => $msg_id,
'reply_markup' => $keyb
);

$telegram->editMessageReplyMarkup($content0);

###Avisa criador da divulgação

$option1[][] =$telegram->buildInlineKeyBoardButton('Veja Aqui',$canal_url.$data_send ['result']['message_id']);

$keyb1=$telegram->buildInlineKeyBoard($option1);

$content2=array (
'chat_id' => $dv ['id_usuario'], 
'text' => $send ['cnf'],
'reply_markup' => $keyb1
);

$telegram->sendMessage($content2);
?>