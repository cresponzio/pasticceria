<?php

	class some_query{

		public static function connect() {
			$host = '127.0.0.1';
			$db_name = 'pasticceria';
			$db_user = 'phpmyadmin';  
			$db_password = 'labbradoR2!';  
		    return new PDO('mysql:host='.$host.';dbname='.$db_name, $db_user, $db_password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		}

		public static function get_cakes($db){
			$v=false; $i=0;
			$sql ="SELECT * FROM `dolce`  ORDER BY nome";
			$stmt = $db->prepare($sql); 
			$stmt->execute();
			while ( $vett = $stmt->fetch()  ) {
			    $v[$i] = $vett;
			    $i++;
			}
			return $v;
		}

		public static function get_cake( $db, $id ){
			$v=false; $i=0;
			$sql ="SELECT * FROM `dolce` WHERE id=:id";
			$stmt = $db->prepare($sql); 
			$stmt->bindParam(':id', $id, PDO::PARAM_STR);
			$stmt->execute();
			while ( $vett = $stmt->fetch()  ) {
			    return $vett;
			}
			return $v;
		}

		public static function add_cake( $db, $nome, $prezzo, $foto ){
			$sql ="INSERT INTO `dolce`(  `nome`, `prezzo`, `data_vendita`, `foto`) VALUES ( :nome, :prezzo, NOW(), :foto)";
			$stmt = $db->prepare($sql); 
			$stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
			$stmt->bindParam(':prezzo', $prezzo, PDO::PARAM_STR);
			$stmt->bindParam(':foto', $foto, PDO::PARAM_STR); 
			if( $stmt->execute() )
		 			return true;
			return false;
		}

		public static function add_ingredient( $db, $id, $ingr, $qnt, $misura ){
			$sql ="INSERT INTO `ingr_dolce`(`dolce`, `ingrediente`, `qnt`, `unita_misura`) VALUES (:id,:ingr, :qnt, :misura )";
			$stmt = $db->prepare($sql); 
			$stmt->bindParam(':id', $id, PDO::PARAM_STR);
			$stmt->bindParam(':ingr', $ingr, PDO::PARAM_STR);
			$stmt->bindParam(':qnt', $qnt, PDO::PARAM_STR); 
			$stmt->bindParam(':misura', $misura, PDO::PARAM_STR); 
			if( $stmt->execute() )
		 			return true;
			return false;
		}

		// seleziona l'ulitmo id inserito
		public static function lastID($db){
			return $db->lastInsertId(); 
		}

		public static function update_cake( $db, $id, $nome,$prezzo, $foto ){
			$v=false; $i=0;
			$sql ="UPDATE `dolce` SET `nome`=:nome,`prezzo`=:prezzo,`foto`=:foto  WHERE id=:id";
			$stmt = $db->prepare($sql); 
			$stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
			$stmt->bindParam(':prezzo', $prezzo, PDO::PARAM_STR);
			$stmt->bindParam(':foto', $foto, PDO::PARAM_STR);
			$stmt->bindParam(':id', $id, PDO::PARAM_STR);
			if( $stmt->execute() )
					return true;
			return false;
		}

		public static function delete_cake( $db, $id ){
			$sql ="DELETE FROM `dolce` WHERE id=:id";
			$stmt = $db->prepare($sql); 
			$stmt->bindParam(':id', $id, PDO::PARAM_STR);
			if( $stmt->execute() )
					return true;
			return false;
		}

		public static function update_cake2( $db, $id, $nome ){
			$sql ="UPDATE `dolce` SET `nome`=:nome,`prezzo`=:prezzo WHERE id=:id";
			$stmt = $db->prepare($sql); 
			$stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
			$stmt->bindParam(':prezzo', $prezzo, PDO::PARAM_STR);
			$stmt->bindParam(':id', $id, PDO::PARAM_STR);
			if( $stmt->execute() )
					return true;
			return false;
		}

		public static function get_ingredients($db, $id){
			$v=false; $i=0;
			$sql ="SELECT nome,qnt,unita_misura FROM `ingrediente` JOIN `ingr_dolce` ON(id=ingrediente) WHERE dolce=:id"; 
			$stmt = $db->prepare($sql); 
			$stmt->bindParam(':id', $id, PDO::PARAM_STR);
			$stmt->execute();
			while ( $vett = $stmt->fetch()  ) {
			    $v[$i] = $vett;
			    $i++;
			}
			return $v;
		}

		public static function get_all_ingredients($db){
			$v=false; $i=0;
			$sql ="SELECT * FROM `ingrediente` ORDER by nome"; 
			$stmt = $db->prepare($sql);  
			$stmt->execute();
			while ( $vett = $stmt->fetch()  ) {
			    $v[$i] = $vett;
			    $i++;
			}
			return $v;
		}

		public static function save_data_client( $db, $v ){
			$sql="INSERT INTO `utente`(`email`, `nome`, `password`) VALUES (:email, :nome, :password)";
			$stmt = $db->prepare($sql);
			$stmt->bindParam(':email', $v["email"], PDO::PARAM_STR);
			$stmt->bindParam(':nome', $v["nome"], PDO::PARAM_STR); 
			$stmt->bindParam(':password', $v["password_enctrypted"], PDO::PARAM_STR); 
			if( $stmt->execute() )
					return true;
			return false;	
		}

		public static function check_data( $db, $email, $password ){
			$command = "SELECT * FROM `utente` WHERE email=?";	  
			$stmt = $db->prepare($command);
			$params = [ $email ];
			$success = $stmt->execute( $params );

			while ( $vett = $stmt->fetch()  ) {  

				if( password_verify($password, $vett["password"] ) ){ 

				    return $vett;
				}
			}
			return false;
		}

		public static function cambia_prezzo_1( $db ){
			$sql ="UPDATE `dolce` SET  `prezzo`=(prezzo*0.8),`sconto_ott`=1 where DATEDIFF( NOW(), data_vendita  ) = 1  and sconto_ott =0 ";
			$stmt = $db->prepare($sql); 
			if( $stmt->execute() )
					return true;
			return false;
		}

		public static function cambia_prezzo_2( $db ){
			$sql ="UPDATE `dolce` SET  `prezzo`=(prezzo*0.25),`sconto_vent`=1 where DATEDIFF( NOW(), data_vendita  ) = 2  and sconto_vent =0 ";
			$stmt = $db->prepare($sql); 
			if( $stmt->execute() )
					return true;
			return false;
		}

		public static function delete_old( $db ){
			$sql ="DELETE FROM `dolce`  where DATEDIFF( NOW(), data_vendita  ) > 2";
			$stmt = $db->prepare($sql); 
			if( $stmt->execute() )
					return true;
			return false;
		}



	}

?>