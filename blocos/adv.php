<?php
$id_imagem=substr ($text,5);

$select_dv=mysqli_query ($c,"SELECT * FROM dv WHERE id='".$id_imagem."' ");

$dv=mysqli_fetch_array ($select_dv);

if (isset ($dv ['username'])){

$adv_username='<b>Username:</b> '.$dv ['username'];

}else {

$adv_username=null;

}

mysqli_query ($c,"INSERT INTO block(id,id_telegram) VALUES ('','".$dv ['id_usuario']."') ");

$b_block=mysqli_query ($c,"SELECT * FROM block WHERE id_telegram='".$dv ['id_usuario']."' ");

$t_block=mysqli_num_rows ($b_block);

switch ($t_block){

case 1:

$msg_user=' ⚠️ <b>1/3</b>
Você  recebeu uma advertência por sua divulgação.
Após 3 advertência  você  não poderá fazer divulgações no bot.';

$msg_adm=' ⚠️ <b>1/3</b>
Usuário Advertido.
<b>ID:</b> '.$dv ['id_usuario'].'
'.$adv_username;

break;
case 2:

$msg_user=' ⚠️ <b>2/3</b>
Você  recebeu uma advertência por sua divulgação.
Após 3 advertência  você  não poderá fazer divulgações.';

$msg_adm=' ⚠️ <b>2/3</b>
Usuário Advertido.
<b>ID:</b> '.$dv ['id_usuario'].'
'.$adv_username;

break;
default:

$msg_user=' ⚠️ <b>3/3</b>
Você recebeu sua última advertência e não poderá fazer mais nenhuma divulgação.';

$msg_adm=' ⚠️ <b>3/3</b>
Usuário Bloqueado do Bot,não poderá fazer mais nenhuma divulgação.
<b>ID:</b> '.$dv ['id_usuario'].'
'.$adv_username;

}

#Envia para usuário

$telegram->sendMessage (
array (
'chat_id' => $dv ['id_usuario'],
'text' => $msg_user,
'parse_mode' => 'html'
));

#Envia para ADM

$telegram->deleteMessage (
array (
'chat_id' => $chat_id,
'message_id' => $msg_id
));

$telegram->sendMessage (
array (
'chat_id' => $user_adm,
'text' => $msg_adm,
'parse_mode' => 'html'
));
?>