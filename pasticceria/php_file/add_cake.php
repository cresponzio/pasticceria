<?php
 	header('Content-Type: application/json');
	if(!isset($_SESSION) ){  ob_start(); session_start(); ob_end_flush(); } 

	class add_cake{
		var $error= false;
 
		function connDB(){
			if( $db = some_query::connect() ){
				$this->vett = some_query::get_all_ingredients( $db  );
				if( !$this->vett )
					$this->error=true;
			}
		}

		function printing(){
			if( !$this->error ){  
				$v["check"] = true; 
				$v["text"] = part1::add_cake_block($this->vett);
			}else{
				$v["check"]=false; 
			}
			$myJSON = json_encode( $v );
    		echo $myJSON;
		}

	}

	require("some_query.php");
	require("../part_html/panel.php");  
	
	$do = new add_cake(  );
	$do->connDB();
	$do->printing();

?>