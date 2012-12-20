<?php
// Vars
$subject = $_POST['subject'];
$to = explode(',', $_POST['to'] );

// convert the CSV string to an array 
$fields_array = explode(',',$_POST['fields_labels']);

// Data
$c = 0;
$msg = "";
foreach($fields_array as $k => $field): $field_id = "id_" . $c++;
	$msg .=   $field .': ' .$_POST[$field_id] ."<br>\n";
	// set email
	if($field  == 'Email'){ $from = $_POST[$field_id]; }
endforeach;

//Headers
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: <".$from. ">" ;

//send for each mail
foreach($to as $mail){
   mail($mail, $subject, $msg, $headers);
}
?>
