<?php
error_reporting(0);


header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Pragma: no-cache");


//-----------------------VARIABLES-------------------------//

//------TOKEN DEL BOT MIKASA ACKERMAN--------//
$token = "5405339405:AAG0kGkeN-8VueVsI2JCLQbHI3wYSnfoG7Y";

$data = file_get_contents("php://input");
$json = json_decode($data, true);
$message = $json["message"];
//---------PERSONAL---------//
$id = $message["from"]["id"];
$name = $message["from"]["first_name"];
$text = $message["text"];
//----------GRUPOS----------//
$id_chat = $message["chat"]["id"];
$id_new = $message["new_chat_member"]["id"];
$grupo = $message["chat"]["title"];
$nuevo = $message["new_chat_member"]["first_name"]. ' '.$message["new_chat_member"]["last_name"];
//----------------------END VARIABLES----------------------//


//--------PRIVACIDAD--------//

//ID del grupo D4rk Security -1001523463489

if($id_chat == "-1001523463489")
{
//PERMITE QUE PUEDA EMVIAR MWNSAJES EN EL GRUPO :3
} else {


if($id == "1292171163")
{
// PERMITE QUE EL DUEÑO ENVIE MENSAJES AL PV DEL BOT :V
} else {

//------MENSAJE AL USUARIO------//
$respuesta = "Hola ".$name." para acceder a este Bot comunicate con\n\n".
'Telegram:  https://t.me/D4rkGh0st3';
sendMessage($id,$respuesta,$token);
//------MENSAJE PERSONAL-------//
$personal = "Hola Rigo, ".$name." Intento Acceder a tu Bot";
sendMessage("1292171163",$personal,$token);
die();
}

}





//-----BIENVENIDA NUEVO INTEGRANTE------//
if(trim($nuevo) != '')
{
$respuesta = "━━━━━━━━━━ × ━━━━━━━━━━\n    𝓜𝓲𝓴𝓪𝓼𝓪 𝓐𝓬𝓴𝓮𝓻𝓶𝓪𝓷\n\n     ⚠️ 𝙱𝙸𝙴𝙽𝚅𝙴𝙽𝙸𝙳𝙾 ⚠️\n➭ 𝙸𝙳: ".$id_new."  ✔\n➭ 𝙽𝚘𝚖𝚋𝚛𝚎: ".$nuevo."  ✔\n\n凸-.-凸 ".$grupo." 凸-.-凸\n━━━━━━━━━━ × ━━━━━━━━━━\n     ®ᴿⁱᵍᵒ ᴶⁱᵐᵉ́ⁿᵉᶻッ\n";
sendMessage($id_chat,$respuesta,$token);
}




//--------MENSAJES DE GRUPOS--------//
if(trim($id_chat) != '')
{

if(isset($text) &&  $text =='/start') {
	$respuesta = "Hola ".$name." -- Bienvenido 😜 al BOT Mikasa Ackerman ".$id_chat;
	sendMessage($id_chat,$respuesta,$token);
die();
}

else if(isset($text) &&  $text =='/help') {
	$respuesta = "Este es un Robot de Prueba para Telegram Hecho 100% en PHP, sin librerias Externas en un solo archivo\n\n".
	'Y funciona en cualquier hosting  asi sea barato, solo debe tener  HTTPS.';
	sendMessage($id_chat,$respuesta,$token);
die();
}

else if(isset($text) &&  $text =='/info') {
	$respuesta = "Este BOT fue creado por el canal D4rk Security by Rigo Jimenez\n".
        'Gracias por usarnos :3.';
	sendMessage($id_chat,$respuesta,$token);
die();
}

else if(isset($text) &&  $text =='/IP-Tracker') {
	$respuesta = "━━━━━━━━━━ × ━━━━━━━━━━\n    ✖ INSTALACION ✖ \n\n➭ pkg update && pkg upgrade -y\n➭ pkg install -y git\n➭ termux-setup-storage\n➭ git clone https://github.com/Rigo-Jimenez/IP-Tracker\n";
	sendMessage($id_chat,$respuesta,$token);
die();
}


else if(isset($text)){
	$respuesta = "Perdon no te he entendido!!!";
	sendMessage($id_chat,$respuesta,$token);
die();
}

}




function sendMessage($chatID, $messaggio, $token,&$k = ''){
    $url = "https://api.telegram.org/bot" . $token . "/sendMessage?disable_web_page_preview=false&parse_mode=HTML&chat_id=" . $chatID;
/*
	if(isset($k)) {
		$url = $url."&reply_markup=".$k; 
		}
*/

    $url = $url."&text=" . urlencode($messaggio);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}
?>
