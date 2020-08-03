<?php
 	header('Content-Type: application/json');
	if(!isset($_SESSION) ){  ob_start(); session_start(); ob_end_flush(); } 

	class delete_cake{
		var $error= false;

		function __construct( $id ){ 
			$this->id = $id; 
		} 

		function connDB(){
			if( $db = some_query::connect() ){
				$this->vett = some_query::delete_cake( $db, $this->id );
				$this->v_dolci = some_query::get_cakes( $db );
				
				if( !$this->vett )
					$this->error=true;
			}
		}

		function printing(){
			if( !$this->error ){  
				$v["check"] = true; 
				$v["text"] = part1::vetrina_admin( $this->v_dolci );
			}else{
				$v["check"]=false; 
			}
			$myJSON = json_encode( $v );
    		echo $myJSON;
		}

	}

	require("some_query.php");
	require("../part_html/panel.php");  

	$id=filter_input(INPUT_POST, "id", FILTER_SANITIZE_STRING); // filter the input
	
	$do = new delete_cake( $id );
	$do->connDB();
	$do->printing();

?>