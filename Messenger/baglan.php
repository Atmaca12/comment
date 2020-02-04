<?php



try {

	$db=new PDO("mysql:host=localhost;dbname=messenger;charset=utf8",'root','annebabq123');
	//echo "veritabanı bağlantısı başarılı";
}

catch (PDOExpception $e) {

	echo $e->getMessage();
}


 ?>





