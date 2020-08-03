<?php
 	header('Content-Type: application/json');
	if(!isset($_SESSION) ){  ob_start(); session_start(); ob_end_flush(); } 

	class edit_cake{
		var $error= false;

		function __construct( $id ){ 
			$this->id = $id; 
		} 

		function connDB(){
			if( $db = some_query::connect() ){
				$this->vett = some_query::get_cake( $db, $this->id );
				if( !$this->vett )
					$this->error=true;
			}
		}

		function printing(){
			if( !$this->error ){  
				$v["check"] = true; 
				$v["text"] = part1::edit_cake_block($this->vett);
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
	
	$do = new edit_cake( $id );
	$do->connDB();
	$do->printing();

?>