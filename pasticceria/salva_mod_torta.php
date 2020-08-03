<?php  ob_start(); session_start(); ob_end_flush();  ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <?php  
          require_once("part_html/panel.php");
          require_once("php_file/some_query.php"); 
          echo part1::head( "Home" );  
    ?>
</head>
<body>
      <div id='main_block' class='cointainer'> 
          <div class="row">
              <div class='col-lg-12 text-right'>
                <?php if( !isset($_SESSION["id"]) && !$_SESSION["id"] ){ ?>
                    <a class='btn btn-primary mr-4 mt-4' href='login.php'>Accedi</a>
                <?php }else{ ?>
                    <input type="hidden" id="uid" name="uid" value="<?php echo $_SESSION["id"]; ?>" />
                    <button class='btn btn-danger mr-4 mt-4' >Logout</button>
                <?php } ?>
              </div>
          </div>
          <div class="row">
              <div class='col-lg-12 text-center mb-4'>
                <h1 class='text-danger font-weight-bold' >The Bakery</h1>
              </div>
          </div>
        <?php  
              if( isset($_SESSION["id"]) && $_SESSION["id"] && $_POST  ) {    
                if( isset($_FILES) && $_FILES ){
						$uploaddir = './assets/img/'; // cartella dove mettere i file caricati dagli utenti
						$userfile_tmp = $_FILES['fileToUpload']['tmp_name'];  // percorso temporaneo del file
						$userfile_name = $_FILES['fileToUpload']['name']; // nome originale del file caricato
						//copio il file dalla sua posizione temporanea alla mia cartella upload
						if( move_uploaded_file($userfile_tmp, $uploaddir . $userfile_name) ){
						  		$uploadOk=true;
								$target_file = $uploaddir."".$userfile_name;
						}else{ 
						     $uploadOk=false;  
						}
				}

                if(  $db = some_query::connect() ){     

                    $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_STRING);
                    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
                    $prezzo = filter_input(INPUT_POST, "prezzo", FILTER_SANITIZE_STRING); 
                    $vecchia_foto = filter_input(INPUT_POST, "vecchia_foto", FILTER_SANITIZE_STRING); 
 

                    if(!$uploadOk){
                        if( !$vecchia_foto || $vecchia_foto=='' )
                            $target_file=NULL;
                        else $target_file=$vecchia_foto;
                    } 

                    if( some_query::update_cake( $db, $id, $nome, $prezzo,$target_file ) ){

                    	 $v_dolci = some_query::get_cakes( $db );
                        echo part1::vetrina_admin($v_dolci);
                        
	       			}else 
        				 echo "<section>
						              <div class='container-fluid '>
						                  <div class='row '>	
						    					<div class='col-lg-12'>
						    						<h1>Errore, il salvataggio non è andata a buon fine</h1>
						        				</div>div>
						        		  </div>
						        	  </div>
						        </section>";
        	    }elseif (!$uploadOk) { ?>
			        <section>
			              <div class='container-fluid '>
			                  <div class='row '>	
			    					<div class='col-lg-12'>
			    						<h1>Errore: <?php echo $typeError; ?></h1>
			        				</div>
			        		  </div>
			        	  </div>
			        </section> 
		<?php   }
			} ?>
	 
          <?php echo part1::footer( "Home" );  ?>
</body>
</html>
