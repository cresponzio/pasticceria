jQuery(document).ready(function($) {

	function validatePsw(password){
		var re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$^+=!*()@%&]).{8,}$/;
		return re.test( password );
	}

	function validateString(stringa){
		 var isValid = /^[a-zA-Z]+(\s+[a-zA-Z]+)?$/.test(stringa);
		 return isValid;
	}
 
 	$("body").on('click', "#do_login",function(){ 
		var puls = $(this);
		var block_form = $("#main_block");
		
		var email = $("#email").val();		
		var password = $("#psw").val();
		var data = { "email":email, "password":password	};
		
		var url = "php_file/do_login.php";

		$.post(url, data, function ( msg ) {    
			if( msg.check==true ){
					block_form.html( msg.text );
			}else alert( "Errore, i dati non sono corretti" ); 
		});
	});

	$("body").on('click', "#mostra_ingredienti",function(){ 
		var puls = $(this);
		var id = puls.prev().val();		
		var data = { "id":id };
		var url = "php_file/show_ingredients.php";
		$.post(url, data, function ( msg ) {   
			if( msg.check==true ){
					puls.after( msg.text );
					puls.replaceWith("<button class='btn btn-info' id='nascondi_ingredienti' >Nascondi Ingredienti</button>");
			}else alert( msg.text ); 
		});
	});

	$("body").on('click', "#nascondi_ingredienti",function(){ 
		var puls = $(this);
		puls.next().remove();
		puls.replaceWith("<button class='btn btn-info' id='mostra_ingredienti' >Mostra Ingredienti</button>");
	});

	$("body").on('click', ".edit_cake",function(){ 
		var puls = $(this);
		var id = puls.prev().val();		
		var data = { "id":id };
		blocco = puls.parent().parent().next(); 
		var url = "php_file/edit_cake.php";
		$.post(url, data, function ( msg ) {      
			if( msg.check==true ){
					blocco.html( msg.text );
					blocco.next().hide();
			}else alert( msg.text ); 
		});
	});

	$("body").on('click', ".delete_cake",function(){ 
		if( confirm("Sei sicuro di voler eliminare la torta?") ){
				var puls = $(this);
				var id = puls.prev().prev().val();		
				var data = { "id":id }; 
				blocco = puls.parent().parent().parent(); 
				var url = "php_file/delete_cake.php";
				$.post(url, data, function ( msg ) {       
					if( msg.check==true ){
							blocco.remove();
					}else alert( msg.text ); 
				});
		}
	});

	$("body").on('click', "#logout",function(){
		var url = "php_file/logout.php";
		$.post(url, function ( msg ) {
				if( msg.check==true ){
					window.location.href = "index.php";
				}else 
					alert("Error!!!"); 
		});
	});

	$("body").on('click', "#add_cake",function(){ 
		var puls = $(this);
		var url = "php_file/add_cake.php";
		$.post(url, function ( msg ) {    
				puls.after( msg.text ); 
		});
	});

});