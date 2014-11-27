
<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
        <h3> Relatorio Locações </h3>
    </div>
</div>
<div class="clearfix"></div>
<br/>

<div class="col-md-10 col-md-offset-1">


    <div class="row box-options">
        <form method="post" action="<?php echo base_url("relatorioLocacoes/listar") ?>">
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
                <th> Produto </th>
                <th> Data Devolução </th>
                <th> Hora Devolução </th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($relatorioLocacoes == null) {
                
            } else {
                foreach ($relatorioLocacoes as $relatorioLocacao):
                    ?>
                    <tr>
                        <td> <?php echo $relatorioLocacao->id ?> </td>
                        <td> <?php echo $produtos[ $relatorioLocacao->produto_id ]->nome ?> </td>
                        <td> <?php echo date("d/m/Y", strtotime($relatorioLocacao->data_devolucao)) ?> </td>
                        <td> <?php echo $relatorioLocacao->hora_devolucao ?> </td>
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
                if ($relatorioLocacoes == null) {
                    
                } else {
                    echo $this->pagination->create_links();
                }
                ?>
            </nav>
        </div>
    </div>
</div>