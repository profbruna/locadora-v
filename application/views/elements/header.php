<?php header('Content-type: text/html; charset=utf-8'); ?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <title> <?php echo $title ?> </title>
        <!-- Bootstrap --> 
        <link rel="stylesheet" href="<?php echo base_url("assets/vendors/css/bootstrap.min.css") ?>"/>
        <link rel="stylesheet" href="<?php echo base_url("assets/vendors/css/bootstrap-select.min.css") ?>"/>
        <link rel="stylesheet" href="<?php echo base_url("assets/vendors/css/datepicker.css") ?>"/>
        <link rel="stylesheet" href="<?php echo base_url("assets/personal/css/style.css") ?>"/>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        
        <section>
            <?php echo $this->load->view( "elements/menu" ); ?>
        </section>