<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <title>Bootstrap 101 Template</title>
        <!-- Bootstrap --> 
        <link rel="stylesheet" href="<?php echo base_url("assets/vendors/css/bootstrap.min.css") ?>"/>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        
        <div class="container">  
            
                <?php
                if ($this->session->flashdata('errorLogin')) {
                    ?>

                    <div class='alert alert-danger' role='alert' >
                        <?php
                        echo $this->session->flashdata('errorLogin');
                        ?>
                    </div>
                    <?php
                }
                ?>

            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h2> Entrar </h2>
                </div>
            </div>

            <div class="clearfix"></div>
            <br/>

            <div class="col-md-8 col-md-offset-2">
                <form role="form" action="<?php echo base_url('login/efetua_login'); ?>" method="POST">
                    <div class="form-group col-md-12">
                        <div class="col-md-8">
                            <label for="Login">Login</label>
                            <input type="text" class="form-control" name="login" id="Login">
                        </div>
                        <div class="col-md-4">
                            <label for="Senha">Senha</label>
                            <input type="password" class="form-control" name="senha" id="Senha">
                        </div>
                    </div>
                    </div>     
                    <div class="form-group col-md-12">
                        <div class="col-md-12" >
                            
                            <a type="submit" class="btn btn-default pull-right" href="<?php echo base_url('usuarios/adicionar'); ?>">Cadastre-se </a>
                            <button type="submit" class="btn btn-success pull-right"> <i class="glyphicon glyphicon-ok"></i> Entrar</button>
                        </div>
			
                    </div>
                </form>
            </div>

        </div><!-- .\ wrapper -->

        <!-- Javascript -->
        <script type="text/javascript" src="<?php echo base_url("assets/vendors/js/jquery.min.js") ?>" ></script>
        <script type="text/javascript" src="<?php echo base_url("assets/vendors/js/bootstrap.min.js") ?>" ></script>
        <script type="text/javascript" src="<?php echo base_url("assets/vendors/js/mask.min.js") ?>" ></script>
        <script type="text/javascript" src="<?php echo base_url("assets/personal/js/script.js") ?>" ></script>

    </body>
</html>