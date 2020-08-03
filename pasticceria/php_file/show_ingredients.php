<?php 
 	header('Content-Type: application/json');     

	class show_ingredients{
		var $error= false;

		function __construct( $v ){ 
			$this->v = $v;  
		} 

		function connDB(){ 
			if( $db = some_query::connect() ){
				 $this->v_ingr = some_query::get_ingredients($db, $this->v["id"] );  
			}else $this->error=true;
		}

		function printing(){
			if( !$this->error ){
			 	$v["check"]=true;
			 	$v["text"]=part1::blocco_lista_ingr( $this->v_ingr );
			 }else	
				$v["check"]=false; 
			$myJSON=json_encode($v);
	    	echo $myJSON; 
		}

	}

	require("./some_query.php");
	require("../part_html/panel.php"); 

 
	$safePost = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
	
	$do = new show_ingredients( $safePost );
	$do->connDB();
	$do->printing();
	 

?>	