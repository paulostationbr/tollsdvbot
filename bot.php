<?php
include ('Telegram.php');
include ('bd.php');
include ('config.php');

$telegram=new Telegram ($token);

$data=$telegram->getData ();
$chat_id=$telegram->ChatID ();
$user_id=$telegram->UserID ();
$user_nome=$telegram->FirstName ();
$text=$telegram->Text ();
$msg_id=$telegram->MessageID ();
$username=@$telegram->Username ();
$callback_id=@$telegram->Callback_ID ();

$block=mysqli_query ($c,"SELECT * FROM block WHERE id_telegram='".$user_id."' ");

$sessao=mysqli_query ($c,"SELECT * FROM sessao WHERE id_telegram='".$user_id."' ");

if (mysqli_num_rows ($sessao) == 1){

$get_sessao=@mysqli_fetch_array ($sessao);

} else {

$get_sessao=null;

}

if (mysqli_num_rows ($block) >= 3){

include ('blocos/block.php');

exit ();
}

if ($user_id == $user_adm){

if ($text == '/ncnf'){

include ('blocos/ncnf.php');

exit ();
}

if (strpos ($text,'dlt') !== false){

include ('blocos/dlt.php');

exit ();
  }

if (strpos ($text,'adv') !== false){

$telegram->answerCallbackQuery(array(
'callback_query_id' => $callback_id,
'text' => ' ⚠️ Usuário Advertido.'
));

include ('blocos/adv.php');

exit ();
  }

if (strpos ($text,'cnf') !== false){

$telegram->answerCallbackQuery(array(
'callback_query_id' => $callback_id,
'text' => ' 👍 Divulgação Publicada.'
));

include ('blocos/cnf.php');

exit ();
  }

}

if (isset ($data ['message']['photo'])){

$guardar='descricao';

include ('blocos/photo.php');

exit ();
}

if ($get_sessao ['sessao'] == 'descricao'){

$guardar='nome_canal';

include ('sessao/descricao.php');

exit ();
}

if ($get_sessao ['sessao'] == 'nome_canal'){

$guardar='link_canal';

include ('sessao/nome_canal.php');

exit ();
}

if ($get_sessao ['sessao'] == 'link_canal'){

include ('sessao/link_canal.php');

exit ();
}

if ($get_sessao ['sessao'] == 'send'){

include ('sessao/send.php');

exit ();
}

if ($text == '/start'){

include ('blocos/start.php');

exit ();
}

if ($text == '/info'){

include ('blocos/info.php');

exit ();
}

if ($text == '/cancelar'){

include ('blocos/cancelar.php');

exit ();
}

if ($text == '/send'){

$guardar='send';

include ('blocos/send.php');

exit ();
}

?>