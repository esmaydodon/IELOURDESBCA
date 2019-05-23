<?php
function quitar($cadena){
	$cadena = str_replace("<","&lt;",trim($cadena));
	$cadena = str_replace(">","&gt;",trim($cadena));
	$cadena = str_replace("\'","&#39;",trim($cadena));
	$cadena = str_replace('\"',"&quot;",trim($cadena));
	$cadena = str_replace("\\\\","&#92;",trim($cadena));
	$cadena = str_replace("<","&lt;",trim($cadena));
	$cadena = str_replace("<p>","",trim($cadena));
	$cadena = str_replace("</p>","",trim($cadena));
	$cadena = str_replace('"',"&quot;",trim($cadena));
	$cadena = str_replace("ñ","&ntilde;",trim($cadena));

	$cadena=str_replace("á","&#225;",trim($cadena));
	$cadena=str_replace("à","&#224;",trim($cadena));
	$cadena=str_replace("è","&#232;",trim($cadena));
	$cadena=str_replace("é","&#233;",trim($cadena));
	$cadena=str_replace("í", "&#237",trim($cadena));
	$cadena=str_replace("ì", "&#236",trim($cadena));
	$cadena=str_replace("ò", "&#242;",trim($cadena));
	$cadena=str_replace("ó", "&#243;",trim($cadena));
	$cadena=str_replace("ú", "u",trim($cadena));
	$cadena=str_replace("ü", "u",trim($cadena));
	return $cadena;
}
/*
 /*
&#192; À  	letra mayúscula latina A con acento grave
&#193; Á 	letra mayúscula latina A con acento agudo
&#194; Â 	letra mayúscula latina A con acento circunflejo
&#195; Ã 	letra mayúscula latina A con tilde
&#196; Ä 	letra mayúscula latina A con diéresis
&#200; È 	letra mayúscula latina E con acento grave
&#201; É 	letra mayúscula latina E con acento agudo
&#202; Ê 	letra mayúscula latina E con acento circunflejo
&#203; Ë 	letra mayúscula latina E con diéresis
&#204; Ì 	letra mayúscula latina I con acento grave
&#205; Í 	letra mayúscula latina I con acento agudo
&#206; Î 	letra mayúscula latina I con acento circunflejo
&#207; Ï 	letra mayúscula latina I con diéresis
&#210; Ò 	letra mayúscula latina O con acento grave
&#211;Ó 	letra mayúscula latina O con acento agudo
&#212; Ô 	letra mayúscula latina O con acento circunflejo
&#213; Õ 	letra mayúscula latina O con tilde
&#214; Ö 	letra mayúscula latina O con diéresis
&#217; Ù 	letra mayúscula latina U con acento grave
&#218; Ú 	letra mayúscula latina U con acento agundo
&#219; Û 	letra mayúscula latina U con acento circunflejo
&#220; Ü 	letra mayúscula latina U con diéresis
&#352; Š 	letra mayúscula latina S con anticircunflejo
&#221; İ 	letra mayúscula latina Y con acento agudo
&#376; Ÿ 	letra mayúscula latina Y con diéresis
&#224; à 	letra minúscula latina a con acento grave
&#225; á 	letra minúscula latina a con acento agudo
&#226; â 	letra minúscula latina a con acento circunflejo
&#227; ã 	letra minúscula latina a con tilde
&#228; ä 	letra minúscula latina a con diéresis
&#232; è 	letra minúscula latina e con acento grave
&#233; é 	letra minúscula latina e con acento agudo
&#234; ê 	letra minúscula latina e con acento circunflejo
&#235; ë 	letra minúscula latina e con diéresis
&#236; ì 	letra minúscula latina i con acento grave
&#237; í 	letra minúscula latina i con acento agudo
&#238; î 	letra minúscula latina i con acento circunflejo
&#239; ï 	letra minúscula latina i con diéresis
&#242; ò 	letra minúscula latina o con acento grave
&#243; ó 	letra minúscula latina o con acento agudo
&#244; ô 	letra minúscula latina o con acento circunflejo
&#245; õ 	letra minúscula latina o con tilde
&#246; ö 	letra minúscula latina o con diéresis
&#249; ù 	letra minúscula latina u con acento grave
&#250; ú 	letra minúscula latina u con acento agudo
&#251; û 	letra minúscula latina u con acento circunflejo
&#252; ü 	letra minúscula latina u con diéresis
&#353; š 	letra minúscula latina S con anticircunflejo
&#253; ı 	letra minúscula latina y con acento agudo
&#255; ÿ
*/
date_default_timezone_set('America/Lima');

?>