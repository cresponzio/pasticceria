<?php
	header('Content-Type: application/json'); 
	if( !isset($_SESSION) ){ 
		ob_start(); session_start(); ob_end_flush();
	}

	require('some_query.php');
	if( session_destroy() ){
			$v_return["check"] = true;	
	}else
		$v_return["check"] = false;	
	$myJSON = json_encode( $v_return );     
	echo $myJSON;
?>