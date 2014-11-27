

<nav class="navbar navbar-default navbar-inverse" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Locadora</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <li>
                    <a href="<?php echo base_url("/clientes/listar"); ?>">Cliente</a>              
                </li>

                <li>
                    <a href="<?php echo base_url("/estados/listar"); ?>">Estado</a>              
                </li>

                <li>
                    <a href="<?php echo base_url("/cidades/listar"); ?>">Cidade</a>              
                </li>

                <li>
                    <a href="<?php echo base_url("/classificacoes/listar"); ?>">Classificação</a>              
                </li>

                <li>
                    <a href="<?php echo base_url("/produtos/listar"); ?>">Produto</a>              
                </li>

                <li>
                    <a href="<?php echo base_url("/tipos/listar"); ?>">Tipo</a>              
                </li>

                <li>
                    <a href="<?php echo base_url("/generos/listar"); ?>">Gênero</a>              
                </li>

                <li>
                    <a href="<?php echo base_url("/condicoes/listar"); ?>">Pagamento</a>              
                </li>

                <li>
                    <a href="<?php echo base_url("/locacoes/listar"); ?>">Locação</a>              
                </li>

                <li>
                    <a href="<?php echo base_url("/financeiros/listar"); ?>">Financeiro</a>              
                </li>

                <li>
                    <a href="<?php echo base_url("/usuarios/listar"); ?>">Usuário</a>              
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Relatórios <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li> <a href="<?php echo base_url("/relatorioAniversariantes/listar"); ?>">Aniversariantes</a> </li>
                        <li> <a href="<?php echo base_url("/relatorioClientes/listar"); ?>">Clientes sem Locação</a> </li> 
                        <li> <a href="<?php echo base_url("/relatorioLocacoes/listar"); ?>">Locações</a> </li> 
                        <li> <a href="<?php echo base_url("/relatorioBaixas/listar"); ?>">Pagamentos no Período</a> </li> 
                        <li> <a href="<?php echo base_url("/relatoriosABC/listar"); ?>">Relatório ABC</a> </li>
                        <li> <a href="<?php echo base_url("/relatorioVencidos/listar"); ?>">Títulos Vencidos</a> </li> 
                        <li> <a href="<?php echo base_url("/relatorioValores/listar"); ?>">Valores à Receber</a> </li>
                    </ul>
                </li>

            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo base_url("/login/logout"); ?>"> <i class="glyphicon glyphicon-remove" ></i> Sair</a></li>                        
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>



