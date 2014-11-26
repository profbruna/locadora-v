
<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
        <h3> Relatorio de Clientes </h3>
    </div>
</div>

<div class="clearfix"></div>
<br/>

<div class="col-md-10 col-md-offset-1">


    <div class="row box-options">
        <form method="post" action="<?php echo base_url("relatorioClientes/listar") ?>">
            <div class="form-group row">
                <div class="col-md-2">
                    <label>Data inicial:</label>
                    <input type="text"  id="data" name="data_inicial" class="datepicker form-control">

                </div>
                <div class="col-md-2">
                    <label>Data final:</label>
                    <input type="text"  id="data2" name="data_final" class="datepicker form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12" >
                    <button type="submit" class="btn btn-primary ">  Listar</button>
                </div>
            </div>
        </form>


    </div>

    <table class="table table-hover table-striped" >
        <thead>
            <tr>
                <th> #id </th>
                <th> Nome </th>
                <th> CPF </th>
                <th> RG </th>
                <th> E-mail </th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($relatorioClientes == null) {
                
            } else {
                foreach ($relatorioClientes as $relatorioCliente):
                    ?>
                    <tr>
                        <td> <?php echo $relatorioCliente->id ?> </td>
                        <td> <?php echo $relatorioCliente->nome ?> </td>
                        <td> <?php echo $relatorioCliente->cpf ?> </td>
                        <td> <?php echo $relatorioCliente->rg ?> </td>
                        <td> <?php echo $relatorioCliente->email ?> </td>
                    </tr>
                    <?php
                endforeach;
            }
            ?>
        </tbody>
    </table>
    <div class="row">
        <div class="col-xs-6"></div>
        <div class="col-xs-6">
            <nav>

                <?php
                if ($relatorioClientes == null) {
                    
                } else {
                    echo $this->pagination->create_links();
                }
                ?>
            </nav>
        </div>
    </div>
</div>
