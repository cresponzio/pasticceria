<?php
	
	 class part1{

	 	public static function head( $title ){
	 		return '
	 			<title>'.$title.'</title> 
				<link rel="stylesheet" href="./assets/css/main.css"/>
	 			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/solid.css" integrity="sha384-VGP9aw4WtGH/uPAOseYxZ+Vz/vaTb1ehm1bwx92Fm8dTrE+3boLfF1SpAtB1z7HW" crossorigin="anonymous">
				<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/regular.css" integrity="sha384-ZlNfXjxAqKFWCwMwQFGhmMh3i89dWDnaFU2/VZg9CvsMGA7hXHQsPIqS+JIAmgEq" crossorigin="anonymous">
				<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/brands.css" integrity="sha384-rf1bqOAj3+pw6NqYrtaE1/4Se2NBwkIfeYbsFdtiR6TQz0acWiwJbv1IM/Nt/ite" crossorigin="anonymous">
				<link rel="stylesheet" href="assets/css/fontawesome.css"  type="text/css"  />
			    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> 
			    <link rel="stylesheet" href="https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css" /> ';
	 	}		 	

	 	public static function footer(){
	 		return '<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	 		  		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	 		  		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> 
				    <!-- The Templates plugin is included to render the upload/download listings -->
				    
				    <script src="https://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
				    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
				    <script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
				    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
				    <script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
				    <!-- blueimp Gallery script -->
				    <script src="https://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
				    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
				    
					<script type="text/javascript" src="assets/js/app.js"></script>
					
	  			';
	 	}

	 	public static function euro_price($num){
	 		setlocale(LC_MONETARY, 'it_IT');
			return money_format('€ %!n', $num);
	 	}

	 	public static function vetrina($v){
	 		$my_html="<div class='row text-center justify-content-center align-items-center '>";
	 			for($i=0;$v && $i<count($v);$i++){
	 				$my_html.="<div class='col-lg-4 ml-2 mr-2 text-center mb-4 pt-4 pb-3 bg-secondary text-white rounded'>
	 				  		   		<img src='".$v[$i]["foto"]."' class='img-fluid img-thumbnail w-75' /><br/>
	 				  		   		<span class='h3 font-weight-bold' >".$v[$i]["nome"]."</span><br/>
	 				  		   		<span>".part1::euro_price($v[$i]["prezzo"])."</span><br/>
	 				  		   		 
 				  		   			<input type='hidden' name='id_cake' class='id_cake' value='".$v[$i]["id"]."' />
 				  		   			<button class='btn btn-info' id='mostra_ingredienti' >Mostra Ingredienti</button>
	 				  		   		 
	 				  		   </div>";	
	 			}
		    $my_html.="</div>";
	 		return $my_html;
	 	}

	 	public static function titolo(){
	 		$my_html="<div class='row'>
			              <div class='col-lg-12 text-center mb-4'>
			                <h1 class='text-danger font-weight-bold' >The Bakery</h1>
			              </div>
			          </div>";
          	return $my_html;
	 	}

	 	public static function vetrina_admin($v){
	 		$my_html="<div class='row text-center justify-content-center align-items-center mt-4'>
	 				  	<div class='col-lg-12 mb-4'>
	 				  		<button id='add_cake' class='btn btn-primary' >+ Add Cake</button>
	 				  	</div>
	 				  <div class='row text-center justify-content-center align-items-center '>";
	 			for($i=0;$v && $i<count($v);$i++){
	 				$my_html.="<div class='col-lg-4 ml-2 mr-2 text-center mb-4 pt-4 pb-3 bg-secondary text-white rounded'>
	 								<div class='row text-center justify-content-center align-items-center'>
	 									<div class='col-lg-12 text-right'>
	 										<input type='hidden' name='id_cake' class='id_cake' value='".$v[$i]["id"]."' />
	 										<button class='btn btn-info edit_cake' >Modifica</button>
	 										<button class='btn btn-danger delete_cake' >Elimina</button>
	 									</div>		 										
	 								</div>
	 								<div class='mt-2 row text-center justify-content-center align-items-center'>
	 									<div class='col-lg-12'>
	 										<input type='hidden' name='id_cake' class='id_cake' value='".$v[$i]["foto"]."' />
			 				  		   		<img src='".$v[$i]["foto"]."' class='img-fluid img-thumbnail w-75' />
			 				  		   	</div>
			 				  		   	<div class='col-lg-12'>
			 				  		   		<span class='h3 font-weight-bold' >".$v[$i]["nome"]."</span><br/>
			 				  		   	</div>
			 				  		   	<div class='col-lg-12'>	
			 				  		   		<span>".part1::euro_price($v[$i]["prezzo"])."</span><br/>
		 				  		   		</div>
		 				  		   	</div>
	 								<div class='row text-center justify-content-center align-items-center'>
	 				  		   			<div class='col-lg-12'>	
		 				  		   			<input type='hidden' name='id_cake' class='id_cake' value='".$v[$i]["id"]."' />
		 				  		   			<button class='btn btn-info' id='mostra_ingredienti' >Mostra Ingredienti</button>
		 				  		   		</div>
		 				  		   	</div>	 
	 				  		   </div>";	
	 			}
		    $my_html.="</div>";
	 		return $my_html;
	 	}

	 	public static function blocco_lista_ingr( $v_ingr ){
	 		$my_html='<div class="row lista_ingredienti bg-white rounded text-dark mt-3" >
	 						<div class="col-lg-12">';

	 		for( $i=0; $v_ingr && $i<count($v_ingr);$i++ ){
	 			$my_html.='<div class="row border-bottom" >
	 							<div class="col-lg-7">	
	 								<span>'.$v_ingr[$i]["nome"].'</span>
	 					   		</div>
	 					   		<div class="col-lg-2">	
	 								<span>'.$v_ingr[$i]["qnt"].'</span>
	 					   		</div>
	 					   		<div class="col-lg-3">	
	 								<span>'.$v_ingr[$i]["unita_misura"].'</span>
	 					   		</div>
	 					   </div>';
	 		}

	 		$my_html.='	</div>
	 				  <div>';
	 		return $my_html;
	 	}

	 	public static function login(){
	 		$my_html='<div class="row text-center align-items-center justify-content-center" >
	 					<div class=" mt-5 p-5 bg-info text-center align-items-center justify-content-center rounded">
	 						<div class="row">
	 								<div class="col-lg-12">
	 									<input type="email" id="email" name="email" placeholder="Insert Email" />
	 								</div>
	 						</div>
	 						<div class="row mt-2">
	 								<div class="col-lg-12">
	 									<input type="password" id="psw" name="psw" placeholder="Insert Password" />
	 								</div>
	 						</div>
	 						<div class="row mt-4">
	 							<div class="col-lg-12">
		 							<button class="btn btn-primary" id="do_login">Login</button>
		 							<a href="index.php" class="btn btn-secondary" >Annulla</a>
		 						</div>
		 					</div>		
	 				  </div>
	 				</div>';
	 		return $my_html;
	 	}

	 	public static function edit_cake_block($vett){
	 		$my_html='<form id="block_edit_cake" class="bg-info p-4" method="POST" action="./salva_mod_torta.php" enctype="multipart/form-data"  >
	 						<div class="row  mt-2">
	 							<div class="col-lg-12">
		 							<input type="hidden" id="id" name="id" value="'.$vett["id"].'"  />
		 							<span>Nome</span><br/>
		 							<input type="text" id="nome" name="nome" value="'.$vett["nome"].'"  />	
	 							</div>
	 						</div>
	 						<div class="row  mt-2">
	 							<div class="col-lg-12">
		 							<span>Prezzo</span><br/>
		 							<input type="text" id="prezzo" name="prezzo" value="'.$vett["prezzo"].'"  />
	 							</div>
	 						</div>
	 						<div class="row mt-2">
	 							<div class="col-lg-12">
		 							<span>Foto</span><br/>
		 							<input type="hidden" id="vecchia_foto" name="vecchia_foto" value="'.$vett["foto"].'"  />
		 							<img src="'.$vett["foto"].'" class="img-fluid img-thumbnail w-25" /><br/>
		 							<input type="file" id="fileToUpload" name="fileToUpload"  />
	 							</div>
	 						</div>
	 						<div class="row mt-4">
	 							<div class="col-lg-12">
		 							<button class="btn btn-primary" type="submit" id="save" name="save" >Salva</button>
		 							<a class="btn btn-secondary" href="login.php">Indietro</a>
	 							</div>
	 						</div>
	 		          </form>';
	 		return $my_html;
	 	}

	 	public static function add_cake_block($vett){
	 		$my_html='<form id="block_add_cake" class="bg-info p-4" method="POST" action="./salva_new_torta.php" enctype="multipart/form-data"  >
	 						<div class="row  mt-2">
	 							<div class="col-lg-12">
		 							<span>Nome</span><br/>
		 							<input type="text" id="nome" name="nome"  required/>	
	 							</div>
	 						</div>
	 						<div class="row  mt-2">
	 							<div class="col-lg-12">
		 							<span>Prezzo</span><br/>
		 							<input type="text" id="prezzo" name="prezzo"  required/>
	 							</div>
	 						</div>
	 						<div class="row mt-2">
	 							<div class="col-lg-12">
		 							<span>Foto</span><br/>
		 							<input type="file" id="fileToUpload" name="fileToUpload"  required/>
	 							</div>
	 						</div>
	 						<div class="row mt-2 text-left">';
	 			for($i=0;$vett && $i<count($vett);$i++){
	 				$my_html.="<div class='col-lg-12 text-center align-items-center'>
	 						   	    <span>".$vett[$i]["nome"]."</span>	
						   	    	<input type='hidden' id='ingr[]'  name='ingr[]'  value='".$vett[$i]["id"]."' />	
	 						   	    <input type='text' id='qnt[]'  name='qnt[]' class='qnt w-25' placeholder='Qnt'  /> 
	 						   	    <input type='text' id='unita_misura[]' name='unita_misura[]' class='unita_misura w-25' placeholder='Unita di misura'  />
	 						   	    
	 						   </div>";
	 			}

	 			$my_html.='		</div>
	 						</div>
	 						<div class="row mt-4">
	 							<div class="col-lg-12">
		 							<button class="btn btn-primary" type="submit" id="save" name="save" >Salva</button>
		 							<a class="btn btn-secondary" href="login.php">Indietro</a>
	 							</div>
	 						</div>
	 		          </form>';
	 		return $my_html;
	 	}

	 }

?>