
<?php

    /* test non fructueux pour actualisé les pages automatiquement si un changement dans la base de données est detecter*/
	$db = new PDO('mysql:host=localhost;dbname=symfony', 'root', '');

	$req = $db->prepare('SELECT tourDe FROM manche WHERE id=?');
	$req->execute(array($_POST['id']));
	$res = $req->fetch();
       
	if($res['tourDe'] == $_POST['id']){
		 echo "test";
	}
?>