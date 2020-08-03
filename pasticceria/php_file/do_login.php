<?php
 	header('Content-Type: application/json');
	if(!isset($_SESSION) ){  ob_start(); session_start(); ob_end_flush(); } 

	class do_login{
		var $error= false;

		function __construct( $email, $password ){ 
			$this->email = $email; 
			$this->password = $password; 
		} 

		function connDB(){
			if( $db = some_query::connect() ){
				$vett = some_query::check_data( $db, $this->email, $this->password );
				if( $vett ){
						$_SESSION["id"] = $this->email;
						$this->v_dolci = some_query::get_cakes( $db );		
				}else $this->error=true;
			}
		}

		function printing(){
			if( !$this->error ){  
				$v["check"] = true; 
				$v["text"]= part1::vetrina_admin($this->v_dolci);
				$v["text"].= part1::vetrina_admin($this->v_dolci);
			}else{
				$v["check"]=false; 
			}
			$myJSON = json_encode( $v );
    		echo $myJSON;
		}

	}

	require("some_query.php");
	require("../part_html/panel.php");  

	$email=filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING); // filter the input
	$password=filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING); // filter the input

	$do = new do_login( $email, $password );
	$do->connDB();
	$do->printing();

?>