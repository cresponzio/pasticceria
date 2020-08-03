<?php  ob_start(); session_start(); ob_end_flush();  ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <?php  
          require_once("part_html/panel.php"); 
          echo part1::head( "Home" );  
    ?>
</head>
<body>
      <div class='cointainer'> 
          <div class="row">
              <div class='col-lg-12 text-right'>
                <a class='btn btn-primary mr-4 mt-4' href='login.php'>Accedi</a>
              </div>
          </div>
          <div class="row">
              <div class='col-lg-12 text-center mb-4'>
                <h1 class='text-danger font-weight-bold' >The Bakery</h1>
              </div>
          </div>
          <?php  
                    $v = false;

                    require("./php_file/some_query.php"); 

                    if( $db = some_query::connect() ){
                        $v = some_query::get_cakes( $db );
                    }
                    if($v)
                        echo part1::vetrina($v);
                    
          ?>       
      </div>
      <?php echo part1::footer( "Home" );  ?>
</body>
</html>
