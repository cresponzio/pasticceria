<?php

	class cron_prezzo{
		var $error= false;

		function connDB(){
			if( $db = some_query::connect() ){
				some_query::cambia_prezzo_1( $db );
				some_query::cambia_prezzo_2( $db );
				some_query::delete_old( $db );
			}
		}

	}

	require("some_query.php");  
	$do = new cron_prezzo();
	$do->connDB(); 

?>