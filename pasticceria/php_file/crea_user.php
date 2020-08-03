<?php
     
     class crea_user{
          var $error=false;

          function __construct( $v ){ 
               $this->v = $v; 
          }

          function encrypt_password($password){
               $password_enctrypted = password_hash($password, PASSWORD_DEFAULT);
               return $password_enctrypted;
          }

          function connDB(){
               if( $db = some_query::connect() ){
                    $this->v["password_enctrypted"] = $this->encrypt_password( $this->v["password"] );
                    if( !some_query::save_data_client($db, $this->v ) )
                         $this->error=true; 
               }else $this->error=true;
          }

          function print_data(){
               if(!$this->error)
                         echo "Utente creato";
                    else
                         echo "Errore";
          }

     } 

     require('some_query.php'); 
     
     $v["nome"]='Maria';   // Maria - Luana
     $v["email"] = 'maria@bakery.it';  // maria@bakery.it - luana@bakery.it
     $v["password"]="maria123!";  // maria123! - luana123!

     $do = new crea_user($v);
     $do->connDB();
?>