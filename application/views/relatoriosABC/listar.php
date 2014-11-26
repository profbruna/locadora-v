<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
        <h3> Relatório Produtos mais Locados </h3>
    </div>
</div>

<div class="clearfix"></div>
<br/>

<div class="col-md-10 col-md-offset-1">

    <div class="row box-options">
        <form method="post" action="<?php echo base_url('relatoriosABC/listar');?>">
            <div class="form-group row">
                <div class="col-md-2">
                    <label>Data Início:</label>
                    <input type="text"  id="data" name="dataInicio" class="datepicker form-control">

                </div>
                <div class="col-md-2">
                    <label>Data Fim:</label>
                    <input type="text"  id="data2" name="dataFim" class="datepicker form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12" >
                    <button type="submit" class="btn btn-primary ">  Listar</button>
                </div>
            </div>
        </form>


    </div>




    </div>

    <table class="table table-hover table-striped" >
        <thead>
            <tr>
                <th><b> #ID </b></th>
                <th> Nome </th>
                <th> Quantidade </th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($relatoriosABC as $relatorioABC): ?>
                <tr>
                    <td><b>#<?php echo $relatorioABC->id ?> </b></td>
                    <td> <?php echo $relatorioABC->nome ?> </td>
                    <td> <?php echo $relatorioABC->qtd ?> </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    <div class="row">
        <div class="col-xs-6"></div>
        <div class="col-xs-6">
            <nav>      
            </nav>
        </div>
    </div>

</div>

