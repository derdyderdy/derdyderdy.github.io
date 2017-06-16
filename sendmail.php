<?php

header('Access-Control-Allow-Origin: *');
// header('Content-Type: application/json');

if(isset($_POST['phone']) && isset($_POST['email'])) {

	$colname_getname = "";
    if (isset($_POST['name'])) {
      $colname_getname = $_POST['name'];
    }
    $colname_getphone = "";
    if (isset($_POST['phone'])) {
      $colname_getphone = $_POST['phone'];
    }
    $colname_getemail = "";
    if (isset($_POST['email'])) {
      $colname_getemail = $_POST['email'];
    }
    $colname_getdata = "";
    if (isset($_POST['data'])) {
      $colname_getdata = $_POST['data'];
    }
	$colname_getperson = "";
    if (isset($_POST['person'])) {
      $colname_getperson = $_POST['person'];
    }
    $colname_gettime = "";
    if (isset($_POST['time'])) {
      $colname_gettime = $_POST['time'];
    }
	$colname_getcomment = "";
    if (isset($_POST['comment'])) {
      $colname_getcomment = $_POST['comment'];
    }
    $namefile = 'Заказ с сайта';

	//define the receiver of the email 
	$to = 'derdy@tut.by'; 
	//define the subject of the email 
	$subject = '=?utf-8?B?'.base64_encode($namefile).'?=';
	//create a boundary string. It must be unique 
	//so we use the MD5 algorithm to generate a random hash 
	$random_hash = md5(date('r', time())); 
	//define the headers we want passed. Note that they are separated with \r\n 
	$headers = "From: ".$colname_getemail."\r\nReply-To: ".$colname_getemail;
	//add boundary string and mime type specification 
	$headers .= "\r\nContent-Type: text/html; charset=utf-8; boundary=\"PHP-mixed-".$random_hash."\""; 
	//read the atachment file contents into a string,
	//encode it with MIME base64,
	//and split it into smaller chunks
	// $attachment = chunk_split(base64_encode(file_get_contents('xmlfiles/resultxml.xml'))); 
	//define the body of the message. 

	// $message = "--PHP-mixed-".$random_hash."\r\n";
	// $message .= "Content-Type: text/html; charset=utf-8; boundary=\"PHP-alt-".$random_hash."\r\n";
	// $message .= "--PHP-alt-".$random_hash."--"."\r\n";
	// $message .= "--PHP-mixed-".$random_hash."\r\n";
	// $message .= "Content-Type: text/html; charset=\"UTF-8\";";
	// $message .= "Content-Transfer-Encoding: base64"."\r\n";
	// $message .= "Content-Disposition: attachment; filename=\"".$namefile.".xml\""."\r\n\r\n";
	// $message .= "--PHP-mixed-".$random_hash."--"."\r\n";
	$message .= '<strong>Имя:</strong> '.$colname_getname.'<br/><strong>Тел:</strong> '.$colname_getphone.'<br/><strong>Почта:</strong> '.$colname_getemail.
	'<br/><strong>Дата</strong> '.$colname_getdata.'<br/><strong>Персоны</strong> '.$colname_getperson.
	'<br/><strong>Время</strong> '.$colname_gettime.
	'<br/><strong>Сообщение:</strong> '.nl2br($colname_getcomment);

	//send the email 
	$mail_sent = @mail( $to, $subject, $message, $headers ); 
	//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
	// echo $mail_sent ? "Mail sent" : "Mail failed"; 
	if($mail_sent) {
		header(sprintf("Location: %s", "index.html"));
	}

	// $cookiesuccess = "http://www.biznes-apps.ru/pizzamania/orderinfo.html";
	// 	header(sprintf("Location: %s", $cookiesuccess));

}

?>

