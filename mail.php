<?php

$method = $_SERVER['REQUEST_METHOD'];

$project_name = "Shoppeum";
$admin_email  = "allbuystore777@gmail.com";
$form_subject = "Детская камера";
$from = "support@shoppeum.com.ua";

//Script Foreach
$c = true;

if ( $method === 'POST' ) {

	foreach ( $_POST as $key => $value ) {
		$value = htmlspecialchars($value);
		$value = urldecode($value);
		$value = trim($value);

		$message .= "
		" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
			<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
			<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
		</tr>
		";
	}

} else if ( $method === 'GET' ) {

	foreach ( $_GET as $key => $value ) {
		$value = htmlspecialchars($value);
		$value = urldecode($value);
		$value = trim($value);

		$message .= "
		" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
			<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
			<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
		</tr>
		";
	}

}

$message = "<table style='width: 100%;'>$message</table>";

function adopt($text) {
	return '=?UTF-8?B?'.Base64_encode($text).'?=';
}

$headers = "MIME-Version: 1.0" . PHP_EOL .
"Content-Type: text/html; charset=utf-8" . PHP_EOL .
'From: '.adopt($project_name).' <'.$from.'>' . PHP_EOL .
'Reply-To: '.$admin_email.'' . PHP_EOL;

mail($admin_email, adopt($form_subject), $message, $headers );